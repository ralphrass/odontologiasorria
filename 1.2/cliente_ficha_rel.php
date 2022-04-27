<?php 
include_once 'dao/dao.php';

//print_r($_POST);
$_POST['str_tela'] = 'cli';
$_POST['str_acao'] = 'lis';

?>
<form id="formRel" name="formRel" action="main.php" enctype="multipart/form-data" method="post">
	<input type="hidden" name="str_tela" value="cli" />
    <input type="hidden" name="str_acao" value="lis" />
</form>
<font style="font-size:11px">
<table width="590" height="312" border="0" cellpadding="3" cellspacing="4">
  <tr>
    <td colspan="2">Eu <strong><?php echo $_POST['nm_cliente']; ?></strong> Data Nasc. <strong><?php echo $_POST['dt_nascimento']; ?></strong></td>
  </tr>
  <tr>
    <td colspan="2" align="left"><div align="left"><br \>
    <div>RG <strong><?php echo $_POST['nr_rg']; ?></strong> CPF <strong><?php echo $_POST['nr_cpf']; ?></strong> Declaro estar de acordo com as condi&ccedil;&otilde;es</div> <div><br \>do or&ccedil;amento contratado conforme o valor e tratamento. Ass. _____________________________________________________</div></div></td>
  </tr>
  <tr>
    <td height="292" width="50%" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:solid 1px">
      <tr>
        <td colspan="3"><div align="center"><strong>FICHA CL&Iacute;NICA</strong></div></td>
        </tr>
      <tr>
        <td style="border:solid 1px"><div align="center"><strong>QUANT.</strong></div></td>
        <td style="border:solid 1px"><div align="center"><strong>OR&Ccedil;AMENTO</strong></div></td>
        <td style="border:solid 1px"><div align="center"><strong>IMPORT&Acirc;NCIA</strong></div></td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">Extra&ccedil;&atilde;o</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">Obt. Am&aacute;lgama</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">Obt. Resina</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">Trat. de Canal</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">Limpeza</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">Rem. de T&aacute;rtaro</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">Fl&uacute;or</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">Piv&ocirc;t</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">Ponte M&oacute;vel</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">Ponte de Grampo (PPR)</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">Dent. Superior</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">Dent. Inferior</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">Radiografia</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">Coroa</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
      <tr>
        <td style="border:solid 1px">&nbsp;</td>
        <td style="border:solid 1px"><div align="center"><strong>SOMA TOTAL</strong></div></td>
        <td style="border:solid 1px">&nbsp;</td>
      </tr>
    </table></td>
    <td width="46%" valign="top"><table width="100%" height="292" border="0" cellpadding="0" cellspacing="0" style="border:solid 1px">
      <tr>
        <td style="border:solid 1px" colspan="2"><div align="center"><strong>CONTROLE CL&Iacute;NICO</strong></div></td>
        </tr>
      <tr>
        <td colspan="2"><img src="img/control_clinico.png" width="270" height="160" /></td>
        </tr>
      <tr>
        <td colspan="2" style="border:solid 1px">OBS.:<br /><br /><br /></td>
      </tr>
      <tr>
        <td style="border:solid 1px"><label>
          <input type="checkbox" name="checkbox" id="checkbox">
          </label>
          Hemorragia</td>
        <td style="border:solid 1px"><input type="checkbox" name="checkbox4" id="checkbox4">
          Press&atilde;o Alta</td>
      </tr>
      <tr>
        <td style="border:solid 1px"><input type="checkbox" name="checkbox2" id="checkbox2">
          Card&iacute;aco</td>
        <td style="border:solid 1px"><input type="checkbox" name="checkbox5" id="checkbox5">
          Press&atilde;o Baixa</td>
      </tr>
      <tr>
        <td style="border:solid 1px"><input type="checkbox" name="checkbox3" id="checkbox3">
          Diab&eacute;tico</td>
        <td style="border:solid 1px"><input type="checkbox" name="checkbox6" id="checkbox6">
          Gestante</td>
      </tr>
      <tr>
        <td width="54%" style="border:solid 1px">Or&ccedil; por Dr(a):</td>
        <td style="border:solid 1px">Data:</td>
      </tr>
    </table></td>
  </tr>
