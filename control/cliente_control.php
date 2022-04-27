<?php 
	include_once('dao/cliente.php');
	include_once('dao/cliente_servico.php');
	
	if (isset($_POST['str_acao']))
	{
		$cliente = new Cliente();
		$servico = new ClienteServico();
		
		if ($_POST['str_acao'] == 'cad')
		{
			include ('cliente_cad.php');
		}
		elseif($_POST['str_acao'] == 'edi')
		{
			if (isset($_POST['cd_cliente']) && $_POST['cd_cliente'] > 0){
				$cliente->carregaCliente();
				if (isset($_POST['cd_cliente_servico']) && $_POST['cd_cliente_servico'] > 0){
					$servico->carregaClienteServico();
				}
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
			$_POST['vl_servico'] = formata_numero_inserir($_POST['vl_servico']);
			$_POST['dt_servico'] = formata_data_inserir($_POST['dt_servico']);
			$_POST['dt_nascimento'] = formata_data_inserir($_POST['dt_nascimento']);
			
			if (isset($_POST['sn_contratar']) && $_POST['sn_contratar'] == 'S')
			{
				$ds_ficha = ($_POST['tp_servico']=="O")?"ds_ficha_orto":"ds_ficha";
				if (!$_POST[$ds_ficha])
				{
					$_POST[$ds_ficha] = $cliente->verificaProximaFicha($ds_ficha);
				}
			}
			
			if (isset($_POST['cd_cliente']) && $_POST['cd_cliente'] > 0){
			    
				$cliente->alterar();
				//echo "aqui ".$cliente->statement;
				//mysql_query($cliente->statement);
				mysqli_query($_SESSION['db_con'], $cliente->statement);
				
				if (isset($_POST['cd_cliente_servico']) && $_POST['cd_cliente_servico'] > 0){
					$servico->alterar();
					//mysql_query($servico->statement);
					mysqli_query($_SESSION['db_con'], $servico->statement);
				} elseif (isset($_POST['sn_contratar'])) {
					$servico->inserirServico($_POST['cd_cliente']);
				}
			} 
			else 
			{
				$_POST['vl_saldo'] = $_POST['vl_servico'];
				$cliente->inserir();
				if (isset($_SESSION['cd_cliente']) && $_SESSION['cd_cliente'] > 0){
					$servico->inserirServico($_SESSION['cd_cliente']);
				}
				
				$_POST['cd_cliente'] = $_SESSION['cd_cliente'];
				$_POST['cd_cliente_servico'] = $_SESSION['cd_cliente_servico'];
			}
			
			$cliente->carregaCliente();
			$servico->carregaClienteServico();
			include ('cliente_cad.php');
			
		}
		else if ($_POST['str_acao'] == 'exc')
		{
			if ($_POST['cd_cliente_servico'] > 0)
			{
				$servico->deletar();
			} else {
				$cliente->deletar();
			}
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