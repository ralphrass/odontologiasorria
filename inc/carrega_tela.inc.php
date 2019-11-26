<?php

//print_r($_POST);
//print_r($_SESSION);

require_once("util.inc.php");

	if (isset($_POST['str_tela']))
	{
		switch($_POST['str_tela'])
		{
			case 'orc':
				include ('control/orcamento_control.php');
				break;
				
			case 'cli':
				include ('control/cliente_control.php');
				break;
			
			case 'usu':
				include ('control/usuario_control.php');
				break;
			
			case 'ren':
				include ('control/receita_control.php');
				break;
			
			case 'des':
				include ('control/despesa_control.php');
				break;
				
			case 'che':
				include ('control/cheque_control.php');
				break;									case 'bal':				include ('control/balanco_control.php');								break;
				
			case 'mat':
				include ('control/tipo_material_control.php');
				break;
			
			case 'est':
				include ('control/estoque_control.php');
				break;
			
			case 'rel':
				include ('control/relatorio_control.php');
				break;
			
			default:
			echo '&nbsp;';
			break;
		}
	}
?>