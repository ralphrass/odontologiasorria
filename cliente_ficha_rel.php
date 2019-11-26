<?php 

include_once 'dao/dao.php';



$_POST['str_tela'] = 'cli';

$_POST['str_acao'] = 'lis';



?>
<style>
table, tr, td {
	
	font-size: 12px;
}
.com_borda{
	border: 1px solid;
}
</style>

<form id="formRel" name="formRel" action="main.php" enctype="multipart/form-data" method="post">

	<input type="hidden" name="str_tela" value="cli" />

    <input type="hidden" name="str_acao" value="lis" />

</form>

<table width="100%" border="0" 
	cellpadding="1" cellspacing="1" 
	style="margin-top: 0px; border: none">

<tr>
<td width="50%" style="border: none">
	<table width="100%" border="0" style="border: none">
	<tr>
		<td colspan="2" class="com_borda">Nome: <strong><?php echo $_POST["nm_cliente"]; ?></strong></td>
	</tr>
	<tr>
		<td width="50%" class="com_borda">D.N: <strong><?php echo $_POST["dt_nascimento"]; ?></strong></td>
		<td width="50%" class="com_borda">Profissão:</td>
	</tr>
	<tr>
		<td width="50%" class="com_borda">RG: <strong><?php echo $_POST["nr_rg"]; ?></strong></td>
		<td width="50%" class="com_borda">CPF: <strong><?php echo $_POST["nr_cpf"]; ?></strong></td>
	</tr>
	<tr>
		<td colspan="2" class="com_borda">Endereço: <strong><?php echo $_POST["ds_endereco"]; ?></strong></td>
	</tr>
	<tr>
		<td colspan="2" class="com_borda">Telefone: <strong><?php echo $_POST["ds_telefone_residencial"]." / ".$_POST["ds_telefone_celular"]; ?></strong></td>
	</tr>
	<tr>
		<td colspan="2" class="com_borda">Autorização quando menor de idade</td>
	</tr>
	<tr>
		<td colspan="2" class="com_borda">Nome:</td>
	</tr>
	<tr>
		<td colspan="2" class="com_borda">RG/CPF:</td>
	</tr>
	<tr>
		<td colspan="2" class="com_borda">Assinat. Paciente/Responsável:</td>
	</tr>
	<tr>
		<td colspan="2" align="center" class="com_borda">Controle Clínico</td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<div style="height: 174px">
				<img src="img/control_clinico.png" width="270" height="160" />
			</div>
		</td>
	</tr>
	<tr>
		<td class="com_borda" colspan="2" align="center"><strong>Plano de Tratamento</strong></td>
	</tr>
	<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
	<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
	<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
	</table>
</td>
<td style="vertical-align: top; border: none">
	<table width="100%" border="0" style="border: none">
		<tr>
			<td class="com_borda" width="80%">Ficha de Anamnese</td>
			<td class="com_borda">G: <strong><?php echo $_POST["ds_ficha"]; ?></strong></td>
		</tr>
		<tr>
			<td class="com_borda" width="80%">Gravidez? (    )S (    )N Meses ____</td>
			<td class="com_borda">O: <strong><?php echo $_POST["ds_ficha_orto"]; ?></strong></td>
		</tr>
		<tr>
			<td class="com_borda" colspan="2">Sofre alguma doença? (    )S (    )N Qual: </td>
		</tr>
		<tr>
			<td class="com_borda" colspan="2">Está em tratamento médico? (    )S (    )N</td>
		</tr>
		<tr>
			<td class="com_borda" colspan="2">Faz uso medicação? (    )S (    )N Qual: </td>
		</tr>
		<tr>
			<td class="com_borda" colspan="2">Alergia medicamentos/alimentos? (    )S (    )N</td>
		</tr>
		<tr>
			<td class="com_borda" colspan="2">Problemas anestesia/hemorragia? (    )S (    )N</td>
		</tr>
		<tr>
			<td class="com_borda" colspan="2">Hipertensão? (    )S (    )N   Diabetes? (    )S (    )N</td>
		</tr>
		<tr>
			<td class="com_borda" colspan="2">Médico Assistente:</td>
		</tr>
		<tr>
			<td class="com_borda" colspan="2" align="center"><strong>Plano de Tratamento</strong></td>
		</tr>
		<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
		<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
		<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
		<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
		<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
		<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
		<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
		<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
		<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
		<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
		<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
		<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
		<tr><td colspan="2" class="com_borda">&nbsp;</td></tr>
	</table>
</td>
</tr>
</table>
<!--<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
<table style="border: none; page-break-before: always" width="100%">
<tr>
<td width="100%" colspan="2" border="0">
	<table width="100%" border="0" style="border: none">
		<tr>
			<td class="com_borda" width="8%"><strong>Data</strong></td>
			<td class="com_borda" width="30%"><strong>Procedimento</strong></td>
			<td class="com_borda"><strong>DR.</strong></td>
			<td class="com_borda" width="8%"><strong>Valor</strong></td>
			<td class="com_borda" width="10%"><strong>Ass. Pac.</td>
			<td class="com_borda" width="8%"><strong>Data</strong></td>
			<td class="com_borda" width="8%"><strong>Vl Pago</strong></td>
			<td class="com_borda"><strong>FP</strong></td>
			<td class="com_borda"><strong>Secr.</strong></td>
			<td class="com_borda" width="10%"><strong>Ass. Pac.</strong></td>
		</tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
		<tr><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td><td class="com_borda">&nbsp;</td></tr>
	</table>
</td>
</tr>

</table>

<?php 

	echo "<script type=\"text/javascript\">

	document.getElementById('cabecalho').className = 'invisivel';

	document.getElementById('menu_opcao').className = 'invisivel';

	document.getElementById('menu_acao').className = 'invisivel';
	window.onload = function imprimir(){ self.print(); reload_form(); }
	

	</script>"; 

?>
