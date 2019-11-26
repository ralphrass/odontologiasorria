<script language="javascript" src="js/date_picker.js"></script>
<LINK href="css/date_picker.css" rel="stylesheet" type="text/css">
<form name="orc_filter" method="post" enctype="multipart/form-data" action="<?php require_once("php7_mysql_shim.php");=$PHP_SELF?>">
<table width="80%" border="0" class="tabela_lista">
  <tr>
    <td width="22%" class="tabela_label">Tipo de Material:</td>
    <td colspan="3"><label>
      <input name="f_ds_tipo_material" id="f_ds_tipo_material" type="text" size="30" maxlength="200" value="<?php if (isset($_POST['f_ds_tipo_material'])) echo $_POST['f_ds_tipo_material']; ?>" />
      </label></td>
  </tr>
  <tr>
    <td class="tabela_label">Data In&iacute;cio:</td>
    <td width="24%" class="tabela_linha"><input name="f_dt_inicio" id="f_dt_inicio" type="text" size="12" maxlength="10" value="<?php if (isset($_POST['f_dt_inicio'])) echo $_POST['f_dt_inicio']; ?>" /> <img src="img/calendar-select.png" onclick="displayDatePicker('f_dt_inicio');"></td>
    <td width="19%" class="tabela_linha"><span class="tabela_label">Data Final:</span></td>
    <td width="35%" class="tabela_linha"><input name="f_dt_final" id="f_dt_final" type="text" size="12" maxlength="10" value="<?php if (isset($_POST['f_dt_final'])) echo $_POST['f_dt_final']; ?>" /> <img src="img/calendar-select.png" onclick="displayDatePicker('f_dt_final');"></td>
  </tr>
  <tr>
    <td class="tabela_label">Tipo Movimento:</td>
    <td colspan="3" class="tabela_linha">
    	<select name="f_tp_movimento" id="f_tp_movimento">
        	<option value="" selected="selected"></option>
            <option value="E" <?php if (isset($_POST['f_tp_movimento']) && $_POST['f_tp_movimento'] == 'E') echo "selected=\"selected\""; ?>>Entrada</option>
            <option value="S" <?php if (isset($_POST['f_tp_movimento']) && $_POST['f_tp_movimento'] == 'S') echo "selected=\"selected\""; ?>>Saída</option>            
        </select>
    </td>
    </tr>
</table>
</form>
<br/>
<?php
if ($_POST['str_acao'] == 'pes'){
	
	$query = "select u.nm_usuario, mm.dt_movimento, mm.qt_movimento, tm.ds_tipo_material, mm.tp_movimento, mm.cd_material_movimento    
				from material_movimento mm 
				left join usuario u on u.cd_usuario = mm.cd_usuario 
				left join tipo_material tm on tm.cd_tipo_material = mm.cd_tipo_material ";
	$where="";
	if ($_POST['f_ds_tipo_material']){
		$where = (empty($where))?"where":"and";
		$query .= " where ds_tipo_material LIKE '%".$_POST['f_ds_tipo_material']."%' ";
	}
	
	if ($_POST['f_dt_inicio']){
		$where = (empty($where))?"where":"and";
		$query .= $where." dt_movimento >= '".formata_data_inserir($_POST['f_dt_inicio'])."' ";
	}
	
	if ($_POST['f_dt_final']){
		$where = (empty($where))?"where":"and";
		$query .= $where." dt_movimento <= '".formata_data_inserir($_POST['f_dt_final'])."' ";
	}
	
	if ($_POST['f_tp_movimento']){
		$where = (empty($where))?"where":"and";
		$query .= $where." tp_movimento = '".$_POST['f_tp_movimento']."' ";
	}
	
	$query .= " order by dt_movimento DESC ";
	$rs = mysql_query($query) or die(mysql_error());
?>
<input type="hidden" name="cd_material_movimento" id="cd_material_movimento">
<table width="80%" border="0" class="tabela_lista">
  <tr>
    <td class="tabela_label" width="243">Material</td>
    <td class="tabela_label" width="117">Data Movimento</td>
    <td class="tabela_label" width="106">Tipo Movimento</td>
    <td class="tabela_label" width="70">Quantidade</td>
    <td class="tabela_label" width="36">Editar</td>
  </tr>
 <?php 
	while($row = mysql_fetch_array($rs))
	{
 ?>
      <tr onmouseover="this.bgColor='#66CCCC'" onmouseout="this.bgColor=''">
        <td class="tabela_linha"><?php echo $row['ds_tipo_material']; ?></td>
        <td class="tabela_linha"><?php echo formata_data_mostrar($row['dt_movimento']); ?></td>
        <td class="tabela_linha"><?php if ($row['tp_movimento'] == 'E') echo 'Entrada'; elseif($row['tp_movimento'] == 'S') echo 'Saída'; ?></td>
        <td class="tabela_linha"><?php echo $row['qt_movimento']; ?></td>
        <td class="tabela_linha"><img src="img/editar.png" width="16" height="16" onclick="seta_acao_editar_material_movimento('edi', '<?php echo $row['cd_material_movimento']; ?>')" /></td>
      </tr>
<?php 
	}
?>
</table>
<?php
}
?>