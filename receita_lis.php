<?php require_once("php7_mysql_shim.php"); ?>
<script language="javascript" src="js/date_picker.js"></script>
<LINK href="css/date_picker.css" rel="stylesheet" type="text/css">
<form name="orc_filter" method="post" enctype="multipart/form-data" action="">
<table width="100%" border="0" class="tabela_lista">
  <tr>
    <td width="20%" class="tabela_label">Nome do usuario:</td>
    <td class="tabela_linha"><label>
      <input name="f_nm_usuario" id="f_nm_usuario" type="text" size="30" maxlength="200" value="<?php if (isset($_POST['f_nm_usuario'])) echo $_POST['f_nm_usuario']; ?>" />
    </label></td>
    <td class="tabela_label">Cliente:</td>
    <td class="tabela_linha"><input name="f_nm_cliente" id="f_nm_cliente" type="text" size="30" maxlength="200" value="<?php if (isset($_POST['f_nm_cliente'])) echo $_POST['f_nm_cliente']; ?>" /></td>
    </tr>
  <tr>
    <td class="tabela_label">Data In&iacute;cio:</td>
    <td width="34%" class="tabela_linha"><input name="f_dt_inicio" id="f_dt_inicio" type="text" size="12" maxlength="10" value="<?php if (isset($_POST['f_dt_inicio'])) echo $_POST['f_dt_inicio']; ?>" />  <img src="img/calendar-select.png" onclick="displayDatePicker('f_dt_inicio');"></td>
    <td width="18%" class="tabela_label">Data Final:</td>
    <td width="28%" class="tabela_linha"><input name="f_dt_final" id="f_dt_final" type="text" size="12" maxlength="10" value="<?php if (isset($_POST['f_dt_final'])) echo $_POST['f_dt_final']; ?>" /> <img src="img/calendar-select.png" onclick="displayDatePicker('f_dt_final');"></td>
  </tr>
  <tr>
    <td class="tabela_label">Tipo:</td>
    <td class="tabela_linha"><select name="f_tp_fluxo" id="f_tp_fluxo">
      <option value="" selected="selected"></option>
      <option value="R" <?php if (isset($_POST['f_tp_fluxo']) && ($_POST['f_tp_fluxo'] == 'R' || $_POST['f_tp_fluxo'] == '') || !isset($_POST['f_tp_fluxo'])) echo "selected=\"selected\""; ?>>Receita</option>
      <option value="D" <?php if (isset($_POST['f_tp_fluxo']) &&$_POST['f_tp_fluxo'] == 'D') echo "selected=\"selected\""; ?>>Despesa</option>
    </select></td>
    <td class="tabela_label">Grupo:</td>
    <td class="tabela_linha"><select name="f_tp_despesa_grupo" id="f_tp_despesa_grupo">
      <option value="" selected="selected"></option>
      <option value="NORMAL" <?php if (isset($_POST['f_tp_despesa_grupo']) && $_POST['f_tp_despesa_grupo'] == 'NORMAL') echo "selected=\"selected\""; ?>>Normal</option>
      <option value="ORTO" <?php if (isset($_POST['f_tp_despesa_grupo']) &&$_POST['f_tp_despesa_grupo'] == 'ORTO') echo "selected=\"selected\""; ?>>Orto</option>
    </select></td>
  </tr>
  <tr>
    <td class="tabela_label">Pago:</td>
    <td class="tabela_linha"><select name="f_pago" id="f_pago">
      <option value="" selected="selected"></option>
      <option value="S" <?php if (isset($_POST['f_pago']) && $_POST['f_pago'] == 'S') echo "selected=\"selected\""; ?>>Sim</option>
      <option value="N" <?php if (isset($_POST['f_pago']) &&$_POST['f_pago'] == 'N') echo "selected=\"selected\""; ?>>Não</option>
    </select></td>
    <td class="tabela_label">Despesa:</td>
    <td class="tabela_linha"><input name="f_ds_despesa" id="f_ds_despesa" type="text" size="30" maxlength="200" value="<?php if (isset($_POST['f_ds_despesa'])) echo $_POST['f_ds_despesa']; ?>" /></td>
  </tr>
