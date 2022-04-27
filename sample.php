<?php 
session_start();

//print_r($_REQUEST);

//include charts.php to access the SendChartData function
include "charts.php";

include "dao/db_con.php";
include "inc/util.inc.php";

$sql = "SELECT SUM(vl_despesa) AS vl_debito FROM despesa WHERE tp_fluxo='D' ";$sql .= "AND cd_empresa = ".$_SESSION['s_cd_empresa']." ";
$where="and";
if (isset($_REQUEST['f_dt_inicio'])&& $_REQUEST['f_dt_inicio'] != ''){
	//$where = (empty($where))?"where":"and";
	$sql .= $where." dt_despesa >= '".formata_data_inserir($_REQUEST['f_dt_inicio'])."' ";
}
if (isset($_REQUEST['f_dt_final'])&& $_REQUEST['f_dt_final'] != ''){
	//$where = (empty($where))?"where":"and";
	$sql .= $where." dt_despesa <= '".formata_data_inserir($_REQUEST['f_dt_final'])."' ";
}

//echo $sql;

$stmtd = mysql_query($sql);
$rsd = mysql_fetch_array($stmtd);

$sql = "SELECT SUM(vl_despesa) AS vl_receita FROM despesa WHERE (tp_fluxo='R' or tp_fluxo = 'C') ";$sql .= "AND cd_empresa = ".$_SESSION['s_cd_empresa']." ";
$where="and";
if (isset($_REQUEST['f_dt_inicio']) && $_REQUEST['f_dt_inicio'] != ''){
	//$where = (empty($where))?"where":"and";
	$sql .= $where." dt_despesa >= '".formata_data_inserir($_REQUEST['f_dt_inicio'])."' ";
}
if (isset($_REQUEST['f_dt_final'])&& $_REQUEST['f_dt_final'] != ''){
	//$where = (empty($where))?"where":"and";
	$sql .= $where." dt_despesa <= '".formata_data_inserir($_REQUEST['f_dt_final'])."' ";
}

$stmtr = mysql_query($sql);
$rsr = mysql_fetch_array($stmtr);

//change the chart to a bar chart
$chart[ 'chart_data' ] = array ( array ( "", "Despesa", "Receita" ), array ( "", $rsd['vl_debito'], $rsr['vl_receita'] ) );

$chart[ 'chart_grid_h' ] = array ( 'alpha'=>20, 'color'=>"000000", 'thickness'=>1, 'type'=>"solid" );
$chart[ 'chart_rect' ] = array ( 'positive_color'=>"ffffff", 'positive_alpha'=>20, 'negative_color'=>"ff0000", 'negative_alpha'=>10 );
$chart[ 'chart_type' ] = "pie";
$chart[ 'chart_value' ] = array ( 'color'=>"ffffff", 'alpha'=>90, 'font'=>"arial", 'bold'=>true, 'size'=>12, 'position'=>"outside", 'prefix'=>"", 'suffix'=>"", 'decimals'=>2, 'separator'=>"", 'as_percentage'=>false );

$chart[ 'draw' ] = array ( array ( 'type'=>"text", 'color'=>"000000", 'alpha'=>10, 'font'=>"arial", 'rotation'=>0, 'bold'=>true, 'size'=>30, 'x'=>0, 'y'=>140, 'width'=>400, 'height'=>150, 'text'=>"|||||||||||||||||||||||||||||||||||||||||||||||", 'h_align'=>"center", 'v_align'=>"bottom" )) ;

$chart[ 'legend_label' ] = array ( 'layout'=>"horizontal", 'bullet'=>"circle", 'font'=>"arial", 'bold'=>true, 'size'=>13, 'color'=>"ffffff", 'alpha'=>85 ); 
$chart[ 'legend_rect' ] = array ( 'fill_color'=>"ffffff", 'fill_alpha'=>10, 'line_color'=>"000000", 'line_alpha'=>0, 'line_thickness'=>0 ); 

$chart[ 'series_color' ] = array ( "ddaa41", "88dd11", "4e62dd", "ff8811", "4d4d4d", "5a4b6e" ); 
$chart[ 'series_explode' ] = array ( 20, 0, 50 );

SendChartData ( $chart );



?>