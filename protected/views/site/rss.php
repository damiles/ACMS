<?php
$this->layout='blank';
//creo cabeceras desde PHP para decir que devuelvo un XML
header("Content-type: text/xml");

//comienzo a escribir el código del RSS
echo '<?xml version="1.0" encoding="UTF-8"?>';
	


//Cabeceras del RSS
echo '<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">';
//Datos generales del Canal. Edítalos conforme a tus necesidades
echo "<channel>\n";
echo "<title>".Yii::app()->name."</title>";
echo "<link>".Yii::app()->request->hostInfo."</link>";
echo "<description>Sindicalización de noticias de ".Yii::app()->name."</description>";
echo "<language>es-es</language>";
echo "<copyright>".Yii::app()->name."</copyright>\n";

//para cada registro encontrado en la base de datos
//tengo que crear la entrada RSS en un item
//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'rss_view',
//));
$datos=$dataProvider->getData();
foreach($datos as $data):
	
	echo "<item>\n";
	echo "<title><![CDATA[".ACMS::getTitle($data)."]]></title>\n";
	
	$text=ACMS::getText($data);
	$text=ACMS::strip_selected_tags_by_id_or_class(array('caja_gris'),$text);
	$text=strip_tags($text);
	$text=ACMS::cutText($text,125);
	$text=str_replace("&nbsp;", '', $text);
	
	
	echo "<description><![CDATA[".$text."...]]></description>\n";
	if($type!=2){
		echo "<link>" . Yii::app()->request->hostInfo. CHtml::encode(Yii::app()->urlManager->createUrl('site/page',array('id'=> $data->idArticle, 'idm'=>$_GET['idm'],'idCat'=>$_GET['idCat'] ))) . "</link>\n";
	}
	$imagen= Yii::app()->request->hostInfo."/";
	if(isset($data->img_portada))
		$imagen.=$data->img_portaa;		

	else
		$imagen.=ACMS::getFirstTextImage($data);
	
	echo '<media:content xmlns:media="http://search.yahoo.com/mrss" url="'.$imagen.'" medium="image" type="image/png" width="173" height="114" />';
	echo "<pubDate>". $data->date ."</pubDate>\n";
	echo "</item>\n"; 

	endforeach;
	//cierro las etiquetas del XML
	echo "</channel>";
	echo "</rss>";