</table>
</form>
<br/>
<?php
if ($_POST['str_acao'] == 'pes'){
	
	$query = "select d.cd_despesa, u.nm_usuario, d.ds_despesa, d.vl_despesa, d.dt_despesa, d.tp_fluxo, 
					 d.tp_despesa_grupo, c.nm_cliente, d.dt_pagamento, cs.ds_servico   
				from despesa d 
				left join usuario u on u.cd_usuario = d.cd_usuario 
				left join cliente c on c.cd_cliente = d.cd_cliente 
				left join cliente_servico cs ON cs.cd_cliente_servico = d.cd_cliente_servico 								where d.cd_empresa = ".$_SESSION['s_cd_empresa']." ";
	$where = "and";
	if ($_POST['f_nm_usuario']){
		$where = (empty($where))?"where":"and";
		$query .= $where." u.nm_usuario LIKE '%".$_POST['f_nm_usuario']."%' ";
	}
	
	if ($_POST['f_dt_inicio']){
		$where = (empty($where))?"where":"and";
		$query .= $where." d.dt_despesa >= '".formata_data_inserir($_POST['f_dt_inicio'])."' ";
	}
	
	if ($_POST['f_dt_final']){
		$where = (empty($where))?"where":"and";
		$query .= $where." d.dt_despesa <= '".formata_data_inserir($_POST['f_dt_final'])."' ";
	}
	
	if ($_POST['f_tp_fluxo']){
		$where = (empty($where))?"where":"and";
		$query .= $where." d.tp_fluxo = '".$_POST['f_tp_fluxo']."' ";
	}
	
	if ($_POST['f_tp_despesa_grupo']){
		$where = (empty($where))?"where":"and";
		$query .= $where." d.tp_despesa_grupo = '".$_POST['f_tp_despesa_grupo']."' ";
	}
	
	if ($_POST['f_nm_cliente']){
		$where = (empty($where))?"where":"and";
		$query .= $where." c.nm_cliente LIKE '%".$_POST['f_nm_cliente']."%' ";
	}
	
	if ($_POST['f_ds_despesa']){
		$where = (empty($where))?"where":"and";
		$query .= $where." d.ds_despesa LIKE '%".$_POST['f_ds_despesa']."%' ";
	}
	
	if ($_POST['f_pago']){
		$where = (empty($where))?"where":"and";
		$pago = ($_POST['f_pago']=='S')?"IS NOT NULL AND d.dt_pagamento != '0000-00-00' ":"IS NULL OR d.dt_pagamento = '0000-00-00'";
		$query .= $where." (d.dt_pagamento ".$pago.")";
	}
	
	$query .= " order by d.tp_fluxo, d.dt_despesa DESC, u.nm_usuario ";
//echo $query;
	$rs = mysql_query($query) or die(mysql_error());
?>
<input type="hidden" name="cd_despesa" id="cd_despesa">
<table width="100%" border="0" class="tabela_lista">
  <tr>
    <td class="tabela_label" width="94">Tipo</td>
    <td class="tabela_label" width="105">Grupo</td>
    <td class="tabela_label" width="127">Usu&aacute;rio</td>
    <td class="tabela_label" width="168">Cliente</td>
    <td class="tabela_label" width="207">Despesa/Servi&ccedil;o</td>
    <td class="tabela_label" width="93">Data</td>
    <td class="tabela_label" width="65">Valor</td>
    <td class="tabela_label" width="65">Pago</td>
    <td class="tabela_label" width="36">Editar</td>
  </tr>
 <?php 
 	$vl_balanco = 0;
	while($row = mysql_fetch_array($rs))
	{
 ?>
      <tr onmouseover="this.bgColor='#66CCCC'" onmouseout="this.bgColor=''">
        <td class="tabela_linha"><?php if ($row['tp_fluxo'] == 'D') echo "Despesa"; else echo "Receita"; ?></td>
        <td class="tabela_linha"><?php echo $row['tp_despesa_grupo']; ?></td>
        <td class="tabela_linha"><?php echo $row['nm_usuario']; ?></td>
        <td class="tabela_linha"><?php echo $row['nm_cliente']; ?></td>
        <td class="tabela_linha"><?php if ($row['ds_despesa']) echo $row['ds_despesa']; else echo $row['ds_servico']; ?></td>
        <td class="tabela_linha"><?php echo formata_data_mostrar($row['dt_despesa']); ?></td>
        <td class="tabela_linha"><?php echo "R$ ".formata_numero_mostrar($row['vl_despesa']); ?></td>
        <td class="tabela_linha"><?php if ($row['dt_pagamento'] && $row['dt_pagamento'] != "0000-00-00") echo "Sim"; else echo "Não"; ?></td>        
        <td class="tabela_linha"><img src="img/editar.png" width="16" height="16" onclick="seta_acao_editar_despesa('edi', '<?php echo $row['cd_despesa']; ?>')" /></td>
      </tr>
<?php 
		if ($row['tp_fluxo'] == 'R')
			$vl_balanco += $row['vl_despesa'];
		else
			$vl_balanco -= $row['vl_despesa'];
	}
	
	$font_color = ($vl_balanco>0)?"green":"red";
	
?>
	 <tr>
        <td colspan="6" class="tabela_linha">&nbsp;</td>
        <td colspan="2" class="tabela_linha" style="color:<?php echo $font_color; ?>"><strong><?php echo "R$ ".formata_numero_mostrar($vl_balanco); ?></strong></td>        
        <td class="tabela_linha"><img src="img/editar.png" width="16" height="16" onclick="seta_acao_editar_despesa('edi', '<?php echo $row['cd_despesa']; ?>')" /></td>
      </tr>

</table>
<?php
}
?>