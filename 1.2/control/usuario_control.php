<?php require_once("php7_mysql_shim.php");
	include_once('dao/usuario.php');
	
	if (isset($_POST['str_acao']))
	{
		$usuario = new usuario();
		
		if ($_POST['str_acao'] == 'cad')
		{
			include ('usuario_cad.php');
		}
		elseif($_POST['str_acao'] == 'edi')
		{
			if (isset($_POST['cd_usuario']) && $_POST['cd_usuario'] > 0){
				$usuario->carregaUsuario();
				include ('usuario_cad.php');
			}
		}
		elseif ($_POST['str_acao'] == 'lis' || $_POST['str_acao'] == '' || $_POST['str_acao'] == 'pes')
		{
			$URL_EDIT = "usuario_cad.php";
			include ('usuario_lis.php');
		}
		elseif ($_POST['str_acao'] == 'sal')
		{
			if (!isset($_POST['sn_usuario_preferencial']))
				$_POST['sn_usuario_preferencial'] = 'N';
			
			if (isset($_POST['cd_usuario']) && $_POST['cd_usuario'] > 0)
			{
				$usuario->alterar();
				mysql_query($usuario->statement);
			} 
			else 
			{
				$usuario->inserir();
				$_POST['cd_usuario'] = $_SESSION['cd_usuario'];
			}
			
			$usuario->carregaUsuario();
			include ('usuario_cad.php');
		}
		else if ($_POST['str_acao'] == 'exc' && $_POST['cd_usuario'] > 0)
		{		
			$usuario->deletar();
			include('usuario_lis.php');
		}
	}
	else
	{
		include ('usuario_lis.php');
	}
?>