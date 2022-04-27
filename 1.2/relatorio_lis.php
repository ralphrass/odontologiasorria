<script language="javascript" src="js/date_picker.js"></script>
<LINK href="css/date_picker.css" rel="stylesheet" type="text/css">
<table width="70%" border="0" class="tabela_lista">
  <tr>
    <td class="tabela_label">Data In&iacute;cio:</td>
    <td class="tabela_linha"><input name="f_dt_inicio" id="f_dt_inicio" type="text" size="12" maxlength="10" value="<?php if (isset($_POST['f_dt_inicio'])) echo $_POST['f_dt_inicio']; ?>" /> <img src="img/calendar-select.png" onclick="displayDatePicker('f_dt_inicio');"></td>
    <td class="tabela_linha"><span class="tabela_label">Data Final:</span></td>
    <td class="tabela_linha"><input name="f_dt_final" id="f_dt_final" type="text" size="12" maxlength="10" value="<?php if (isset($_POST['f_dt_final'])) echo $_POST['f_dt_final']; ?>" /> <img src="img/calendar-select.png" onclick="displayDatePicker('f_dt_final');"></td>
  </tr>
</table>
<br />

<?php

//include charts.php to access the InsertChart function
include "charts.php";

//print_r($_REQUEST);
if (isset($_REQUEST['f_dt_inicio']) || isset($_REQUEST['f_dt_final']))
{
	echo InsertChart ( "charts.swf", "charts_library", "sample.php?uniqueID=" . uniqid(rand(),true)."&f_dt_inicio=".$_REQUEST['f_dt_inicio']."&f_dt_final=".$_REQUEST['f_dt_final'], 400, 250 );

	echo "<br>";

	echo InsertChart ( "charts.swf", "charts_library", "linhas.php?uniqueID=" . uniqid(rand(),true)."&f_dt_inicio=".$_REQUEST['f_dt_inicio']."&f_dt_final=".$_REQUEST['f_dt_final'], 800, 350 );
}

?>