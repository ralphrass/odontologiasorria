<script language="javascript" src="js/date_picker.js"></script>
<LINK href="css/date_picker.css" rel="stylesheet" type="text/css">
<?php require_once("php7_mysql_shim.php");

	require_once('dao/cliente.php');
	
	$nm_cliente = $ds_endereco = $ds_telefone_residencial = $ds_telefone_celular = $nr_rg = $nr_cpf = 
	$ds_servico = $dt_servico = $vl_servico = $ds_forma_pagamento = $ds_quantidade_parcela = 
	$sn_contratar = $dt_vencimento = $ds_observacao = $ds_banco = $ds_agencia = $nr_cheque = 
	$dt_parcela = $vl_parcela = $dt_pagamento = $ds_ficha = $tp_servico = $dt_nascimento = $ds_ficha_orto = "";
	
	if (isset($_POST['cd_cliente']) && $_POST['cd_cliente'] > 0){
		$result = mysql_query($cliente->statement);
		$row = mysql_fetch_array($result);
		
		$nm_cliente = $row['nm_cliente'];
		$ds_endereco = $row['ds_endereco'];
		$ds_telefone_residencial = $row['ds_telefone_residencial'];
		$ds_telefone_celular = $row['ds_telefone_celular'];
		$nr_rg = $row['nr_rg'];
		$nr_cpf = $row['nr_cpf'];
		$dt_nascimento = $row['dt_nascimento'];
		$ds_ficha = $row['ds_ficha'];
		$ds_ficha_orto = $row['ds_ficha_orto'];
		
		$result = mysql_query($servico->statement);
		if ($result)
		{
			$row = mysql_fetch_array($result);
			
			$ds_servico = $row['ds_servico'];
			$dt_servico = $row['dt_servico'];
			$vl_servico = $row['vl_servico'];
			$sn_contratar = $row['sn_contratar'];
			$ds_quantidade_parcela = $row['ds_quantidade_parcela'];
			$ds_observacao = $row['ds_observacao'];
			$tp_servico = $row['tp_servico'];
		}
		else
		{
			$dt_servico = date('Y-m-d');
		}
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<table width="100%" border="0" class="tabela_lista">
<input type="hidden" name="cd_cliente" id="cd_cliente" value="<?php if (isset($_POST['cd_cliente'])) echo $_POST['cd_cliente']; ?>">
<input type="hidden" name="cd_cliente_servico" id="cd_cliente_servico" value="<?php if (isset($_POST['cd_cliente_servico'])) echo $_POST['cd_cliente_servico']; ?>"><input type="hidden" name="cd_empresa" id="cd_empresa" value="<?php echo $_SESSION['s_cd_empresa']; ?>" />
  <tr>
    <td colspan="4" align="center" class="tabela_titulo">Dados do Cliente</td>
  </tr>
  <tr>
    <td class="tabela_label">Nr. Ficha Normal:</td>
    <td width="300" class="tabela_linha"><input name="ds_ficha" type="text" id="ds_ficha" size="10" maxlength="10" value="<?php echo $ds_ficha; ?>" /></td>
    <td width="163" class="tabela_label">Nr. Ficha Orto:</td>
    <td width="319" class="tabela_linha"><input name="ds_ficha_orto" type="text" id="ds_ficha_orto" size="10" maxlength="10" value="<?php echo $ds_ficha_orto; ?>" /></td>
  </tr>
  <tr>
    <td width="181" class="tabela_label">Nome do Cliente: </td>
    <td colspan="3" class="tabela_linha">
      <input name="nm_cliente" type="text" id="nm_cliente" size="50" maxlength="200" value="<?php echo $nm_cliente; ?>"></td>
  </tr>
  <tr>
    <td class="tabela_label">Endere&ccedil;o:</td>
    <td colspan="3" class="tabela_linha"><input name="ds_endereco" type="text" id="ds_endereco" size="80" maxlength="500" value="<?php echo $ds_endereco; ?>"></td>
  </tr>
  <tr>
    <td class="tabela_label">Telefone Residencial:</td>
    <td colspan="3" class="tabela_linha"><label>
      <input name="ds_telefone_residencial" type="text" id="ds_telefone_residencial" size="20" maxlength="15" value="<?php echo $ds_telefone_residencial; ?>">
    </label></td>
  </tr>
  <tr>
    <td class="tabela_label">Telefone Celular:</td>
    <td colspan="3" class="tabela_linha"><input name="ds_telefone_celular" type="text" id="ds_telefone_celular" size="20" maxlength="15" value="<?php echo $ds_telefone_celular; ?>" /></td>
  </tr>
  <tr>
    <td class="tabela_label">RG:</td>
    <td colspan="3" class="tabela_linha"><input name="nr_rg" type="text" id="nr_rg" size="20" maxlength="15" value="<?php echo $nr_rg; ?>" /></td>
  </tr>
  <tr>
    <td class="tabela_label">CPF:</td>
    <td colspan="3" class="tabela_linha"><input name="nr_cpf" type="text" id="nr_cpf" size="20" maxlength="15" value="<?php echo $nr_cpf; ?>" /></td>
  </tr>
  <tr>
    <td class="tabela_label">Data Nascimento:</td>
    <td colspan="3" class="tabela_linha"><input name="dt_nascimento" type="text" id="dt_nascimento" size="20" maxlength="12" value="<?php echo formata_data_mostrar($dt_nascimento); ?>" /></td>
  </tr>
  <tr>
    <td colspan="4" align="center" class="tabela_titulo">Dados do Or&ccedil;amento</td>
  </tr>
  <tr>
    <td class="tabela_label">Tipo do Servi&ccedil;o:</td>
    <td colspan="3" class="tabela_linha">
    <select name="tp_servico" id="tp_servico">
    	<option value="" selected="selected"></option>
        <option value="C" <?php if ($tp_servico == "C") echo "selected=\"selected\""; ?>>Comum</option>
        <option value="O" <?php if ($tp_servico == "O") echo "selected=\"selected\""; ?>>Orto</option>
    </select>
    </td>
  </tr>
  <tr>
    <td class="tabela_label">Servi&ccedil;o:</td>
    <td colspan="3" class="tabela_linha"><input name="ds_servico" type="text" id="ds_servico" size="50" maxlength="200" value="<?php echo $ds_servico; ?>"></td>
  </tr>
  <tr>
    <td class="tabela_label">Data do Servi&ccedil;o:</td>
    <td colspan="3" class="tabela_linha"><input name="dt_servico" type="text" id="dt_servico" size="20" maxlength="15" value="<?php echo formata_data_mostrar($dt_servico); ?>"> <img onclick="displayDatePicker('dt_servico');" src="img/calendar-select.png" /></td>
  </tr>
  <tr>
    <td class="tabela_label">Valor do Or&ccedil;amento:</td>
    <td colspan="3" class="tabela_linha"><input name="vl_servico" type="text" id="vl_servico" size="20" maxlength="15" value="<?php echo formata_numero_mostrar($vl_servico); ?>"></td>
  </tr>
  <tr>
    <td class="tabela_label">Quantidade de Parcelas:</td>
    <td colspan="3" class="tabela_linha"><input name="ds_quantidade_parcela" type="text" id="ds_quantidade_parcela" size="20" maxlength="15" value="<?php echo $ds_quantidade_parcela; ?>"></td>
  </tr>
  <tr>
    <td class="tabela_label">Observa&ccedil;&atilde;o:</td>
    <td colspan="3" class="tabela_linha"><textarea name="ds_observacao" cols="80" rows="2" id="ds_observacao"><?php echo $ds_observacao; ?></textarea></td>
  </tr>
  <tr>
    <td class="tabela_label">Contratar:</td>
    <td colspan="3" class="tabela_linha">
        <input type="radio" name="sn_contratar" value="S" id="sn_contratar" <?php if ($sn_contratar == 'S') echo "checked=\"checked\""; ?>>Sim
        <input type="radio" name="sn_contratar" value="N" id="sn_contratar" <?php if ($sn_contratar == 'N' || !$sn_contratar) echo "checked=\"checked\""; ?>>N&atilde;o
    </td>
  </tr>
</table>