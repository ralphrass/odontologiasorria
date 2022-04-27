<script language="javascript" src="js/date_picker.js"></script>
<LINK href="css/date_picker.css" rel="stylesheet" type="text/css">
<?php 
	require_once('dao/usuario.php');
	
	$cd_usuario = $cd_tipo_material = $tp_movimento = $dt_movimento = $qt_movimento = $qt_minima = $qt_estoque = "";
	
	if (isset($_POST['cd_material_movimento']) && $_POST['cd_material_movimento'] > 0){
		$result = mysql_query($estoque->statement);
		
		$row = mysql_fetch_array($result);
		
		$cd_usuario = $row['cd_usuario'];
		$cd_tipo_material = $row['cd_tipo_material'];
		$qt_movimento = $row['qt_movimento'];
		$tp_movimento = $row['tp_movimento'];
		$dt_movimento = $row['dt_movimento'];				$sql = "SELECT qt_minima, qt_estoque FROM tipo_material ".				"WHERE cd_tipo_material = ".$row['cd_tipo_material'];		$res = mysql_query($sql);		$mat = mysql_fetch_array($res);				$qt_estoque = $mat['qt_estoque'];		$qt_minima = $mat['qt_minima'];
	}
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<table width="100%" border="0" class="tabela_lista">
<input type="hidden" name="cd_material_movimento" id="cd_material_movimento" value="<?php if (isset($_POST['cd_material_movimento'])) echo $_POST['cd_material_movimento']; ?>"><input type="hidden" name="cd_empresa" value="<?php echo $_SESSION["s_cd_empresa"]; ?>"><?php	if ($qt_minima > 0 && $qt_estoque <= $qt_minima){?>  <tr>	<td colspan="2" align="left" class="warning">		<img src="img/warning.png" style="vertical-align: middle" />		<span style="margin-left: 200px">ATEN��O. A Quantidade M�nima do Produto <?php echo "(".$qt_minima.")"; ?> foi atingida. Estoque atual = <?php echo $qt_estoque; ?></span>	</td>  </tr><?php 	}?>
  <tr>
    <td colspan="2" align="center" class="tabela_label">Movimentar o Estoque</td>
  </tr>
  <tr>
    <td class="tabela_label">Tipo: </td>
    <td class="tabela_linha"><select name="tp_movimento" id="tp_movimento">
      <option value="" selected="selected"></option>
      <option value="E" <?php if ($tp_movimento == 'E') echo "selected=\"selected\""; ?>>Entrada</option>
      <option value="S" <?php if ($tp_movimento == 'S') echo "selected=\"selected\""; ?>>Sa�da</option>
    </select></td>
  </tr>
  <tr>
    <td class="tabela_label">Material:</td>
    <td class="tabela_linha">
    <select name="cd_tipo_material" id="cd_tipo_material">
      	<option value="" selected="selected"></option>
      <?php
	  	$sql_u = "SELECT cd_tipo_material, ds_tipo_material 
				  FROM tipo_material  				  				  WHERE cd_empresa = ".$_SESSION["s_cd_empresa"]."
				  ORDER BY ds_tipo_material";
		$rs_u = mysql_query($sql_u);
		$selected = "";
		while($row_u = mysql_fetch_array($rs_u)){
			if ($cd_tipo_material == $row_u['cd_tipo_material']){
				$selected = "selected=\"selected\"";
			}
			echo "<option value=".$row_u['cd_tipo_material']." ".$selected.">".$row_u['ds_tipo_material']."</option>";
			$selected = "";
		}
      ?>
      </select>
    </td>
  </tr>
  <tr>
    <td width="181" class="tabela_label">Usu�rio: </td>
    <td class="tabela_linha">
      <select name="cd_usuario" id="cd_usuario">
      	<option value="" selected="selected"></option>
      <?php
	  	$sql_u = "SELECT cd_usuario, nm_usuario 
				  FROM usuario 				  				  WHERE cd_empresa = ".$_SESSION["s_cd_empresa"]." 
				  ORDER BY nm_usuario";
		$rs_u = mysql_query($sql_u);
		$selected = "";
		while($row_u = mysql_fetch_array($rs_u)){
			if ($cd_usuario == $row_u['cd_usuario']){
				$selected = "selected=\"selected\"";
			}
			echo "<option value=".$row_u['cd_usuario']." ".$selected.">".$row_u['nm_usuario']."</option>";
			$selected = "";
		}
      ?>
      </select>
      </td>
  </tr>
  <tr>
    <td class="tabela_label">Quantidade:</td>
    <td class="tabela_linha"><input name="qt_movimento" type="text" id="qt_movimento" size="10" maxlength="5" value="<?php echo $qt_movimento; ?>" /></td>
  </tr>
  <tr>
    <td class="tabela_label">Data:</td>
    <td class="tabela_linha"><input name="dt_movimento" type="text" id="dt_movimento" size="12" maxlength="12" value="<?php echo formata_data_mostrar($dt_movimento); ?>" />
    <img src="img/calendar-select.png" onclick="displayDatePicker('dt_movimento');" /></td>
  </tr>
</table>
