<?php require_once("php7_mysql_shim.php");
	include_once('dao/estoque.php');
	include_once('dao/tipo_material.php');
	
	if (isset($_POST['str_acao']))
	{
		$estoque = new Estoque();
		$tipo_material = new TipoMaterial();
		
		if ($_POST['str_acao'] == 'cad')
		{
			include ('estoque_cad.php');
		}
		elseif($_POST['str_acao'] == 'edi')
		{
			if (isset($_POST['cd_material_movimento']) && $_POST['cd_material_movimento'] > 0){
				$estoque->carregaEstoque();
				include ('estoque_cad.php');
			}
		}
		elseif ($_POST['str_acao'] == 'lis' || $_POST['str_acao'] == '' || $_POST['str_acao'] == 'pes')
		{
			$URL_EDIT = "estoque_cad.php";
			include ('estoque_lis.php');
		}
		elseif ($_POST['str_acao'] == 'sal')
		{
			$_POST['dt_movimento'] = formata_data_inserir($_POST['dt_movimento']);
			
			if (isset($_POST['cd_material_movimento']) && $_POST['cd_material_movimento'] > 0)
			{
				$tipo_material->retornaEstoque($_POST['cd_material_movimento'], $_POST['cd_tipo_material']);
				$estoque->alterar();
				mysql_query($estoque->statement);
			} 
			else 
			{
				$estoque->inserir();
				$_POST['cd_material_movimento'] = $_SESSION['cd_material_movimento'];
			}
			
			$tipo_material->atualizaEstoque($_POST['cd_tipo_material'], $_POST['qt_movimento'], $_POST['tp_movimento']);
			$estoque->carregaEstoque();
			include ('estoque_cad.php');
		}
		else if ($_POST['str_acao'] == 'exc' && $_POST['cd_material_movimento'] > 0)
		{
			$tipo_material->retornaEstoque($_POST['cd_material_movimento'], $_POST['cd_tipo_material']);
			$estoque->deletar();
			include('estoque_lis.php');
		}
	}
	else
	{
		include ('estoque_lis.php');
	}
?>