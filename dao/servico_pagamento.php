<?php 

require_once('dao.php');

class ServicoPagamento extends DAO
{
	function ServicoPagamento()
	{
		$this->DAO('servico_pagamento', 'cd_servico_pagamento');
		$this->arr_fields = array(1 => 'nr_parcela', 2 => 'cd_cliente_servico', 3 => 'ds_banco',  4 => 'ds_agencia', 5 => 'nr_cheque', 6 => 'dt_parcela', 7 => 'vl_parcela', 8 => 'dt_pagamento', 9 => 'cd_empresa');
	}
	
	function inserirServicoPagamento()
	{
		//$_POST['cd_cliente'] = $_SESSION['cd_cliente'];
		//$_POST['cd_cliente_servico'] = $_SESSION['cd_cliente_servico'];
		$this->inserir();
	}
	
	function carregaServicoPagamento()
	{
		$this->listar();
		
		$this->statement .= " WHERE cd_cliente_servico = ".$_POST['cd_cliente_servico'];
	}
	
	function deletarPorServico($cd_cliente_servico)
	{
		$this->statement = "DELETE FROM ".$this->table." WHERE cd_cliente_servico = ".$cd_cliente_servico;
		
		//mysql_query($this->statement);
		mysqli_query($this->db_con, $this->statement);
	}
}


?>