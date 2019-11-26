<?php require_once("php7_mysql_shim.php");
	//include_once('dao/relatorio.php');
	
	if (isset($_POST['str_acao']))
	{
		//$relatorio = new relatorio();
		
		if ($_POST['str_acao'] == 'cad')
		{
			include ('relatorio_cad.php');
		}
		elseif($_POST['str_acao'] == 'edi')
		{
			if (isset($_POST['cd_relatorio']) && $_POST['cd_relatorio'] > 0){
				$relatorio->carregarelatorio();
				include ('relatorio_cad.php');
			}
		}
		elseif ($_POST['str_acao'] == 'lis' || $_POST['str_acao'] == '' || $_POST['str_acao'] == 'pes')
		{
			$URL_EDIT = "relatorio_cad.php";
			include ('relatorio_lis.php');
		}
		elseif ($_POST['str_acao'] == 'sal')
		{
			if (isset($_POST['cd_relatorio']) && $_POST['cd_relatorio'] > 0){
				$relatorio->alterar();
				mysql_query($relatorio->statement);
			} 
			else 
			{
				$relatorio->inserir();
				$_POST['cd_relatorio'] = $_SESSION['cd_relatorio'];
			}
			
			$relatorio->carregarelatorio();
			include ('relatorio_cad.php');
		}
		else if ($_POST['str_acao'] == 'exc' && $_POST['cd_relatorio'] > 0)
		{		
			$relatorio->deletar();
			include('relatorio_lis.php');
		}
	}
	else
	{
		include ('relatorio_lis.php');
	}
?>