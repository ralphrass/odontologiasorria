<?php 

	include_once('dao/despesa.php');

	include_once('dao/cliente_servico.php');

	

	if (isset($_POST['str_acao']))

	{

		$despesa = new Despesa();

		$clienteServico = new ClienteServico();

		

		if ($_POST['str_acao'] == 'cad')

		{

			include ('despesa_cad.php');

		}

		elseif($_POST['str_acao'] == 'edi')

		{

			if (isset($_POST['cd_despesa']) && $_POST['cd_despesa'] > 0){

				$despesa->carregaDespesa();

				include ('despesa_cad.php');

			}

		}

		elseif ($_POST['str_acao'] == 'lis' || $_POST['str_acao'] == '' || $_POST['str_acao'] == 'pes')

		{

			$URL_EDIT = "despesa_cad.php";

			include ('despesa_lis.php');

		}

		elseif ($_POST['str_acao'] == 'sal')

		{			

			if (isset($_POST['dt_pagamento_anterior']) && $_POST['dt_pagamento_anterior'] == "" 

				&& $_POST['dt_pagamento'] != "" && isset($_POST['cd_cliente_servico']))

			{

				$clienteServico->atualizarSaldo($_POST['cd_cliente_servico'], formata_numero_inserir($_POST['vl_despesa']));

			} 

			else if (isset($_POST['vl_despesa_anterior']) 

					 && $_POST['vl_despesa_anterior'] != formata_numero_inserir($_POST['vl_despesa']) 

					 && isset($_POST['cd_cliente_servico']) && $_POST['dt_pagamento'])

			{

				$clienteServico->retornarSaldo($_POST['cd_cliente_servico'], $_POST['vl_despesa_anterior']);

				$clienteServico->atualizarSaldo($_POST['cd_cliente_servico'], formata_numero_inserir($_POST['vl_despesa']));

			}



			$_POST['vl_despesa'] = formata_numero_inserir($_POST['vl_despesa']);

			$_POST['dt_despesa'] = formata_data_inserir($_POST['dt_despesa']);

			$_POST['dt_pagamento'] = formata_data_inserir($_POST['dt_pagamento']);

			$_POST['vl_moeda'] = formata_numero_inserir($_POST['vl_moeda']);

			if (isset($_POST['cd_despesa']) && $_POST['cd_despesa'] > 0){

				$despesa->alterar();

				//mysql_query($despesa->statement);
				mysqli_query($_SESSION['db_con'], $despesa->statement);

			} 

			else 

			{

				$despesa->inserir();

				$_POST['cd_despesa'] = $_SESSION['cd_despesa'];

			}

			

			$despesa->carregaDespesa();

			include ('despesa_cad.php');

		}

		else if ($_POST['str_acao'] == 'exc' && $_POST['cd_despesa'] > 0)

		{

			if (isset($_POST['cd_cliente_servico']) && $_POST['dt_pagamento'])

			{

				$clienteServico->retornarSaldo($_POST['cd_cliente_servico'], formata_numero_inserir($_POST['vl_despesa']));

			}

			$despesa->deletar();

			include('despesa_lis.php');

		}

	}

	else

	{

		include ('despesa_lis.php');

	}

?>