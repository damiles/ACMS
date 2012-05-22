<?php
$this->layout='blank';
//creo cabeceras desde PHP para decir que devuelvo un XML
header("Content-type: text/xml");

//comienzo a escribir el código del RSS
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9"
        xmlns:image="http://www.sitemaps.org/schemas/sitemap-image/1.1">

<?php
//Cabeceras del RSS
echo '<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/">';
//Datos generales del Canal. Edítalos conforme a tus necesidades
echo "<channel>"\n"</channel>";
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
	echo "<url>";
	echo "<loc> ".Yii::app()->request->hostInfo."</loc>";
?>
	<news:news>
		<news:publication>
			<news:name> <?php  echo Yii::app()->name ?> </news:name>
                        <news:language><?php echo Yii::app()->getLanguage()?> </news:language>
		</news:publication>
		<news:genres>PressRelease</news:genres>
		<news:publication_date><?php echo $data->date ?></news:publication_date>
                <news:title><?php echo ACMS::getTitle($data) ?></news:title>
	</news:news>
	<image:image>
		<?php
		$imagen= Yii::app()->request->hostInfo."/";
			if(isset($data->img_portada))
				$imagen.=$data->img_portada;		
			else
				$imagen.=ACMS::getFirstTextImage($data);
		?>
		<image:loc><?php echo '<media:content xmlns:media="http://search.yahoo.com/mrss" url="'.$imagen.'" medium="image" 				    type="image/png" width="173" height="114" />'; ?></image:loc>
	</image:image>
	</url>
<?php
endforeach;
?>
</urlset>
</rss> 

