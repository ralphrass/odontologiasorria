<?php require_once("php7_mysql_shim.php");
	require_once('dao/tipo_material.php');
	
	$ds_tipo_material = $qt_estoque = "";
	
	if (isset($_POST['cd_tipo_material']) && $_POST['cd_tipo_material'] > 0){
		//Carrega os dados do tipo_material
		$result = mysql_query($tipo_material->statement);
		
		$row = mysql_fetch_array($result);
		
		$ds_tipo_material = $row['ds_tipo_material'];
		$qt_estoque = $row['qt_estoque'];
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<table width="100%" border="0" class="tabela_lista">
<input type="hidden" name="cd_tipo_material" id="cd_tipo_material" value="<?php if (isset($_POST['cd_tipo_material'])) echo $_POST['cd_tipo_material']; ?>">
  <tr>
    <td colspan="2" align="center" class="tabela_label">Dados do Tipo de Material</td>
  </tr>
  <tr>
    <td width="104" class="tabela_label">Descri��o:</td>
    <td colspan="3" class="tabela_linha">
      <input name="ds_tipo_material" type="text" id="ds_tipo_material" size="50" maxlength="200" value="<?php echo $ds_tipo_material; ?>"></td>
  </tr>
  <tr>
    <td class="tabela_label">Qt. Estoque:</td>
    <td width="628" class="tabela_linha"><input name="qt_estoque" type="text" id="qt_estoque" size="20" maxlength="20" value="<?php echo $qt_estoque; ?>"></td>
  </tr>
</table>
