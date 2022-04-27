<?php require_once("php7_mysql_shim.php");
	 
$servidor = 'mysql.odontologiasorria.com.br';
$usuario = 'odontologiasorr';
$senha = '0d0nt0';
$banco = 'odontologiasorria';

/*$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'odonto';*/

#Conectando, escolhendo o banco de dados
$link = mysql_connect($servidor, $usuario, $senha)
or die('Não foi possivel conectar: ' . mysql_error());

mysql_select_db($banco) or die('Não pude selecionar o banco de dados');

$_SESSION['db_con'] = $link;
?>