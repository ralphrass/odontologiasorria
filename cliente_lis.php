<?php
    session_start();
    //print_r($_SESSION);
?>
<script type="text/javascript">
function loadXMLDoc(td_name, cd_cliente)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById(td_name).innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("POST","cliente_servico_lis.php?cd_cliente="+cd_cliente,true);
xmlhttp.setRequestHeader('Content-Type','text/xml'); 
xmlhttp.setRequestHeader('encoding','ISO-8859-1'); 
xmlhttp.send("cd_cliente="+cd_cliente);
}

function detalha_servicos(img, cd_cliente)
{
	var td_name = "td_"+cd_cliente;
	if (img.title == "plus")
	{
		img.src = "img/minus.png";
		img.title = "minus";
		document.getElementById(td_name).style.display = "";
		loadXMLDoc(td_name, cd_cliente);
	}
	else
	{
		img.src = "img/plus.png";
		img.title = "plus";
		document.getElementById(td_name).innerHTML = "";
		document.getElementById(td_name).style.display = "none";
	}
}
<?  ?>
</script>
<form name="orc_filter" method="post" enctype="multipart/form-data" action="">
<table width="70%" border="0" class="tabela_lista">
  <tr>
    <td width="23%" class="tabela_label">Nome do Cliente:</td>
    <td width="77%"><label>
      <input name="f_nm_cliente" id="f_nm_cliente" type="text" size="30" maxlength="200" value="<?php if (isset($_POST['f_nm_cliente'])) echo $_POST['f_nm_cliente']; ?>" />
    </label></td>
    </tr>
</table>
</form>
<br/>
<?php
if ($_POST['str_acao'] == 'pes'){
	
	$query = "select c.cd_cliente, c.nm_cliente, c.ds_ficha, c.ds_ficha_orto  
				from cliente c 								where c.cd_empresa = ".$_SESSION['s_cd_empresa'];
	
	if ($_POST['f_nm_cliente']){
		$query .= " and nm_cliente LIKE '%".$_POST['f_nm_cliente']."%' ";
	}
	
	$query .= " order by nm_cliente ";
	//echo $query;
	//$rs = mysql_query($query) or die(mysql_error());
	$rs = mysqli_query($_SESSION['db_con'], $query); // or die(mysqli_error());
?>
<input type="hidden" name="cd_cliente" id="cd_cliente">
<input type="hidden" name="cd_cliente_servico" id="cd_cliente_servico">
<table width="70%" border="0" class="tabela_lista">
  <tr>
    <td width="312" class="tabela_label">Nome</td>
    <td width="98" class="tabela_label">Nr Ficha</td>
    <td width="96" class="tabela_label">Nr Ficha Orto</td>
    <td width="127" class="tabela_label">Saldo Devedor</td>
    <td class="tabela_label" width="44">Editar</td>
  </tr>
 <?php 
	//while($row = mysql_fetch_array($rs))
	while ($row = mysqli_fetch_array($rs))
	{
		$img_name = "img_".$row['cd_cliente'];
		
		$sql_saldo = "SELECT SUM(vl_saldo) AS vl_saldo FROM cliente_servico WHERE cd_cliente = ".$row['cd_cliente'];
	  	//$rs_saldo = mysql_query($sql_saldo);
	  	//$row_saldo = mysql_fetch_array($rs_saldo);
	  	$rs_saldo = mysqli_query($_SESSION['db_con'], $sql_saldo);
	  	$row_saldo = mysqli_fetch_array($rs_saldo);
 ?>
      <tr onmouseover="this.bgColor='#66CCCC'" onmouseout="this.bgColor=''">
        <td class="tabela_linha"><img src="img/plus.png" style="vertical-align:bottom" id="<?php echo $img_name; ?>" onclick="detalha_servicos(this, '<?php echo $row['cd_cliente']; ?>')" title="plus" /><?php echo $row['nm_cliente']; ?></td>
        <td class="tabela_linha"><?php echo $row['ds_ficha']; ?></td>
        <td class="tabela_linha"><?php echo $row['ds_ficha_orto']; ?></td>
        <td class="tabela_linha">R$ <?php echo formata_numero_mostrar($row_saldo['vl_saldo']); ?></td>
        <td class="tabela_linha"><img src="img/editar.png" width="16" height="16" onclick="seta_acao_editar_cliente('edi', '<?php echo $row['cd_cliente']; ?>')" /></td>
      </tr>
      <tr><td colspan="5" id="td_<?php echo $row['cd_cliente']; ?>" style="display:none"></td></tr>
<?php 
	}
?>
</table>
<?php
}
?>
