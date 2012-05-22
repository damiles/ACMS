<?php
header('Content-type: text/javascript');
header('pragma: no-cache');
header('expires: 0');

$output = 'var tinyMCEImageList = new Array(';

foreach($galeria as $i=>$item){
	$nombre=$item->name;
	foreach($item->files as $item_arch){
		$output.='["'.$nombre.' > '.$item_arch->name.'","upload/'.$item_arch->url.'"],';	
	}
}

$output = substr($output, 0, -1);



$output .= ');';
echo $output;
