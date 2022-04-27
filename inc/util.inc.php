<?php

function formata_numero_inserir($nr){
	
	$nr = str_replace(".", "", $nr);
	$nrf = str_replace(",", ".", $nr);
	
	if ($nrf){
		$nrf = number_format($nrf, 2, ".", "");
	}
//echo $nrf."---";	
	return $nrf;
}

function formata_numero_mostrar($nr){
	
	$nrf = "";
	
	if ($nr == ""){
		
		$nr = 0;
	}
	
	$nrf = number_format($nr, 2, ",", ".");
	
	return $nrf;	
}

function formata_data_mostrar($dt){
	if ($dt != ""){		
		return date('d/m/Y', mktime(0,0,0, substr($dt, 5, 2), substr($dt, 8, 2), substr($dt, 0, 4)));
	} else return "";
}

function formata_data_inserir($dt){
	
//	echo $dt." ----";
	if ($dt != ""){
		$dt_i = date('Y-m-d', mktime(0,0,0, substr($dt, 3, 2), substr($dt, 0, 2), substr($dt, 6, 4)));
		return $dt_i;
	} else {
		return "";
	}
}

?>