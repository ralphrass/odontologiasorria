<?php 
	header("Content-type: text/xml; charset=ISO-8859-1");
    print '<?xml version="1.0" encoding="ISO-8859-1"?>';
	include ("dao/db_con.php");
	include ("inc/util.inc.php");
	if ($_REQUEST['cd_cliente'])
	{
		$sql = "SELECT cd_cliente_servico, dt_servico, ds_servico, vl_servico, sn_contratar, vl_saldo 
				FROM cliente_servico WHERE cd_cliente = ".$_REQUEST['cd_cliente']."
				ORDER BY dt_servico DESC ";
		//$rs = mysql_query($sql);
		$rs = mysqli_query($_SESSION['db_con'], $sql);
	}
?>
<table width="100%" border="0" class="tabela_lista">
  <tr>
    <td width="19%" class="tabela_label">Data</td>
    <td width="20%" class="tabela_label">Servi&ccedil;o</td>
    <td width="16%" class="tabela_label">Contratado</td>
    <td width="22%" class="tabela_label">Valor</td>
    <td width="18%" class="tabela_label">Saldo Devedor</td>
    <td width="5%" class="tabela_label">Editar</td>
  </tr>
  <?php
  $vl_total = $vl_saldo_total = 0;
  //while ($row = mysql_fetch_array($rs))
  while ($row = mysqli_fetch_array($rs))
  {
  ?>
      <tr>
        <td class="tabela_linha"><?php echo formata_data_mostrar($row['dt_servico']); ?></td>
        <td class="tabela_linha"><?php echo $row['ds_servico']; ?></td>
        <td class="tabela_linha"><?php if ($row['sn_contratar'] == 'S') echo 'Sim'; else echo 'N&atilde;o'; ?></td>
        <td class="tabela_linha">R$ <?php echo formata_numero_mostrar($row['vl_servico']); ?></td>
        <td class="tabela_linha">R$ <?php echo formata_numero_mostrar($row['vl_saldo']); ?></td>
        <td class="tabela_linha"><img src="img/editar.png" onclick="seta_acao_editar_orcamento('edi', '<?php echo $_REQUEST['cd_cliente']; ?>', '<?php echo $row['cd_cliente_servico']; ?>')" width="16" height="16"></td>
      </tr>
   <?php 
    $vl_total += $row['vl_servico'];
   	$vl_saldo_total += $row['vl_saldo'];
  }
   ?>
   <tr>
   		<td colspan="3" class="tabela_linha"></td>
        <td class="tabela_linha"><strong>R$ <?php echo formata_numero_mostrar($vl_total); ?></strong></td>
   		<td class="tabela_linha"><strong>R$ <?php echo formata_numero_mostrar($vl_saldo_total); ?></strong></td>
   </tr>
</table>