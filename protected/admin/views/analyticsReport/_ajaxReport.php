<?php

require_once('OFC/OFC_Chart.php');

$pageViews= array();
$visits= array();
$keys=array();

$max=10;

while($item= current($report)){
	//echo  "['".key($report). "', ".$item["ga:pageviews"]. ", ".$item["ga:visits"]."],";
	array_push($pageViews,(int)$item["ga:pageviews"]);
	if($max < (int)$item["ga:pageviews"]){
		$max= (int)$item["ga:pageviews"];
	}
	array_push($visits,(int)$item["ga:visits"]);
	if($max < (int)$item["ga:visits"]){
		$max= (int)$item["ga:visits"];
	}

	$k=date("d-m-Y", strtotime(key($report)) );
	array_push($keys,$k);
	next($report);
}
$max=$max+20;
//Titulo
$title = new OFC_Elements_Title( "Estadisticas del mes." );
//Estadisticas de visitas de paginas
$line_dot = new OFC_Charts_Line();
$line_dot->set_values( $pageViews );
$line_dot->set_key("Paginas vistas", 12);
$line_dot->set_colour('#0077cc');
//Estadisticas de visitas
$line_dot1 = new OFC_Charts_Line();
$line_dot1->set_values( $visits );
$line_dot1->set_key("Vistas unicas", 12);
$line_dot1->set_colour('#86Be2b');
//Eje y, escalado
$y = new OFC_Elements_Axis_Y();
$step=(int)($max/10);
$y->set_range( 0, $max, $step );
$y->set_colours("#CCCCCC","#EEEEEE");
//Titulos Eje X
$x = new OFC_Elements_Axis_X();
$x->set_colours("#CCCCCC","#EEEEEE");

$x_labels = new OFC_Elements_Axis_X_Label_Set();
$x_labels->rotate=-45;
$x_labels->set_labels( $keys );

$x->set_labels( $x_labels );
//Datos de la Grafica
$chart = new OFC_Chart();
$chart->set_title( $title );
$chart->add_element( $line_dot );
$chart->add_element( $line_dot1 );
$chart->set_y_axis( $y );
$chart->set_x_axis( $x );
$chart->set_bg_colour('#ffffff');
//Salida
echo $chart->toPrettyString();

