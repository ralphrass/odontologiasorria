<?php require_once("php7_mysql_shim.php");
header("Content-type: text/xml; charset=ISO-8859-1");
print '<?xml version="1.0" encoding="ISO-8859-1"?>';
?>
<select name="cd_cliente_servico" id="cd_cliente_servico">
<?php
	include("dao/db_con.php");
	include("inc/util.inc.php");
	$sql = "SELECT cd_cliente_servico, ds_servico, dt_servico, vl_saldo  
			FROM cliente_servico 
			WHERE cd_cliente = ".$_REQUEST['cd_cliente']." 
			AND vl_saldo > 0 
			AND sn_contratar = 'S' 
			ORDER BY dt_servico DESC ";
	$rs = mysql_query($sql);
	while ($row = mysql_fetch_array($rs))
	{
		$selected = (isset($_REQUEST['cd_cliente_servico']) && $_REQUEST['cd_cliente_servico'] == $row['cd_cliente_servico'])?"selected=\"selected\"":"";
		echo "<option value=\"".$row['cd_cliente_servico']."\" ".$selected.">".formata_data_mostrar($row['dt_servico'])." - ".$row['ds_servico']." - (R$ ".formata_numero_mostrar($row['vl_saldo']).")</option>";
		echo $row['ds_servico'];
	}
?>
</select>