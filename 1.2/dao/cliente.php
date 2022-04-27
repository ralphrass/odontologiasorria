<?php require_once("php7_mysql_shim.php");

require_once('dao.php');

class Cliente extends DAO
{
	function Cliente()
	{
		$this->DAO('cliente', 'cd_cliente');
		$this->arr_fields = array(1 => 'nm_cliente', 2 => 'ds_telefone_residencial', 3 => 'ds_telefone_celular', 4 => 'ds_endereco', 5 => 'nr_rg', 6 => 'nr_cpf', 7 => 'ds_ficha', 8 => 'dt_nascimento', 9 => 'ds_ficha_orto');
	}
	
	function carregaCliente()
	{
		$this->listar();
		
		$this->statement .= " WHERE cd_cliente = ".$_POST['cd_cliente'];
	}
	
	function verificaProximaFicha($ds_ficha)
	{
		$sql = "SELECT MAX(".$ds_ficha.") AS ds_ficha FROM cliente ";
		$stmt = mysql_query($sql, $this->db_con);
		$rs = mysql_fetch_array($stmt);
		$ds_senha = (isset($rs['ds_ficha']))?($rs['ds_ficha']+1):1;

		return $ds_senha;
	}
}
?>