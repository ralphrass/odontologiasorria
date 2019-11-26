<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Clínica Sorria</title>
</head>

<body>
<form action="valida_usuario.php" method="post" enctype="multipart/form-data" >
<table width="369" border="0" align="center" style="background-color:#e8eefa; margin-top:20%; border:groove; border:1px solid #C3D9FF; color: #000; font-family: Verdana, Geneva, sans-serif; font-size: 12px;">
  <tr>
    <td width="149" rowspan="2"><img src="img/keyboard.png" width="128" height="128" /></td>
    <td height="102" colspan="2">
      <table width="100%" border="0">
          <tr>
            <td align="right"><span>Usuário</span><br /></td>
            <td><input name="ds_login" type="text" id="ds_login" size="20" /></td>
          </tr>
          <tr>
            <td align="right">Senha</td>
            <td><input name="ds_senha" type="password" id="ds_senha" size="20" /></td>
          </tr>
        </table></td>
  </tr>
  <tr>
    <td colspan="2" align="right"><label>
      <input type="submit" name="ok" id="ok" value="Entrar" />
    </label></td>
  </tr>
  <?php 
  if (isset($_REQUEST['senha_errada']) && $_REQUEST['senha_errada'] == 1)
  {
  ?>
  	  <tr>
    	<td colspan="3" align="center"><br /><font style="color:#F00">Usuário ou Senha Incorretos!</font></td>
      </tr>
 <?php
  } 
  ?>
  
   <?php 
  if (isset($_REQUEST['fora_periodo']) && $_REQUEST['fora_periodo'] == 1)
  {
  ?>
  	  <tr>
    	<td colspan="3" align="center"><br /><font style="color:#F00">Fora do período permitido para acesso!</font></td>
      </tr>
 <?php
  } 
  ?>
</table>
<br /><br /><br /><br />
<div style="font:Verdana, Geneva, sans-serif; font-size:12px" align="center">
<div>Desenvolvido para: Firefox 3.6 <img src="img/firefox_logo1.gif" width="32" height="32" align="middle" /></div><br />
<div>Testado com resoluções: 1280x800 e 1024x768</div>
<p><br />
</p>
<p><br />
</p>
<div>Implementado com: PHP 5.3.0 + MySql 5.1.36 + Apache 2.2.11</div>
</div>
</form>
</body>
</html>
