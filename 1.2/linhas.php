<?php require_once("php7_mysql_shim.php");
session_start();

include 'charts.php';

include "dao/db_con.php";
include "inc/util.inc.php";

if (!isset($_REQUEST['f_dt_inicio']) || !isset($_REQUEST['f_dt_final']))
{
	$_REQUEST['f_dt_inicio'] = '01/'.date('m').'/'.date('Y');
	$_REQUEST['f_dt_final'] = date('d').'/'.date('m').'/'.date('Y');
}

//print_r($_REQUEST);

$p_dt_inicio = mktime(0,0,0, substr($_REQUEST['f_dt_inicio'], 3, 2), substr($_REQUEST['f_dt_inicio'], 0, 2), substr($_REQUEST['f_dt_inicio'], 6, 4));
$p_dt_final = mktime(0,0,0, substr($_REQUEST['f_dt_final'], 3, 2), substr($_REQUEST['f_dt_final'], 0, 2), substr($_REQUEST['f_dt_final'], 6, 4));


$safety_loop = 0;

$arr_desp[0] = "Despesa";
$arr_receita[0] = "Receita";
$arr_dates[0] = "";

while ($p_dt_inicio < $p_dt_final)
{
	$safety_loop++;
	
	$dt_inicio_formatada = date('Y-m-d', $p_dt_inicio);
	$dt_inicio_mostrar = date('d', $p_dt_inicio);
	
	$sql = "SELECT SUM(vl_despesa) AS vl_debito FROM despesa WHERE tp_fluxo='D' ";
	$sql .= " AND dt_despesa = '".$dt_inicio_formatada."' ";
	//echo $sql;
	
	$stmtd = mysql_query($sql);
	$rsd = mysql_fetch_array($stmtd);
	$arr_desp[$safety_loop] = $rsd['vl_debito'];
	
	$sql = "SELECT SUM(vl_despesa) AS vl_receita FROM despesa WHERE (tp_fluxo='R' or tp_fluxo = 'C') ";
	$sql .= " AND dt_despesa = '".$dt_inicio_formatada."' ";
	
	$stmtr = mysql_query($sql);
	$rsr = mysql_fetch_array($stmtr);
	$arr_receita[$safety_loop] = $rsr['vl_receita'];
	
	$arr_dates[$safety_loop] = $dt_inicio_mostrar;
	
	$p_dt_inicio = mktime(0,0,0, substr($_REQUEST['f_dt_inicio'], 3, 2), substr($_REQUEST['f_dt_inicio'], 0, 2)+$safety_loop, substr($_REQUEST['f_dt_inicio'], 6, 4));
	
	if ($safety_loop > 30) break;
}

$chart[ 'axis_category' ] = array (  'size'=>10, 'color'=>"000000", 'alpha'=>75, 'skip'=>0 ,'orientation'=>"horizontal" ); 
$chart[ 'axis_ticks' ] = array ( 'value_ticks'=>false, 'category_ticks'=>true, 'major_thickness'=>2, 'minor_thickness'=>1, 'minor_count'=>1, 'major_color'=>"000000", 'minor_color'=>"222222" ,'position'=>"inside" );
$chart[ 'axis_value' ] = array ( 'min'=>-40, 'size'=>10, 'color'=>"ffffff", 'alpha'=>50, 'steps'=>6, 'prefix'=>"", 'suffix'=>"", 'decimals'=>0, 'separator'=>"", 'show_min'=>false );
		
$chart[ 'chart_data' ] = array ( $arr_dates, $arr_receita, $arr_desp );
$chart[ 'chart_grid_h' ] = array ( 'alpha'=>10, 'color'=>"000000", 'thickness'=>1 );
$chart[ 'chart_pref' ] = array ( 'line_thickness'=>2, 'point_shape'=>"circle", 'fill_shape'=>false );
$chart[ 'chart_rect' ] = array ( 'x'=>40, 'y'=>100, 'width'=>750, 'height'=>150, 'positive_color'=>"ffffff", 'positive_alpha'=>50, 'negative_color'=>"000000", 'negative_alpha'=>10 );
$chart[ 'chart_transition' ] = array ( 'type'=>"slide_left", 'delay'=>.5, 'duration'=>.5, 'order'=>"series" );
$chart[ 'chart_type' ] = "Line";
$chart[ 'chart_value' ] = array ( 'position'=>"cursor", 'size'=>12, 'color'=>"000000", 'background_color'=>"aaff00", 'alpha'=>80 );

$chart[ 'draw' ] = array ( array ( 'transition'=>"dissolve", 'delay'=>0, 'duration'=>.5, 'type'=>"text", 'color'=>"000000", 'alpha'=>8, 'font'=>"Arial", 'rotation'=>0, 'bold'=>true, 'size'=>48, 'x'=>8, 'y'=>7, 'width'=>800, 'height'=>75, 'text'=>"", 'h_align'=>"center", 'v_align'=>"bottom" ) );

$chart[ 'legend_label' ] = array ( 'layout'=>"horizontal", 'bullet'=>"line", 'font'=>"arial", 'bold'=>true, 'size'=>13, 'color'=>"ffffff", 'alpha'=>65 ); 
$chart[ 'legend_rect' ] = array ( 'x'=>50, 'y'=>75, 'width'=>320, 'height'=>5, 'margin'=>5, 'fill_color'=>"000000", 'fill_alpha'=>7, 'line_color'=>"000000", 'line_alpha'=>0, 'line_thickness'=>0 ); 
$chart[ 'legend_transition' ] = array ( 'type'=>"dissolve", 'delay'=>0, 'duration'=>.5 );

$chart[ 'series_color' ] = array ( "8844ff", "ff4444", "8844ff" ); 

$chart [ 'series_explode' ] = array ( 400 );

SendChartData ( $chart );
?>