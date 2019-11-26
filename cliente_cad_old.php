<?php require_once("php7_mysql_shim.php");
	require_once('dao/cliente.php');
	
	$nm_cliente = $ds_endereco = $ds_telefone_residencial = $ds_telefone_celular = $nr_rg = $nr_cpf = $ds_ficha = $dt_nascimento = "";
	
	if (isset($_POST['cd_cliente']) && $_POST['cd_cliente'] > 0){
		//Carrega os dados do cliente
		$result = mysql_query($cliente->statement);
		
		$row = mysql_fetch_array($result);
		
		$nm_cliente = $row['nm_cliente'];
		$ds_endereco = $row['ds_endereco'];
		$ds_telefone_residencial = $row['ds_telefone_residencial'];
		$ds_telefone_celular = $row['ds_telefone_celular'];
		$nr_rg = $row['nr_rg'];
		$nr_cpf = $row['nr_cpf'];
		$ds_ficha = $row['ds_ficha'];
		$dt_nascimento = $row['dt_nascimento'];
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<table width="100%" border="0" class="tabela_lista">
<input type="hidden" name="cd_cliente" id="cd_cliente" value="<?php if (isset($_POST['cd_cliente'])) echo $_POST['cd_cliente']; ?>">
  <tr>
    <td colspan="4" align="center" class="tabela_label">Dados do Cliente</td>
  </tr>
  <tr>
    <td class="tabela_label">Nr. Ficha:</td>
    <td colspan="3" class="tabela_linha"><input name="ds_ficha" type="text" id="ds_ficha" size="50" maxlength="200" value="<?php echo $ds_ficha; ?>"></td>
  </tr>
  <tr>
    <td width="150" class="tabela_label">Nome do Cliente: </td>
    <td colspan="3" class="tabela_linha">
      <input name="nm_cliente" type="text" id="nm_cliente" size="50" maxlength="200" value="<?php echo $nm_cliente; ?>"></td>
  </tr>
  <tr>
    <td class="tabela_label">Endere&ccedil;o:</td>
    <td colspan="3" class="tabela_linha"><input name="ds_endereco" type="text" id="ds_endereco" size="80" maxlength="500" value="<?php echo $ds_endereco; ?>"></td>
  </tr>
  <tr>
    <td class="tabela_label">Telefone Residencial:</td>
    <td width="136" class="tabela_linha"><label>
      <input name="ds_telefone_residencial" type="text" id="ds_telefone_residencial" size="20" maxlength="15" value="<?php echo $ds_telefone_residencial; ?>">
    </label></td>
    <td width="110" class="tabela_label">Telefone Celular:</td>
    <td width="328" class="tabela_linha"><input name="ds_telefone_celular" type="text" id="ds_telefone_celular" size="20" maxlength="15" value="<?php echo $ds_telefone_celular; ?>"></td>
  </tr>
  <tr>
    <td class="tabela_label">RG:</td>
    <td class="tabela_linha"><input name="nr_rg" type="text" id="nr_rg" size="20" maxlength="15" value="<?php echo $nr_rg; ?>" /></td>
    <td class="tabela_label">CPF:</td>
    <td class="tabela_linha"><input name="nr_cpf" type="text" id="nr_cpf" size="20" maxlength="15" value="<?php echo $nr_cpf; ?>" /></td>
  </tr>
  <tr>
    <td class="tabela_label">Data Nascimento:</td>
    <td class="tabela_linha"><input name="dt_nascimento" type="text" id="dt_nascimento" size="20" maxlength="12" value="<?php echo formata_data_mostrar($dt_nascimento); ?>" /></td>
    <td class="tabela_label">&nbsp;</td>
    <td class="tabela_linha">&nbsp;</td>
  </tr>
</table>
