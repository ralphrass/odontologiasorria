<?php ?>
<form name="orc_filter" method="post" enctype="multipart/form-data" action="">
<table width="70%" border="0" class="tabela_lista">
  <tr>
    <td width="23%" class="tabela_label">Tipo de Material:</td>
    <td width="77%" class="tabela_linha"><label>
      <input name="f_ds_tipo_material" id="f_ds_tipo_material" type="text" size="30" maxlength="200" value="<?php if (isset($_POST['f_ds_tipo_material'])) echo $_POST['f_ds_tipo_material']; ?>" />
    </label></td>
    </tr>
</table>
</form>
<br/>
<?php
if ($_POST['str_acao'] == 'pes'){
	
	$query = "select u.cd_tipo_material, u.ds_tipo_material, u.qt_estoque 
				from tipo_material u 								where u.cd_empresa = ".$_SESSION['s_cd_empresa']." 				";
	
	if ($_POST['f_ds_tipo_material']){
		$query .= " and ds_tipo_material LIKE '%".$_POST['f_ds_tipo_material']."%' ";
	}
	
	$query .= " order by ds_tipo_material ";
	//$rs = mysql_query($query) or die(mysql_error());
	$rs = mysqli_query($_SESSION['db_con'], $query);
?>
<input type="hidden" name="cd_tipo_material" id="cd_tipo_material">
<table width="70%" border="0" class="tabela_lista">
  <tr>
    <td width="75%" class="tabela_label">Nome</td>
    <td width="20%" class="tabela_label">Estoque</td>
    <td width="5%" class="tabela_label">Editar</td>
  </tr>
 <?php 
	//while($row = mysql_fetch_array($rs))
	while($row = mysqli_fetch_array($rs))
	{
 ?>
      <tr onmouseover="this.bgColor='#66CCCC'" onmouseout="this.bgColor=''">
        <td class="tabela_linha"><?php echo $row['ds_tipo_material']; ?></td>
        <td class="tabela_linha"><?php echo $row['qt_estoque']; ?></td>
        <td class="tabela_linha"><img src="img/editar.png" width="16" height="16" onclick="seta_acao_editar_tipo_material('edi', '<?php echo $row['cd_tipo_material']; ?>')" /></td>
      </tr>
<?php 
	}
?>
</table>
<?php
}
?>