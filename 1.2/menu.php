<html>
<head>
	<title>Untitled</title>
	
	<!--|||||=========== COLOQUE ENTRE AS TAGS HEAD ==========|||||||||| -->
	
	<!-- ||**||**||**||  FOLHA DE ESTILOS (CSS) ||**||**||**|| -->
	<style type="text/css">	
	/*+++++++++++++++ RELATIVO AS CATEGORIAS +++++++++++++++++++++*/
	
	/**** LINKS DOS NOMES DAS CATEGORIAS ****/
	/* Link em estado natural*/
	a.link_menu:link{color:navy;text-decoration:none;font-weight:normal;font-family:arial;font-size:12px}
	/* Link depois de visitado*/
	a.link_menu:visited{color:navy;text-decoration:none;font-weight:normal;font-family:arial;font-size:12px}
	/* Link ao passar o mouse*/
	a.link_menu:hover{color:#ffffff;text-decoration:underline;font-weight:bold;font-family:arial;font-size:12px}
	/**** FIM LINKS DOS NOMES DAS CATEGORIAS ****/
	
	/**** CELULAS DOS NOMES DAS CATEGORIAS ****/
	/*padding top right bottom left */
	.titulo_menu{	   
	   background-color:red;
		background-image:url(none);
		width:150px;
		height:25px;
		border:1px solid blue;
		padding: 5px 0px 0px 5px;
	}
	/**** FIM CELULAS DOS NOMES DAS CATEGORIAS ****/
	
	/*++++++++++++ FIM RELATIVO AS CATEGORIAS +++++++++++++++++++++*/		
	
	
	
	/*++++++++++++  RELATIVO AS SUB-CATEGORIAS +++++++++++++++++++++*/
	
	/**** LINKS DOS NOMES DAS SUB-CATEGORIAS ****/
	/* Link em estado natural*/
	a.link_smenu:link{color:#ffffff;text-decoration:none;font-weight:normal;font-family:arial;font-size:12px}
	/* Link depois de visitado*/
	a.link_smenu:visited{color:#ffffff;text-decoration:none;font-weight:normal;font-family:arial;font-size:12px}
	/* Link ao passar o mouse*/
	a.link_smenu:hover{color:navy;text-decoration:underline;font-weight:bold;font-family:arial;font-size:12px}
	/**** LINKS DOS NOMES DAS SUB-CATEGORIAS ****/
		
	/**** CELULAS DOS NOMES DAS SUB-CATEGORIAS ****/
	/*padding top right bottom left */
	.itens_menu{
	   background-color:blue;
		background-image:url(none);
		width:137px;
		height:25px;
		border:1px solid red;
		padding: 5px 0px 0px 5px;
	}	
	/**** FIM CELULAS DOS NOMES DAS SUB-CATEGORIAS ****/
	
	/**** CELULAS DE REVEZAMENTO DOS NOMES DAS SUB-CATEGORIAS ****/
	.itens_menu_r{
	   background-color:#0099ff;
		background-image:url(none);
		width:137px;
		height:25px;
		border:1px solid red;
		padding: 5px 0px 0px 5px;		
	}	
	/**** FIM CELULAS DE REVEZAMENTO DOS NOMES DAS SUB-CATEGORIAS ****/
	
	/*++++++++++++ FIM RELATIVO AS SUB-CATEGORIAS +++++++++++++++++++++*/	
	</style>	
	<!-- ||**||**||** FIM FOLHA DE ESTILOS (CSS) ||**||**||** -->
	
	<!-- |||||||||||||||| FUNÇÕES JAVASCRIPT (NÃO EDITE) |||||||||||||||| -->
	<script language="javascript">
	   c=0
		du="";
	   function escondediv(dv,n){		
		    
		   for(i=1;i<=n;i++){			
			   if(i==dv ){
				   if(du!=dv){
				      document.getElementById('mdiv'+i).style.display="inline"
					   du=dv
					}else{
					   du=""
					   document.getElementById('mdiv'+i).style.display="none"
					}
			   }else{
				     document.getElementById('mdiv'+i).style.display="none"				  					
			   }				
				
			}		
		}
		
	function reveza(qq){
	  document.getElementById(qq).className="itens_menu_r"
	}
	function volta(qq){
	  document.getElementById(qq).className="itens_menu"
	}
	</script>
	<!-- ||||||||||||| FIM FUNÇÕES JAVASCRIPT (NÃO EDITE) |||||||||||||||| -->	
	
	<!--|||||========== FIM COLOQUE ENTRE AS TAGS HEAD =========|||||||||| -->
</head>

<body>

<!--|||||||||||||||||  COLOQUE DENTRO AS TAGS BODY||||||||||||||||||||||||||||| -->

<script>
//Coloque aqui o número de itens de menu
n_divs='5'
</script>

<div class="titulo_menu"><a href="#" class="link_menu"  target="alvo">Link fixo</a></div>

<div class="titulo_menu"  ><a href="javascript:void(escondediv('1',n_divs))" class="link_menu" >Categoria 1</a></div>
<div id="mdiv1"  style="display:none">
   <table border="0">
	   <tr><td id="um" class="itens_menu" ><a href="#" onmouseover="reveza('um')" onmouseout="volta('um')" class="link_smenu" target="alvo">link item1A</a></td></tr>
		<tr><td class="itens_menu" ><a href="#" class="link_smenu" target="alvo">link item2A</a></td></tr>
		<tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item3A</a></td></tr>
	</table>
</div>

<div class="titulo_menu"><a href="javascript:void(escondediv('2',n_divs))" class="link_menu">Categoria 2</a></div>
<div id="mdiv2"  style="display:none">
   <table border="0">
	   <tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item1B</a></td></tr>
		<tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item2B</a></td></tr>
		<tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item3B</a></td></tr>
	</table>
</div>

<div class="titulo_menu"><a href="javascript:void(escondediv('3',n_divs))" class="link_menu">Categoria 3</a></div>
<div id="mdiv3"  style="display:none">
   <table border="0">
	   <tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item1C</a></td></tr>
		<tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item2C</a></td></tr>
		<tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item3C</a></td></tr>
	</table>
</div>

<div class="titulo_menu"><a href="javascript:void(escondediv('4',n_divs))" class="link_menu">Categoria 4</a></div>
<div id="mdiv4"  style="display:none">
   <table border="0">
	   <tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item1D</a></td></tr>
		<tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item2D</a></td></tr>
		<tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item3D</a></td></tr>
	</table>
</div>

<div class="titulo_menu"><a href="javascript:void(escondediv('5',n_divs))" class="link_menu">Categoria 5</a></div>
<div id="mdiv5"  style="display:none">
   <table border="0">
	   <tr><td class="itens_menu"><a href="#" class="link_smenu">link item1E</a></td></tr>
		<tr><td class="itens_menu"><a href="#" class="link_smenu">link item2E</a></td></tr>
		<tr><td class="itens_menu"><a href="#" class="link_smenu">link item3E</a></td></tr>
	</table>
</div>
<!--|||||||||||||||||  COLOQUE DENTRO AS TAGS BODY||||||||||||||||||||||||||||| -->

</body>
</html>

<html> <head> <title>Untitled</title> <!--|||||=========== COLOQUE ENTRE AS TAGS HEAD ==========|||||||||| --> <!-- ||**||**||**|| FOLHA DE ESTILOS (CSS) ||**||**||**|| --> <style type="text/css"> /*+++++++++++++++ RELATIVO AS CATEGORIAS +++++++++++++++++++++*/ /**** LINKS DOS NOMES DAS CATEGORIAS ****/ /* Link em estado natural*/ a.link_menu:link{color:navy;text-decoration:none;font-weight:normal;font-family:arial;font-size:12px} /* Link depois de visitado*/ a.link_menu:visited{color:navy;text-decoration:none;font-weight:normal;font-family:arial;font-size:12px} /* Link ao passar o mouse*/ a.link_menu:hover{color:#ffffff;text-decoration:underline;font-weight:bold;font-family:arial;font-size:12px} /**** FIM LINKS DOS NOMES DAS CATEGORIAS ****/ /**** CELULAS DOS NOMES DAS CATEGORIAS ****/ /*padding top right bottom left */ .titulo_menu{ background-color:red; background-image:url(none); width:150px; height:25px; border:1px solid blue; padding: 5px 0px 0px 5px; } /**** FIM CELULAS DOS NOMES DAS CATEGORIAS ****/ /*++++++++++++ FIM RELATIVO AS CATEGORIAS +++++++++++++++++++++*/ /*++++++++++++ RELATIVO AS SUB-CATEGORIAS +++++++++++++++++++++*/ /**** LINKS DOS NOMES DAS SUB-CATEGORIAS ****/ /* Link em estado natural*/ a.link_smenu:link{color:#ffffff;text-decoration:none;font-weight:normal;font-family:arial;font-size:12px} /* Link depois de visitado*/ a.link_smenu:visited{color:#ffffff;text-decoration:none;font-weight:normal;font-family:arial;font-size:12px} /* Link ao passar o mouse*/ a.link_smenu:hover{color:navy;text-decoration:underline;font-weight:bold;font-family:arial;font-size:12px} /**** LINKS DOS NOMES DAS SUB-CATEGORIAS ****/ /**** CELULAS DOS NOMES DAS SUB-CATEGORIAS ****/ /*padding top right bottom left */ .itens_menu{ background-color:blue; background-image:url(none); width:137px; height:25px; border:1px solid red; padding: 5px 0px 0px 5px; } /**** FIM CELULAS DOS NOMES DAS SUB-CATEGORIAS ****/ /**** CELULAS DE REVEZAMENTO DOS NOMES DAS SUB-CATEGORIAS ****/ .itens_menu_r{ background-color:#0099ff; background-image:url(none); width:137px; height:25px; border:1px solid red; padding: 5px 0px 0px 5px; } /**** FIM CELULAS DE REVEZAMENTO DOS NOMES DAS SUB-CATEGORIAS ****/ /*++++++++++++ FIM RELATIVO AS SUB-CATEGORIAS +++++++++++++++++++++*/ </style> <!-- ||**||**||** FIM FOLHA DE ESTILOS (CSS) ||**||**||** --> <!-- |||||||||||||||| FUNÇÕES JAVASCRIPT (NÃO EDITE) |||||||||||||||| --> <script language="javascript"> c=0 du=""; function escondediv(dv,n){ for(i=1;i<=n;i++){ if(i==dv ){ if(du!=dv){ document.getElementById('mdiv'+i).style.display="inline" du=dv }else{ du="" document.getElementById('mdiv'+i).style.display="none" } }else{ document.getElementById('mdiv'+i).style.display="none" } } } function reveza(qq){ document.getElementById(qq).className="itens_menu_r" } function volta(qq){ document.getElementById(qq).className="itens_menu" } </script> <!-- ||||||||||||| FIM FUNÇÕES JAVASCRIPT (NÃO EDITE) |||||||||||||||| --> <!--|||||========== FIM COLOQUE ENTRE AS TAGS HEAD =========|||||||||| --> </head> <body> <!--||||||||||||||||| COLOQUE DENTRO AS TAGS BODY||||||||||||||||||||||||||||| --> <script> //Coloque aqui o número de itens de menu n_divs='5' </script> <div class="titulo_menu"><a href="#" class="link_menu" target="alvo">Link fixo</a></div> <div class="titulo_menu" ><a href="javascript:void(escondediv('1',n_divs))" class="link_menu" >Categoria 1</a></div> <div id="mdiv1" style="display:none"> <table border="0"> <tr><td id="um" class="itens_menu" ><a href="#" onmouseover="reveza('um')" onmouseout="volta('um')" class="link_smenu" target="alvo">link item1A</a></td></tr> <tr><td class="itens_menu" ><a href="#" class="link_smenu" target="alvo">link item2A</a></td></tr> <tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item3A</a></td></tr> </table> </div> <div class="titulo_menu"><a href="javascript:void(escondediv('2',n_divs))" class="link_menu">Categoria 2</a></div> <div id="mdiv2" style="display:none"> <table border="0"> <tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item1B</a></td></tr> <tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item2B</a></td></tr> <tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item3B</a></td></tr> </table> </div> <div class="titulo_menu"><a href="javascript:void(escondediv('3',n_divs))" class="link_menu">Categoria 3</a></div> <div id="mdiv3" style="display:none"> <table border="0"> <tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item1C</a></td></tr> <tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item2C</a></td></tr> <tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item3C</a></td></tr> </table> </div> <div class="titulo_menu"><a href="javascript:void(escondediv('4',n_divs))" class="link_menu">Categoria 4</a></div> <div id="mdiv4" style="display:none"> <table border="0"> <tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item1D</a></td></tr> <tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item2D</a></td></tr> <tr><td class="itens_menu"><a href="#" class="link_smenu" target="alvo">link item3D</a></td></tr> </table> </div> <div class="titulo_menu"><a href="javascript:void(escondediv('5',n_divs))" class="link_menu">Categoria 5</a></div> <div id="mdiv5" style="display:none"> <table border="0"> <tr><td class="itens_menu"><a href="#" class="link_smenu">link item1E</a></td></tr> <tr><td class="itens_menu"><a href="#" class="link_smenu">link item2E</a></td></tr> <tr><td class="itens_menu"><a href="#" class="link_smenu">link item3E</a></td></tr> </table> </div> <!--||||||||||||||||| COLOQUE DENTRO AS TAGS BODY||||||||||||||||||||||||||||| --> </body> </html>