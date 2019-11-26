<form name="orc_filter" method="post" enctype="multipart/form-data" action="<?php require_once("php7_mysql_shim.php");=$PHP_SELF?>">
<table width="70%" border="0" class="tabela_lista">
  <tr>
    <td width="25%" class="tabela_label">Nome do usuario:</td>
    <td width="75%" class="tabela_linha"><label>
      <input name="f_nm_usuario" id="f_nm_usuario" type="text" size="30" maxlength="200" value="<?php if (isset($_POST['f_nm_usuario'])) echo $_POST['f_nm_usuario']; ?>" />
    </label></td>
    </tr>
</table>
</form>
<br/>
<?php
if ($_POST['str_acao'] == 'pes'){
	
	$query = "select u.cd_usuario, u.nm_usuario, u.ds_login 
				from usuario u ";
	
	if ($_POST['f_nm_usuario']){
		$query .= " where nm_usuario LIKE '%".$_POST['f_nm_usuario']."%' ";
	}
	
	$query .= " order by nm_usuario ";
	$rs = mysql_query($query) or die(mysql_error());
?>
<input type="hidden" name="cd_usuario" id="cd_usuario">
<table width="70%" border="0" class="tabela_lista">
  <tr>
    <td width="646" class="tabela_label">Nome</td>
    <td width="47" class="tabela_label">Editar</td>
  </tr>
 <?php 
	while($row = mysql_fetch_array($rs))
	{
 ?>
      <tr onmouseover="this.bgColor='#66CCCC'" onmouseout="this.bgColor=''">
        <td class="tabela_linha"><?php echo $row['nm_usuario']; ?></td>
        <td class="tabela_linha"><img src="img/editar.png" width="16" height="16" onclick="seta_acao_editar_usuario('edi', '<?php echo $row['cd_usuario']; ?>')" /></td>
      </tr>
<?php 
	}
?>
</table>
<?php
}
?>