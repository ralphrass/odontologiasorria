<?php 

require_once('dao.php');

class ClienteServico extends DAO
{
	function ClienteServico()
	{
		$this->DAO('cliente_servico', 'cd_cliente_servico');
		$this->arr_fields = array(1 => 'dt_servico', 2 => 'cd_cliente', 3 => 'ds_servico',  4 => 'vl_servico', 5 => 'sn_contratar', 6 => 'ds_quantidade_parcela', 7 => 'ds_observacao', 8 => 'tp_servico', 9 => 'vl_saldo');
	}
	
	function inserirServico()
	{
		$_POST['cd_cliente'] = (!$_POST['cd_cliente'])?$_SESSION['cd_cliente']:$_POST['cd_cliente'];
		$this->inserir();
	}
	
	function carregaClienteServico()
	{
		$this->listar();
		
		$this->statement .= " WHERE cd_cliente = ".$_POST['cd_cliente']." AND cd_cliente_servico = ".$_POST['cd_cliente_servico'];
	}
	
	function atualizarSaldo($cd_cliente_servico, $vl_pago)
	{
		$this->statement = "UPDATE cliente_servico SET vl_saldo = vl_saldo - ".$vl_pago." WHERE cd_cliente_servico = ".$cd_cliente_servico;
		//echo $this->statement;
		//mysql_query($this->statement);
		mysqli_query($this->db_con, $this->statement);
	}
	
	function retornarSaldo($cd_cliente_servico, $vl_pago)
	{
		$this->statement = "UPDATE cliente_servico SET vl_saldo = vl_saldo + ".$vl_pago." WHERE cd_cliente_servico = ".$cd_cliente_servico;
		//echo $this->statement;
		//mysql_query($this->statement);
		mysqli_query($this->db_con, $this->statement);
	}
}


?>