<form name="orc_filter" method="post" enctype="multipart/form-data" action="<?php require_once("php7_mysql_shim.php");=$PHP_SELF?>">
<table width="70%" border="0" cellpadding="1" cellspacing="0" class="tabela_lista"> 
  <tr>
    <td width="22%" class="tabela_label">Nome do Cliente:</td>
    <td colspan="3" class="tabela_linha"><label>
      <input name="f_nm_cliente" id="f_nm_cliente" type="text" size="30" maxlength="200" value="<?php if (isset($_POST['f_nm_cliente'])) echo $_POST['f_nm_cliente']; ?>"/>
    </label></td>
    </tr>
  <tr>
    <td class="tabela_label">Data In&iacute;cio:</td>
    <td width="25%" class="tabela_linha"><input name="f_dt_inicio" id="f_dt_inicio" type="text" size="12" maxlength="10" value="<?php if (isset($_POST['f_dt_inicio'])) echo $_POST['f_dt_inicio']; ?>" /></td>
    <td width="26%" class="tabela_linha"><span class="tabela_label">Data Final:</span></td>
    <td width="27%" class="tabela_linha"><input name="f_dt_final" id="f_dt_final" type="text" size="12" maxlength="10" value="<?php if (isset($_POST['f_dt_final'])) echo $_POST['f_dt_final']; ?>" /></td>
  </tr>
</table>
</form>
<br/>
<?php
if ($_POST['str_acao'] == 'pes'){
	
	$query = "select c.cd_cliente, c.nm_cliente, cs.dt_servico, cs.sn_contratar, cs.ds_servico, cs.cd_cliente_servico 
				from cliente c, cliente_servico cs 
				where c.cd_cliente = cs.cd_cliente ";
	$where = "and";
	if ($_POST['f_nm_cliente']){
		$where = (empty($where))?"where":"and";
		$query .= " and nm_cliente LIKE '%".$_POST['f_nm_cliente']."%' ";
	}
	
	if ($_POST['f_dt_inicio']){
		$where = (empty($where))?"where":"and";
		$query .= $where." dt_servico >= '".formata_data_inserir($_POST['f_dt_inicio'])."' ";
	}
	
	if ($_POST['f_dt_final']){
		$where = (empty($where))?"where":"and";
		$query .= $where." dt_servico <= '".formata_data_inserir($_POST['f_dt_final'])."' ";
	}
	
	$query .= " order by nm_cliente, dt_servico desc ";
	$rs = mysql_query($query) or die(mysql_error());
?>
<input type="hidden" name="cd_cliente" id="cd_cliente">
<input type="hidden" name="cd_cliente_servico" id="cd_cliente_servico">
<table width="70%" border="0" class="tabela_lista" cellpadding="1">
  <tr>
    <td class="tabela_label" width="234">Nome</td>
    <td class="tabela_label" width="280">Servico</td>
    <td class="tabela_label" width="81">Data</td>
    <td class="tabela_label" width="42">Contratado</td>
    <td class="tabela_label" width="42">Editar</td>
  </tr>
 <?php 
	while($row = mysql_fetch_array($rs))
	{
 ?>
      <tr>
        <td class="tabela_linha"><?php echo $row['nm_cliente']; ?></td>
        <td class="tabela_linha"><?php echo $row['ds_servico']; ?></td>
        <td class="tabela_linha"><?php echo formata_data_mostrar($row['dt_servico']); ?></td>
        <td class="tabela_linha"><?php echo $row['sn_contratar']; ?></td>
        <td class="tabela_linha"><img src="img/editar.png" width="16" height="16" onclick="seta_acao_editar_orcamento('edi', '<?php echo $row['cd_cliente']; ?>', '<?php echo $row['cd_cliente_servico']; ?>')" /></td>
      </tr>
<?php 
	}
?>
</table>
<?php
}
?>