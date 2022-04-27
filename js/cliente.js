function loadXMLDoc(td_name, nr_ficha, tp_grupo)

{

if (window.XMLHttpRequest)

  {// code for IE7+, Firefox, Chrome, Opera, Safari

  xmlhttp=new XMLHttpRequest();

  }

else {// code for IE6, IE5

  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

  }

  xmlhttp.onload = function() {
    document.getElementById(td_name).innerHTML=xmlhttp.responseText;
  }

/*xmlhttp.onreadystatechange=function()

  {

  if (xmlhttp.readyState== XMLHttpRequest.DONE && (xmlhttp.status==200 || xmlhttp.status == 302))

    {

    document.getElementById(td_name).innerHTML=xmlhttp.responseText;

    }

  }*/

  

  var strData = "nr_ficha="+nr_ficha+"&tp_grupo="+tp_grupo;

  

xmlhttp.open("GET","inc/cliente_select.inc.php?"+strData,true);

//xmlhttp.setRequestHeader('Content-Type','text/xml'); 

//xmlhttp.setRequestHeader('encoding','ISO-8859-1'); 

//xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 

//xmlhttp.setRequestHeader('Content-length', strData.length ); 

//xmlhttp.send(strData);

xmlhttp.send(null);
}



function seleciona_cliente()

{

	var td_name = "cliente_select";

	var nr_ficha = document.getElementById('nr_ficha').value;

	var tp_grupo = document.getElementById('tp_despesa_grupo').options[document.getElementById('tp_despesa_grupo').selectedIndex].value;

	loadXMLDoc(td_name, nr_ficha, tp_grupo);

}
