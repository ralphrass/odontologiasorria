<?php

require_once('dao.php');

class Usuario extends DAO
{
	function Usuario()
	{
		$this->DAO('usuario', 'cd_usuario');
		$this->arr_fields = array(1 => 'nm_usuario', 2 => 'ds_login', 3 => 'ds_senha');
	}
	
	function carregaUsuario()
	{
		$this->listar();
		
		$this->statement .= " WHERE ".$this->pk." = ".$_POST[$this->pk];
	}
}
?>