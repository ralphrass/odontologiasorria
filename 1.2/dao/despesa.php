<?php

require_once('dao.php');

class Despesa extends DAO
{
	function Despesa()
	{
		$this->DAO('despesa', 'cd_despesa');
		$this->arr_fields = array(1 => 'cd_usuario', 2 => 'ds_despesa', 3 => 'dt_despesa', 4 => 'vl_despesa', 5 => 'tp_despesa_grupo', 6 => 'tp_fluxo', 7 => 'cd_cliente', 8 => 'cd_cliente_servico', 9 => 'dt_pagamento', 10 => 'ds_banco', 11 => 'ds_agencia', 12 => 'ds_cheque');
	}
	
	function carregaDespesa()
	{
		$this->listar();
		
		$this->statement .= " WHERE ".$this->pk." = ".$_POST[$this->pk];
	}
}
?>