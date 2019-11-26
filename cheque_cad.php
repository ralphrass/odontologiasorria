<script type="text/javascript">
function loadXMLDoc(td_name, nr_ficha, tp_grupo)
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
  
  var strData = "nr_ficha="+nr_ficha+"&tp_grupo="+tp_grupo;
  
xmlhttp.open("POST","inc/cliente_select.inc.php?"+strData,true);
xmlhttp.setRequestHeader('Content-Type','text/xml'); 
xmlhttp.setRequestHeader('encoding','ISO-8859-1'); 
xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
xmlhttp.setRequestHeader('Content-length', strData.length ); 
xmlhttp.send(strData);
}

function seleciona_cliente()
{
	var td_name = "cliente_select";
	var nr_ficha = document.getElementById('nr_ficha').value;
	var tp_grupo = document.getElementById('tp_despesa_grupo').options[document.getElementById('tp_despesa_grupo').selectedIndex].value;
	loadXMLDoc(td_name, nr_ficha, tp_grupo);
}
</script>
<script language="javascript" src="js/date_picker.js"></script>
<LINK href="css/date_picker.css" rel="stylesheet" type="text/css">
<?php require_once("php7_mysql_shim.php");
	require_once('dao/usuario.php');
	
	$cd_usuario = $ds_despesa = $dt_despesa = $vl_despesa = $tp_despesa_grupo = $tp_fluxo = $cd_cliente = $cd_cliente_servico = $dt_pagamento = $ds_banco = $ds_agencia = $ds_cheque = $nr_ficha = "";
	
	if (isset($_POST['cd_despesa']) && $_POST['cd_despesa'] > 0){
		$result = mysql_query($despesa->statement);
		$row = mysql_fetch_array($result);
		
		$cd_usuario = $row['cd_usuario'];
		$ds_despesa = $row['ds_despesa'];
		$dt_despesa = $row['dt_despesa'];
		$vl_despesa = $row['vl_despesa'];
		$tp_despesa_grupo = $row['tp_despesa_grupo'];
		$tp_fluxo = $row['tp_fluxo'];
		$cd_cliente = $row['cd_cliente'];
		$cd_cliente_servico = $row['cd_cliente_servico'];
		$dt_pagamento = $row['dt_pagamento'];
		$ds_banco = $row['ds_banco'];
		$ds_agencia = $row['ds_agencia'];
		$ds_cheque = $row['ds_cheque'];
		
		$ds_ficha = ($tp_despesa_grupo=='ORTO')?'ds_ficha_orto':'ds_ficha';
		$sqlFicha = "SELECT ".$ds_ficha." FROM cliente WHERE cd_cliente = ".$cd_cliente;
		$resultFicha = mysql_query($sqlFicha);
		$rowFicha = mysql_fetch_array($resultFicha);
		$nr_ficha = $rowFicha[$ds_ficha];
		
		if ($cd_cliente){
			echo "<script>loadXMLDoc('td_cliente_servico', '".$cd_cliente."', '".$cd_cliente_servico."');</script>";
		}
		
	} else {
		$dt_despesa = date('Y-m-d');
		$cd_usuario = $_SESSION['s_cd_usuario'];
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<table width="70%" border="0" class="tabela_lista">
<input type="hidden" name="cd_despesa" id="cd_despesa" value="<?php if (isset($_POST['cd_despesa'])) echo $_POST['cd_despesa']; ?>">
<input type="hidden" name="dt_pagamento_anterior" id="dt_pagamento_anterior" value="<?php if (isset($dt_pagamento)) echo $dt_pagamento; else echo ""; ?>">
<input type="hidden" name="vl_despesa_anterior" id="vl_despesa_anterior" value="<?php if (isset($vl_despesa)) echo $vl_despesa; else echo ""; ?>">
<input type="hidden" name="tp_fluxo" value="C">
<input type="hidden" name="cd_usuario" value="<?php if (isset($cd_usuario)) echo $cd_usuario; else echo ""; ?>">
<input type="hidden" name="cd_cliente_servico" value=""><input type="hidden" name="cd_empresa" value="<?php echo $_SESSION["s_cd_empresa"]; ?>">
  <tr>
    <td colspan="2" align="center" class="tabela_label">Dados do Cheque</td>
  </tr>
  <tr>
    <td width="22%" class="tabela_label">Grupo Receita:</td>
    <td width="78%" class="tabela_linha">
    <select name="tp_despesa_grupo" id="tp_despesa_grupo">
      <option value="" selected="selected"></option>
      <option value="NORMAL" <?php if ($tp_despesa_grupo == 'NORMAL') echo "selected=\"selected\""; ?>>Normal</option>
      <option value="ORTO" <?php if ($tp_despesa_grupo == 'ORTO') echo "selected=\"selected\""; ?>>Orto</option>
    </select></td>
  </tr>
  <tr>
    <td class="tabela_label">Nr. Ficha:</td>
    <td class="tabela_linha"><input name="nr_ficha" type="text" id="nr_ficha" size="10" maxlength="10" value="<?php echo $nr_ficha; ?>" />
      <input type="button" onclick="seleciona_cliente();" name="button" id="button" value="Carregar Cliente" /></td>
  </tr>
  <tr>
    <td class="tabela_label">Cliente:</td>
    <td class="tabela_linha" id="cliente_select"><select name="cd_cliente" id="cd_cliente">
      <option value="" selected="selected"></option>
      <?php
	  	$sql_u = "SELECT cd_cliente, nm_cliente 
				  FROM cliente 				  				  WHERE cd_empresa = ".$_SESSION["s_cd_empresa"]." 
				  ORDER BY nm_cliente ";
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
    </select></td>
  </tr>
  <tr>
    <td class="tabela_label">N&uacute;mero Cheque:</td>
    <td class="tabela_linha"><input name="ds_cheque" type="text" id="ds_cheque" size="50" maxlength="50" value="<?php echo $ds_cheque; ?>" /></td>
  </tr>
  <tr>
    <td class="tabela_label">Nome Cheque:</td>
    <td class="tabela_linha"><input name="ds_despesa" type="text" id="ds_despesa" size="50" maxlength="50" value="<?php echo $ds_despesa; ?>" /></td>
  </tr>
  <tr>
    <td class="tabela_label">Ag&ecirc;ncia:</td>
    <td class="tabela_linha"><input type="text" name="ds_agencia" id="ds_agencia" value="<?php echo $ds_agencia; ?>" /></td>
  </tr>
  <tr>
    <td class="tabela_label">Banco:</td>
    <td class="tabela_linha"><input type="text" name="ds_banco" id="ds_banco" value="<?php echo $ds_banco; ?>" /></td>
  </tr>
  <tr>
    <td class="tabela_label">Valor:</td>
    <td class="tabela_linha"><input name="vl_despesa" type="text" id="vl_despesa" size="10" maxlength="10" value="<?php echo formata_numero_mostrar($vl_despesa); ?>"></td>
  </tr>
  <tr>
    <td class="tabela_label">Pr&eacute;-Datado:</td>
    <td class="tabela_linha"><input name="dt_despesa" type="text" id="dt_despesa" size="12" maxlength="12" value="<?php if ($dt_pagamento != '0000-00-00') echo formata_data_mostrar($dt_despesa); ?>" />
      <img src="img/calendar-select.png" onclick="displayDatePicker('dt_despesa');" /></td>
  </tr>
  <tr>
    <td class="tabela_label">Data Recebimento:</td>
    <td class="tabela_linha"><input name="dt_pagamento" type="text" id="dt_pagamento" size="12" maxlength="12" value="<?php if ($dt_pagamento != '0000-00-00') echo formata_data_mostrar($dt_pagamento); ?>" /> <img src="img/calendar-select.png" onclick="displayDatePicker('dt_pagamento');">
</td>
  </tr>
</table>
