<?php require_once("php7_mysql_shim.php");
	include_once('dao/tipo_material.php');
	
	if (isset($_POST['str_acao']))
	{
		$tipo_material = new TipoMaterial();
		
		if ($_POST['str_acao'] == 'cad')
		{
			include ('tipo_material_cad.php');
		}
		elseif($_POST['str_acao'] == 'edi')
		{
			if (isset($_POST['cd_tipo_material']) && $_POST['cd_tipo_material'] > 0){
				$tipo_material->carregaTipoMaterial();
				include ('tipo_material_cad.php');
			}
		}
		elseif ($_POST['str_acao'] == 'lis' || $_POST['str_acao'] == '' || $_POST['str_acao'] == 'pes')
		{
			$URL_EDIT = "tipo_material_cad.php";
			include ('tipo_material_lis.php');
		}
		elseif ($_POST['str_acao'] == 'sal')
		{
			if (isset($_POST['cd_tipo_material']) && $_POST['cd_tipo_material'] > 0){
				$tipo_material->alterar();
				mysql_query($tipo_material->statement);
			} 
			else 
			{
				$tipo_material->inserir();
				$_POST['cd_tipo_material'] = $_SESSION['cd_tipo_material'];
			}
			
			$tipo_material->carregaTipoMaterial();
			include ('tipo_material_cad.php');
		}
		else if ($_POST['str_acao'] == 'exc' && $_POST['cd_tipo_material'] > 0)
		{		
			$tipo_material->deletar();
			include('tipo_material_lis.php');
		}
	}
	else
	{
		include ('tipo_material_lis.php');
	}
?>