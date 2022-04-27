<?php require_once("php7_mysql_shim.php"); 
session_start();
header("Content-type: text/xml; charset=ISO-8859-1");
print '<?xml version="1.0" encoding="ISO-8859-1"?>';
require_once('../dao/db_con.php'); 

?>
<select name="cd_cliente" id="cd_cliente">
<?php
$sql_u = "SELECT cd_cliente, nm_cliente 
          FROM cliente WHERE cd_empresa = ".$_SESSION['s_cd_empresa'];

if (isset($_REQUEST['nr_ficha']) && $_REQUEST['nr_ficha'] > 0 && isset($_REQUEST['tp_grupo']))
{
	$ds_ficha = ($_REQUEST['tp_grupo']=='ORTO')?'ds_ficha_orto':'ds_ficha';
	$sql_u .= " AND ".$ds_ficha." = '".$_REQUEST['nr_ficha']."' ";
}
		  
$sql_u .= "  ORDER BY nm_cliente ";
$rs_u = mysql_query($sql_u);
$selected = "";
while($row_u = mysql_fetch_array($rs_u)){
    if ($cd_cliente == $row_u['cd_cliente']){
        $selected = "selected=\"selected\"";
    }
    echo "<option value=".$row_u['cd_cliente']." ".$selected.">".$row_u['nm_cliente']."</option>";
    $selected = "";
}
?>
</select>
<?php //echo $sql_u; ?>