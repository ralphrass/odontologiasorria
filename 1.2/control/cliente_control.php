<?php require_once("php7_mysql_shim.php");
	include_once('dao/cliente.php');
	include_once('dao/cliente_servico.php');
	//include_once('dao/servico_pagamento.php');
	
//	print_r($_POST);
	
	if (isset($_POST['str_acao']))
	{
		$cliente = new Cliente();
		$servico = new ClienteServico();
		//$servico_pagamento = new ServicoPagamento();
		
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
				//$servico_pagamento->carregaServicoPagamento();
				include ('cliente_cad.php');
				
				//carrega_servico_pagamento($sn_contratar, $ds_quantidade_parcela, $servico_pagamento);
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
				mysql_query($cliente->statement);
				//if (isset($_SESSION['cd_cliente']) && $_SESSION['cd_cliente'] > 0)
				if (isset($_POST['cd_cliente_servico']) && $_POST['cd_cliente_servico'] > 0){
					$servico->alterar();
					mysql_query($servico->statement);
				} elseif (isset($_POST['sn_contratar'])) {
					$servico->inserirServico($_POST['cd_cliente']);
				}
				//Insere os pagamentos
				/*if (isset($_POST['sn_contratar']) && $_POST['sn_contratar'] == 'S' 
				&& isset($_POST['ds_quantidade_parcela']) && $_POST['ds_quantidade_parcela'] > 0){
				
					$servico_pagamento->deletarPorServico($_POST['cd_cliente_servico']);
					
					for ($i=0; $i<$_POST['ds_quantidade_parcela']; $i++)
					{
						$_POST['nr_parcela'] = $i+1;
						$_POST['ds_banco'] = $_POST['ds_banco_'.($i+1)];
						$_POST['ds_agencia'] = $_POST['ds_agencia_'.($i+1)];
						$_POST['nr_cheque'] = $_POST['nr_cheque_'.($i+1)];
						$_POST['dt_parcela'] = $_POST['dt_parcela_'.($i+1)];
						$_POST['vl_parcela'] = formata_numero_inserir($_POST['vl_parcela_'.($i+1)]);
						$_POST['dt_pagamento'] = $_POST['dt_pagamento_'.($i+1)];
						$servico_pagamento->inserirServicoPagamento();
					}
				}*/
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
			//$servico_pagamento->carregaServicoPagamento();
			include ('cliente_cad.php');
			
			//$_POST['sn_contratar'] = (isset($_POST['sn_contratar']))?$_POST['sn_contratar']:"";
			
			//carrega_servico_pagamento($_POST['sn_contratar'], $_POST['ds_quantidade_parcela'], $servico_pagamento);
		}
		else if ($_POST['str_acao'] == 'exc')
		{
			//$servico_pagamento->deletarPorServico($_POST['cd_cliente_servico']);
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
	
	/*function carrega_servico_pagamento($sn_contratar, $ds_quantidade_parcela, $servico_pagamento)
	{
		if (isset($sn_contratar) && isset($ds_quantidade_parcela) && $sn_contratar == 'S')
		{
			$result = mysql_query($servico_pagamento->statement);

			$i=0;
			while ($row = mysql_fetch_array($result, MYSQL_ASSOC))
			{
				$nr_parcela = ++$i;
				
				if (isset($row['cd_cliente_servico']))
				{
					$ds_banco = "ds_banco_".$nr_parcela;
					$ds_agencia = "ds_agencia_".$nr_parcela;
					$nr_cheque = "nr_cheque_".$nr_parcela;
					$dt_parcela = "dt_parcela_".$nr_parcela;
					$vl_parcela = "vl_parcela_".$nr_parcela;
					$dt_pagamento = "dt_pagamento_".$nr_parcela;
					
					$$ds_banco = $row['ds_banco'];
					$$ds_agencia = $row['ds_agencia'];
					$$nr_cheque = $row['nr_cheque'];
					$$dt_parcela = $row['dt_parcela'];
					$$vl_parcela = $row['vl_parcela'];
					$$dt_pagamento = $row['dt_pagamento'];
					
					include('servico_pagamento_cad.php');
				}
			}
		}
	}*/
?>