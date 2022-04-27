<script language="javascript" src="js/date_picker.js"></script>
<LINK href="css/date_picker.css" rel="stylesheet" type="text/css">
<form name="orc_filter" method="post" enctype="multipart/form-data" action="<?=$PHP_SELF?>">
<table width="100%" border="0" class="tabela_lista">
  <tr>    <td class="tabela_label">Dia:</td>    <td width="90%" class="tabela_linha"><input name="f_dt_inicio" id="f_dt_inicio" type="text" size="12" maxlength="10" value="<?php if (isset($_POST['f_dt_inicio'])){ if (!empty($_POST['f_dt_inicio'])) echo $_POST['f_dt_inicio']; else { echo date('d/m/Y'); } }?>" /> <img src="img/calendar-select.png" onclick="displayDatePicker('f_dt_inicio');"></td>
 
    </tr>
</table>
</form>
<br/><?php$total_renda = 0;$total_despesa = 0;$total_cheque = 0;$total_balanco = 0;$font_color_balanco = "black";?>