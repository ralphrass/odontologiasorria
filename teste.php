<script language="javascript" src="js/date_picker.js"></script>

<LINK href="css/date_picker.css" rel="stylesheet" type="text/css">

<form name="orc_filter" method="post" enctype="multipart/form-data" action="<?php require_once("php7_mysql_shim.php");=$PHP_SELF?>">

<table width="100%" border="0" class="tabela_lista">

  <tr>

    <td class="tabela_label">Dia:</td>

    <td width="90%" class="tabela_linha"><input name="f_dt_inicio" id="f_dt_inicio" type="text" size="12" maxlength="10" value="<?php if (isset($_POST['f_dt_inicio'])){ if (!empty($_POST['f_dt_inicio'])) echo $_POST['f_dt_inicio']; else { echo date('d/m/Y'); } }?>" /> <img src="img/calendar-select.png" onclick="displayDatePicker('f_dt_inicio');"></td>
 
    </tr>

</table>

</form>

<br/>

<?php

$total_renda = $total_despesa = $total_cheque = $total_balanco = 0;
$font_color_balanco = "black";
//print_r($_POST);
if ($_POST['str_acao'] == 'pes'){

	

	$query = "select d.cd_despesa, u.nm_usuario, d.ds_despesa, d.vl_despesa, d.dt_despesa, d.tp_fluxo, 

					 d.tp_despesa_grupo, c.nm_cliente, d.dt_pagamento, cs.ds_servico   

				from despesa d 

				left join usuario u on u.cd_usuario = d.cd_usuario 

				left join cliente c on c.cd_cliente = d.cd_cliente 

				left join cliente_servico cs ON cs.cd_cliente_servico = d.cd_cliente_servico 
				
				where d.cd_empresa = ".$_SESSION['s_cd_empresa']." 
				";

	$where = "and";

	if (isset($_POST['f_dt_inicio']) && !empty($_POST['f_dt_inicio'])){

		$where = (empty($where))?"where":"and";

		$query .= $where." d.dt_despesa = '".formata_data_inserir($_POST['f_dt_inicio'])."' ";
//echo $query."<hr>";
		$query_receita = "SELECT SUM(vl_despesa) AS vl_receita ".
						 "FROM despesa ".
						 "WHERE dt_despesa = '".formata_data_inserir($_POST['f_dt_inicio'])."' ".
						 "AND tp_fluxo = 'R' ";
							  
		$rsr = mysql_query($query_receita) or die(mysql_error());
		$rowr = mysql_fetch_array($rsr);
		$total_receita = $rowr["vl_receita"];
		
		$query_receita = "SELECT SUM(vl_despesa) AS vl_cheque ".
						 "FROM despesa ".
						 "WHERE dt_despesa = '".formata_data_inserir($_POST['f_dt_inicio'])."' ".
						 "AND tp_fluxo = 'C' ";
							  
		$rsr = mysql_query($query_receita) or die(mysql_error());
		$rowr = mysql_fetch_array($rsr);
		$total_cheque = $rowr["vl_cheque"];
		
		$query_receita = "SELECT SUM(vl_despesa) AS vl_despesa ".
						 "FROM despesa ".
						 "WHERE dt_despesa = '".formata_data_inserir($_POST['f_dt_inicio'])."' ".
						 "AND tp_fluxo = 'D' ";
							  
		$rsr = mysql_query($query_receita) or die(mysql_error());
		$rowr = mysql_fetch_array($rsr);
		$total_despesa = $rowr["vl_despesa"];
		
		$total_balanco = $total_receita + $total_cheque - $total_despesa;
		
		$font_color_balanco = ($total_balanco>0)?"green":"red";
	}
	

	/*if (isset($_POST['f_tp_despesa_grupo']) && ! empty($_POST['f_tp_despesa_grupo'])){


		$where = (empty($where))?"where":"and";

		$query .= $where." d.tp_despesa_grupo = '".$_POST['f_tp_despesa_grupo']."' ";

	}
	

	if (isset($_POST['f_nm_cliente']) && !empty($_POST['f_nm_cliente'])){

		$where = (empty($where))?"where":"and";

		$query .= $where." c.nm_cliente LIKE '%".$_POST['f_nm_cliente']."%' ";

	}
	

	if (isset($_POST['f_pago']) && !empty($_POST['f_pago'])){

		$where = (empty($where))?"where":"and";

		$pago = ($_POST['f_pago']=='S')?"IS NOT NULL AND d.dt_pagamento != '0000-00-00' ":"IS NULL OR d.dt_pagamento = '0000-00-00'";

		$query .= $where." (d.dt_pagamento ".$pago.")";

	}*/

	

	$query .= " order by tp_fluxo desc ";

//echo $query;

	$rs = mysql_query($query) or die(mysql_error());

?>

<input type="hidden" name="cd_despesa" id="cd_despesa">

<table width="25%" border="0" class="tabela_lista">
	<tr>
		<td class="tabela_label" width="50%">Total Receita</td>
		<td class="tabela_linha" align="right"><strong><?php echo "R$ ".formata_numero_mostrar($total_receita); ?></strong></td>
	</tr>
	<tr>
		<td class="tabela_label">Total Cheque</td>
		<td class="tabela_linha" align="right"><strong><?php echo "R$ ".formata_numero_mostrar($total_cheque); ?></strong></td>
	</tr>
	<tr>
		<td class="tabela_label">Total Despesa</td>
		<td class="tabela_linha" align="right"><strong><?php echo "R$ ".formata_numero_mostrar($total_despesa); ?></strong></td>
	</tr>
	<tr>
		<td class="tabela_label">Balanço</td>
		<td class="tabela_linha" align="right" style="color: <?php echo $font_color_balanco; ?>"><strong><?php echo "R$ ".formata_numero_mostrar($total_balanco); ?></strong></td>
	</tr>
</table>

<table width="100%" border="0" class="tabela_lista">

  <tr>

    <td class="tabela_label" width="94">Tipo</td>

    <td class="tabela_label" width="105">Grupo</td>
	
    <td class="tabela_label" width="168">Cliente</td>

    <td class="tabela_label" width="207">Despesa/Servi&ccedil;o</td>

    <td class="tabela_label" width="65">Valor</td>

    <td class="tabela_label" width="65">Pago</td>

  </tr>

 <?php 

 	$vl_balanco = 0;

	while($row = mysql_fetch_array($rs))

	{

 ?>

      <tr onmouseover="this.bgColor='#66CCCC'" onmouseout="this.bgColor=''">

        <td class="tabela_linha"><?php if ($row['tp_fluxo'] == 'D') echo "Despesa"; else if ($row['tp_fluxo'] == 'C') echo "Cheque"; else echo "Receita"; ?></td>

        <td class="tabela_linha"><?php echo $row['tp_despesa_grupo']; ?></td>

        <td class="tabela_linha"><?php echo $row['nm_cliente']; ?></td>

        <td class="tabela_linha"><?php if ($row['ds_despesa']) echo $row['ds_despesa']; else echo $row['ds_servico']; ?></td>

        <td class="tabela_linha"><?php echo "R$ ".formata_numero_mostrar($row['vl_despesa']); ?></td>

        <td class="tabela_linha"><?php if ($row['dt_pagamento'] && $row['dt_pagamento'] != "0000-00-00") echo "Sim"; else echo "Não"; ?></td>        

      </tr>

<?php 

		if ($row['tp_fluxo'] == 'D')

			$vl_balanco -= $row['vl_despesa'];

		else

			$vl_balanco += $row['vl_despesa'];

	}

	

	$font_color = ($vl_balanco>0)?"green":"red";

	

?>

	 <tr>

        <td colspan="4" class="tabela_linha">&nbsp;</td>

        <td colspan="2" class="tabela_linha" style="color:<?php echo $font_color; ?>"><strong><?php echo "R$ ".formata_numero_mostrar($vl_balanco); ?></strong></td>        

      </tr>



</table>

<?php

}

?>