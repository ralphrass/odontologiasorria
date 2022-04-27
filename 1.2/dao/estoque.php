<?php

require_once('dao.php');

class Estoque extends DAO
{
	function Estoque()
	{
		$this->DAO('material_movimento', 'cd_material_movimento');
		$this->arr_fields = array(1 => 'dt_movimento', 2 => 'tp_movimento', 3 => 'qt_movimento', 4 => 'cd_tipo_material', 5 => 'cd_usuario');
	}
	
	function carregaEstoque()
	{
		$this->listar();
		
		$this->statement .= " WHERE ".$this->pk." = ".$_POST[$this->pk];
	}
}
?>