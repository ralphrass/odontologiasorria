<?php require_once("php7_mysql_shim.php");
	require_once('dao/usuario.php');
	
	$nm_usuario = $ds_login = $ds_senha = $sn_usuario_preferencial = "";
	
	if (isset($_POST['cd_usuario']) && $_POST['cd_usuario'] > 0){
		//Carrega os dados do usuario
		$result = mysql_query($usuario->statement);
		
		$row = mysql_fetch_array($result);
		
		$nm_usuario = $row['nm_usuario'];
		$ds_login = $row['ds_login'];
		$ds_senha = $row['ds_senha'];
		$sn_usuario_preferencial = $row['sn_usuario_preferencial'];
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<table width="100%" border="0" class="tabela_lista">
<input type="hidden" name="cd_usuario" id="cd_usuario" value="<?php if (isset($_POST['cd_usuario'])) echo $_POST['cd_usuario']; ?>"><input type="hidden" name="cd_empresa" id="cd_empresa" value="<?php echo $_SESSION['s_cd_empresa']; ?>">
  <tr>
    <td colspan="4" align="center" class="tabela_label">Dados do Usuário</td>
  </tr>
  <tr>
    <td width="181" class="tabela_label">Nome do usuario: </td>
    <td colspan="3" class="tabela_linha">
      <input name="nm_usuario" type="text" id="nm_usuario" size="50" maxlength="200" value="<?php echo $nm_usuario; ?>"></td>
  </tr>
  <tr>
    <td class="tabela_label">Login:</td>
    <td width="240" class="tabela_linha"><input name="ds_login" type="text" id="ds_login" size="20" maxlength="20" value="<?php echo $ds_login; ?>"></td>
    <td width="174" class="tabela_label">Senha:</td>
    <td width="390" class="tabela_linha"><input name="ds_senha" type="password" id="ds_senha" size="20" maxlength="20" value="<?php echo $ds_senha; ?>"></td>
  </tr>
  <tr>
    <td class="tabela_label">Usu&aacute;rio Preferencial:</td>
    <td colspan="3" class="tabela_linha">
      <input type="radio" name="sn_usuario_preferencial" id="sn_usuario_preferencial" value="S" <?php if ($sn_usuario_preferencial == 'S') echo "checked=\"checked\"" ?> />Sim
      <input type="radio" name="sn_usuario_preferencial" id="sn_usuario_preferencial" value="N" <?php if ($sn_usuario_preferencial == 'N') echo "checked=\"checked\"" ?> />N&atilde;o 
    </td>
  </tr>
</table>
