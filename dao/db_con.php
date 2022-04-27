<?php 
	 
$servidor = 'mysql.odontologiasorria.com.br';
$usuario = 'odontologiasorr';
$senha = '0d0nt0$r';//$servidor = 'localhost';//$usuario = 'root';//$senha = '';
$banco = 'odontologiasorria';

/*$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'odonto';*/

//Hostgator
$servidor = 'localhost';
$usuario = "odon1919_odonto";
$banco = 'odon1919_odontologiasorria';

//echo 'PHP version: ' . phpversion();

#Conectando, escolhendo o banco de dados
$link = mysqli_connect($servidor, $usuario, $senha, $banco);

//echo $link;

/*if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}*/

//$link = mysql_connect($servidor, $usuario, $senha)
//or die('Nao foi possivel conectar: ' . mysql_error());

//mysql_select_db($banco) or die('Nao pude selecionar o banco de dados');

$_SESSION['db_con'] = $link;
?>