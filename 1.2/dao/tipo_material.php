<?php require_once("php7_mysql_shim.php");

require_once('dao.php');

class TipoMaterial extends DAO
{
	function TipoMaterial()
	{
		$this->DAO('tipo_material', 'cd_tipo_material');
		$this->arr_fields = array(1 => 'ds_tipo_material', 2 => 'qt_estoque');
	}
	
	function carregaTipoMaterial()
	{
		$this->listar();
		
		$this->statement .= " WHERE ".$this->pk." = ".$_POST[$this->pk];
	}
	
	function retornaEstoque($cd_material_movimento, $cd_tipo_material)
	{
		$sql = "SELECT qt_movimento, tp_movimento FROM material_movimento WHERE cd_material_movimento = ".$cd_material_movimento;
		
		$stmt = mysql_query($sql);
		$rs = mysql_fetch_array($stmt);
		
		$tp_movimento = ($rs['tp_movimento']=='E')?'S':'E';
		
		$this->atualizaEstoque($cd_tipo_material, $rs['qt_movimento'], $tp_movimento);
	}
	
	function atualizaEstoque($cd_tipo_material, $qt_movimento, $tp_movimento)
	{
		$tp_atualizacao = "qt_estoque ";
		$tp_atualizacao .= ($tp_movimento == 'E')?" + ":" - ";
		$tp_atualizacao .= $qt_movimento;
		
		$sql = "UPDATE tipo_material SET qt_estoque = ".$tp_atualizacao." WHERE qt_estoque > 0 AND cd_tipo_material = ".$cd_tipo_material;

		mysql_query($sql);
	}
}
?>