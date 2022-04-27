<?php 

error_reporting(E_ALL);

session_start();

include('dao/db_con.php');

$sql = "SELECT cd_usuario, sn_usuario_preferencial 
		FROM usuario 
		WHERE ds_login = '".$_POST['ds_login']."' 
		AND ds_senha = '".$_POST['ds_senha']."' 				AND cd_empresa = '".$_POST['empresa']."' ";

//$result = mysql_query($sql);

//echo "aqui ".$_SESSION['db_con'];
//echo "aqiuo 2";
//print_r($_SESSION);

$stmt = $_SESSION['db_con']->prepare('SELECT cd_usuario, sn_usuario_preferencial FROM usuario WHERE ds_login = ? AND ds_senha = ? AND cd_empresa = ?');
$stmt->bind_param('ssi', $_POST['ds_login'], $_POST['ds_senha'], $_POST['empresa']);


$stmt->execute();
$result = $stmt->get_result();

$row = mysqli_fetch_array($result);




//$row = mysql_fetch_array($result);

if ($row['cd_usuario'] > 0)
{
	$_SESSION['s_sn_usuario_preferencial'] = $row['sn_usuario_preferencial'];
	$_SESSION['s_cd_usuario'] = $row['cd_usuario'];		$_SESSION['s_cd_empresa'] = $_POST['empresa'];
	if ($row['sn_usuario_preferencial'] == 'N')
	{	
		if (date('D') == 'Sat' && ( (date('H') > 13 && date('i') > 30) || (date('H') < 8) ) ){
			header("Location:index.php?fora_periodo=1");
		} else if (date('D') == 'Sun') {
			//echo 'aqui!!!!!';
			header("Location:index.php?fora_periodo=1");
		} else if (date('D') != 'Sat' && date('D') != 'Sun' && ((date('H') > 19 && date('i') > 30) || date('H') < 8) ) {
			header("Location:index.php?fora_periodo=1");
		} else {
			header("Location:main.php");
		}
	} else {
		header("Location:main.php");
	}
}
else
	header("Location:index.php?senha_errada=1");

?>