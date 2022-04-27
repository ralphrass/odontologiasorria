<?php 
	include_once('dao/cliente.php');
	include_once('dao/cliente_servico.php');
	include_once('dao/servico_pagamento.php');
	
	if (isset($_POST['str_acao']))
	{
		$cliente = new Cliente();
		
		if ($_POST['str_acao'] == 'cad')
		{
			include ('cliente_cad.php');
		}
		elseif($_POST['str_acao'] == 'edi')
		{
			if (isset($_POST['cd_cliente']) && $_POST['cd_cliente'] > 0){
				$cliente->carregaCliente();
				include ('cliente_cad.php');
			}
		}
		elseif ($_POST['str_acao'] == 'lis' || $_POST['str_acao'] == '' || $_POST['str_acao'] == 'pes')
		{
			$URL_EDIT = "cliente_cad.php";
			include ('cliente_lis.php');
		}
		elseif ($_POST['str_acao'] == 'sal')
		{
			$_POST['dt_nascimento'] = formata_data_inserir($_POST['dt_nascimento']);
			
			if (isset($_POST['cd_cliente']) && $_POST['cd_cliente'] > 0)
			{
				$cliente->alterar();
				mysql_query($cliente->statement);
			} 
			else 
			{
				$cliente->inserir();
				$_POST['cd_cliente'] = $_SESSION['cd_cliente'];
			}
			
			$cliente->carregaCliente();
			include ('cliente_cad.php');
		}
		else if ($_POST['str_acao'] == 'exc' && $_POST['cd_cliente'] > 0)
		{		
			$cliente->deletar();
			include('cliente_lis.php');
		}
		else if ($_POST['str_acao'] == 'imp')
		{
			include('cliente_ficha_rel.php');
		}
	}
	else
	{
		include ('cliente_lis.php');
	}
?>