</table>
</font>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p><font style="font-size:11px">  <br \>
</font></p>
<font style="font-size:11px">
<table width="590" border="0"  cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="11"><table width="100%" border="0"  cellspacing="0" cellpadding="0">
      <tr>
        <td colspan="2" style="border:solid 1px">NOME: <strong><?php echo $_POST['nm_cliente']; ?></strong></td>
        <td width="25%" style="border:solid 1px">Nr. FICHA: <strong><?php echo $_POST['ds_ficha']; ?></strong></td>
      </tr>
      <tr>
        <td width="52%" style="border:solid 1px">ENDERE&Ccedil;O: <strong><?php echo $_POST['ds_endereco']; ?></strong></td>
        <td width="23%" style="border:solid 1px">TEL: <strong><?php echo $_POST['ds_telefone_residencial']; ?></strong></td>
        <td style="border:solid 1px">BAIRRO:</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="4" style="border:solid 1px"><div align="center"><strong>CONTROLE DO TRATAMENTO</strong></div></td>
    <td colspan="7" style="border:solid 1px"><div align="center"><strong>CONTROLE DO PAGAMENTO</strong></div></td>
  </tr>
  <tr>
    <td width="11%" style="border:solid 1px"><div align="center">TRATAMENTO</div></td>
    <td width="7%" style="border:solid 1px"><div align="center">Dr(a)</div></td>
    <td width="8%" style="border:solid 1px"><div align="center">VALOR</div></td>
    <td width="8%" style="border:solid 1px"><div align="center">SOMA</div></td>
    <td width="9%" style="border:solid 1px"><div align="center">DATA</div></td>
    <td width="8%" style="border:solid 1px"><div align="center">PAGOU</div></td>
    <td width="8%" style="border:solid 1px"><div align="center">SOMA</div></td>
    <td width="8%" style="border:solid 1px"><div align="center">FALTA</div></td>
    <td width="9%" style="border:solid 1px"><div align="center">RECEP</div></td>
    <td width="8%" style="border:solid 1px"><div align="center">DENTIST.</div></td>
    <td width="16%" style="border:solid 1px"><div align="center">PACIENTE</div></td>
  </tr>
  <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
  <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
  <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
  <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
   <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
  <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
   <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
  <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
   <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
   <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
  <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
  <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
   <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
  <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
   <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="11"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="border:solid 1px"><div align="center">DATA</div></td>
        <td style="border:solid 1px"><div align="center">QDE.</div></td>
        <td style="border:solid 1px"><div align="center">RUB.</div></td>
        <td style="border:solid 1px"><div align="center">VALOR</div></td>
        <td style="border:solid 1px"><div align="center">SOMA</div></td>
        <td style="border:solid 1px"><div align="center">QDE.</div></td>
        <td style="border:solid 1px"><div align="center">PR&Oacute;TESE</div></td>
        <td style="border:solid 1px"><div align="center">RUB.</div></td>
        <td style="border:solid 1px"><div align="center">VALOR</div></td>
        <td style="border:solid 1px"><div align="center">SOMA</div></td>
      </tr>
     <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
  <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
   <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
  <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
   <tr>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
    <td style="border:solid 1px">&nbsp;</td>
  </tr>
    </table></td>
  </tr>
</table>
</font>
<?php 
	echo "<script>
	document.getElementById('cabecalho').className = 'invisivel';
	document.getElementById('menu_opcao').className = 'invisivel';
	document.getElementById('menu_acao').className = 'invisivel';
	self.print();
	reload_form();
	</script>"; 
?>