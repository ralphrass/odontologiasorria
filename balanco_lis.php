<?php  session_start();?><script language="javascript" src="js/date_picker.js"></script>
<LINK href="css/date_picker.css" rel="stylesheet" type="text/css">
<form name="orc_filter" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<table width="100%" border="0" class="tabela_lista">
  <tr>    <td class="tabela_label">Dia:</td>    <td width="90%" class="tabela_linha">   	 <input name="f_dt_inicio" id="f_dt_inicio" type="text" size="12" maxlength="10"    	 	value="<?php if (isset($_POST['f_dt_inicio'])){ if (!empty($_POST['f_dt_inicio'])) echo $_POST['f_dt_inicio']; else { echo date('d/m/Y'); } }?>" />     <img src="img/calendar-select.png" onclick="displayDatePicker('f_dt_inicio');"></td>
    </tr>
</table>
</form>
<br/><?php		$total_receita = 0;	$total_receita_cartao = 0;	$total_receita_cheque = 0;	$total_despesa = 0;		$total_despesa_cheque = 0;	$total_cheque = 0;	$total_balanco = 0;	$font_color_balanco = "black";	$sobra_dinheiro = 0;	$sobra_cheque = 0;	$sobra_cartao = 0;	if (isset($_POST['f_dt_inicio']) && !empty($_POST['f_dt_inicio'])){		$criterio_empresa = "and despesa.cd_empresa = ".$_SESSION['s_cd_empresa'];				$where = (empty($where))?"where":"and";		$query_receita = "SELECT SUM(vl_despesa) AS vl_receita ".						 "FROM despesa ".						 "WHERE dt_despesa = '".formata_data_inserir($_POST['f_dt_inicio'])."' ".						 "AND tp_fluxo IN ('R') ". 						 "AND LOWER(forma_pagamento) = 'dinheiro' ".$criterio_empresa;				$query_receita_cartao = "SELECT SUM(vl_despesa) AS vl_receita ".						 "FROM despesa ".						 "WHERE dt_despesa = '".formata_data_inserir($_POST['f_dt_inicio'])."' ".						 "AND tp_fluxo IN ('R') ". 						 "AND LOWER(forma_pagamento) = 'cartao' ".$criterio_empresa;				$query_receita_cheque = "SELECT SUM(vl_despesa) AS vl_receita ".						 "FROM despesa ".						 "WHERE dt_despesa = '".formata_data_inserir($_POST['f_dt_inicio'])."' ".						 "AND (tp_fluxo IN ('C') OR (tp_fluxo IN ('R') AND LOWER(forma_pagamento) = 'cheque')) ".$criterio_empresa;				$query_despesa = "SELECT SUM(vl_despesa) AS vl_despesa ".						 "FROM despesa ".						 "WHERE dt_despesa = '".formata_data_inserir($_POST['f_dt_inicio'])."' ".						 "AND tp_fluxo = 'D' ".						 "AND LOWER(forma_pagamento) = 'dinheiro' ".$criterio_empresa;				$query_despesa_cheque = "SELECT SUM(vl_despesa) AS vl_despesa ".						 "FROM despesa ".						 "WHERE dt_despesa = '".formata_data_inserir($_POST['f_dt_inicio'])."' ".						 "AND tp_fluxo = 'D' ".						 "AND LOWER(forma_pagamento) = 'cheque' ".$criterio_empresa;							  		

//$rsr = mysql_query($query_receita) or die(mysql_error());
//$rowr = mysql_fetch_array($rsr);		

$rsr = mysqli_query($_SESSION['db_con'], $query_receita);
$rowr = mysqli_fetch_array($rsr);

$total_receita = $rowr["vl_receita"];				

//$rsrcartao = mysql_query($query_receita_cartao) or die(mysql_error());		
//$rowrcartao = mysql_fetch_array($rsrcartao);		

$rsrcartao = mysqli_query($_SESSION['db_con'], $query_receita_cartao);
$rowrcartao = mysqli_fetch_array($rsrcartao);

$total_receita_cartao = $rowrcartao["vl_receita"];				

//$rsrcheque = mysql_query($query_receita_cheque) or die(mysql_error());		
//$rowrcheque = mysql_fetch_array($rsrcheque);		

$rsrcheque = mysqli_query($_SESSION['db_con'], $query_receita_cheque);
$rowrcheque = mysqli_fetch_array($rsrcheque);		

$total_receita_cheque = $rowrcheque["vl_receita"];				

//$rsd = mysql_query($query_despesa) or die(mysql_error());		
//$rowd = mysql_fetch_array($rsd);

$rsd = mysqli_query($_SESSION['db_con'], $query_despesa);
$rowd = mysqli_fetch_array($rsd);

$total_despesa = $rowd["vl_despesa"];				

//$rsdcheque = mysql_query($query_despesa_cheque) or die(mysql_error());		
//$rowdcheque = mysql_fetch_array($rsdcheque);

$rsdcheque = mysqli_query($_SESSION['db_con'], $query_despesa_cheque);
$rowdcheque = mysqli_fetch_array($rsdcheque);

$total_despesa_cheque = $rowdcheque["vl_despesa"];				
$sobra_dinheiro = $total_receita - $total_despesa;		
$sobra_cheque = $total_receita_cheque - $total_despesa_cheque;	
$sobra_cartao = $total_receita_cartao;				

$total_balanco = ($total_receita + $total_receita_cartao + $total_receita_cheque) 						- ($total_despesa + $total_despesa_cheque);				$font_color_balanco = ($total_balanco>0)?"green":"red";	}
?><input type="hidden" name="cd_despesa" id="cd_despesa"><table width="25%" border="0" class="tabela_lista">	<tr>		<td class="tabela_label" width="50%">Total Receita</td>		<td class="tabela_linha" align="right"><strong><?php echo "R$ ".formata_numero_mostrar($total_receita + $total_receita_cartao + $total_receita_cheque); ?></strong></td>	</tr>	<tr>		<td class="tabela_label">Total Despesa</td>		<td class="tabela_linha" align="right"><strong><?php echo "R$ ".formata_numero_mostrar($total_despesa + $total_despesa_cheque); ?></strong></td>	</tr>	<tr>		<td class="tabela_label">Balan&ccedil;o</td>		<td class="tabela_linha" align="right" style="color: <?php echo $font_color_balanco; ?>"><strong><?php echo "R$ ".formata_numero_mostrar($total_balanco); ?></strong></td>	</tr>	<tr>		<td class="tabela_label">Sobra Dinheiro</td>		<td class="tabela_linha" align="right" style="color: <?php echo "black"; ?>"><strong><?php echo "R$ ".formata_numero_mostrar($sobra_dinheiro); ?></strong></td>	</tr>	<tr>		<td class="tabela_label">Sobra Cheque</td>		<td class="tabela_linha" align="right" style="color: <?php echo "black"; ?>"><strong><?php echo "R$ ".formata_numero_mostrar($sobra_cheque); ?></strong></td>	</tr>	<tr>		<td class="tabela_label">Sobra Cart&atilde;o</td>		<td class="tabela_linha" align="right" style="color: <?php echo "black"; ?>"><strong><?php echo "R$ ".formata_numero_mostrar($sobra_cartao); ?></strong></td>	</tr></table>