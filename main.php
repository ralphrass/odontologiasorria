<?php
session_start();
//error_reporting(0);
//print_r($_SESSION);

require_once('dao/db_con.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Clínica Sorria</title>
<style type="text/css">
<!--
p {
	text-align: center;
}
-->.warning{	color: #c09853;	background-color: #fcf8e3;	border-color: #fbeed5;	border: 1px solid;	margin: 10px 0px;	padding: 10px 10px 10px 10px;	font-size: 16px !important;	font-weight: bold;}
body{
	font:Verdana, Geneva, sans-serif; 
	font-size:14px;
	background-color:#EEEEEE
}

.menu_label{
	font-weight:bold;
}

.menu_divisao{
	border-bottom: ridge 1px green;
}

.invisivel{
	display:none;
}

.tabela_label{
	color:black;
	background-color:#e8eefa;
	border-bottom:solid 1px gray;
	font-weight:bold;
}

.tabela_linha{
	border-bottom:solid 1px gray;
}

.tabela_lista{
	border:solid 1px gray;
}

.tabela_titulo{
	color:black;
	background-color:#e8eefa;
	font-weight:bold;
}

input{
	border:thick 1px;
}

linha_selecionada{
	background-color:#09F;
}
</style>
</head>

<script>
function reload_form()
{
	document.getElementById('frm_menu').submit();
}

function seta_tela(str_tela)
{
	document.getElementById('str_tela').value = str_tela;
	reload_form();
}

function seta_acao(str_acao)
{
	document.getElementById('str_acao').value = str_acao;
	reload_form();
}

function seta_acao_editar_orcamento(str_acao, cd_cliente, cd_cliente_servico)
{
	document.getElementById('cd_cliente').value = cd_cliente;
	document.getElementById('cd_cliente_servico').value = cd_cliente_servico;
	
	seta_acao(str_acao);
}

function seta_acao_editar_cliente(str_acao, cd_cliente)
{
	document.getElementById('cd_cliente').value = cd_cliente;
	
	seta_acao(str_acao);
}

function seta_acao_editar_usuario(str_acao, cd_usuario)
{
	document.getElementById('cd_usuario').value = cd_usuario;
	
	seta_acao(str_acao);
}

function seta_acao_editar_despesa(str_acao, cd_despesa)
{
	document.getElementById('cd_despesa').value = cd_despesa;
	
	seta_acao(str_acao);
}

function seta_acao_editar_receita(str_acao, cd_despesa)
{
	document.getElementById('cd_despesa').value = cd_despesa;
	
	seta_acao(str_acao);
}

function seta_acao_editar_tipo_material(str_acao, cd_despesa)
{
	document.getElementById('cd_tipo_material').value = cd_despesa;
	
	seta_acao(str_acao);
}

function seta_acao_editar_material_movimento(str_acao, cd_material_movimento)
{
	document.getElementById('cd_material_movimento').value = cd_material_movimento;
	
	seta_acao(str_acao);
}
</script>

<style>
	img{
		cursor:pointer;
	}
</style>

<body marginheight="0" marginwidth="0">
<form id="frm_menu" action="main.php" enctype="multipart/form-data" method="post">
	<input type="hidden" name="str_tela" id="str_tela" value="<?php echo $_POST['str_tela']; ?>" />
	<input type="hidden" name="str_acao" id="str_acao" value="" />    
<table width="100%" border="0">
  <tr>
    <td colspan="2" bgcolor="#e8eefa" style="font-size:18px" id="cabecalho"><font style="color:black; font-weight:bold">Cl&iacute;nica Sorria - Vers&atilde;o 1.3</font></td>
  </tr>
  <tr style="vertical-align:top">
    <td width="12%" rowspan="2" style="vertical-align:top; border-right:groove;" id="menu_opcao">
    <table width="100%" border="0" style="vertical-align:top; background-color:#EEEEEE">
      <!--<tr>
        <td class="menu_divisao"><div align="center"><img src="img/orcamento.png" width="64" height="64" onclick="seta_tela('orc');"/>
        <div align="center" class="menu_label">Orçamento</div></div></td>
      </tr>-->
      <tr>
        <td class="menu_divisao" style="border-top:solid 1px;"><div align="center"><img src="img/clientes.png" width="48" height="48" onclick="seta_tela('cli');" /></div>
          <div align="center" class="menu_label">Clientes</div></td>
      </tr>
      <?php
      if ($_SESSION['s_sn_usuario_preferencial'] == 'S')
	  {
	  ?>
      <tr>
        <td class="menu_divisao"><div align="center"><img src="img/usuario.png" width="48" height="48" onclick="seta_tela('usu');" /></div>
          <div align="center" class="menu_label">Usu&aacute;rios</div></td>
      </tr>
      <?php } ?>
      <tr>
        <td class="menu_divisao"><div align="center"><img src="img/renda.png" width="48" height="48" onclick="seta_tela('ren');" /></div>
          <div align="center" class="menu_label">Receita</div></td>
      </tr>
      <tr>
        <td class="menu_divisao"><div align="center"><img src="img/gastos.png" width="48" height="48" onclick="seta_tela('des');" /></div>
          <div align="center" class="menu_label">Despesa</div></td>
      </tr>
      <tr>
        <td class="menu_divisao"><div align="center"><img src="img/cheque.png" width="48" height="48" onclick="seta_tela('che');" /></div>
          <div align="center" class="menu_label">Cheque</div></td>
      </tr>	  	  <tr>        <td class="menu_divisao"><div align="center"><img src="img/balanco.png" width="48" height="48" onclick="seta_tela('bal');" /></div>          <div align="center" class="menu_label">Balanço Diário</div></td>      </tr>
      <?php
      if ($_SESSION['s_sn_usuario_preferencial'] == 'S')
	  {
	  ?>
      <tr>
        <td class="menu_divisao"><div align="center"><img src="img/tipo_material.png" width="48" height="48" onclick="seta_tela('mat');" /></div>
          <div align="center" class="menu_label">Tipo Material</div></td>
      </tr>
      <?php } ?>
      <tr>
        <td class="menu_divisao"><div align="center"><img src="img/estoque.png" width="48" height="48" onclick="seta_tela('est');" /></div>
          <div align="center" class="menu_label">Estoque</div></td>
      </tr>
      <?php
      if ($_SESSION['s_sn_usuario_preferencial'] == 'S')
	  {
	  ?>
      <tr>
        <td class="menu_divisao"><div align="center"><img src="img/relatorio.png" width="48" height="48" onclick="seta_tela('rel');" /></div>
          <div align="center" class="menu_label">Relatório</div></td>
      </tr>
      <?php } ?>
    </table>
    </td>
    <td height="23" style="border-bottom:1px solid; background-color:#EEEEEE" id="menu_acao">
    <table width="287" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="57"><img src="img/novo.png" width="48" height="48" onclick="seta_acao('cad');" alt="Novo" title="Novo" /></td>
        <td width="57"><img src="img/save.png" width="48" height="48" onclick="seta_acao('sal');" alt="Salvar" title="Salvar"  /></td>
        <td width="58"><img src="img/lista.png" width="48" height="48" onclick="seta_acao('lis');" alt="Lista" title="Lista"  /></td>
        <td width="57"><img src="img/excluir.png" width="48" height="48" onclick="seta_acao('exc');" alt="Excluir" title="Excluir"  /></td>
        <td width="58"><img src="img/pesquisar.png" width="48" height="48" onclick="seta_acao('pes');" alt="Pesquisar" title="Pesquisar"  /></td>
        <td width="58"><img src="img/imprimir.png" width="48" height="48" onclick="seta_acao('imp');" alt="Imprimir" title="Imprimir"  /></td>
      </tr>
    </table>
    </td>
  </tr>
  <tr>
    <td id="main_content" valign="top">
    	<?php 
			include('inc/carrega_tela.inc.php');
		?>
    </td>
  </tr>
</table>
</form>
</body>
</html>