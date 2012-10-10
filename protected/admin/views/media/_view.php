<?php 
	$fileinfo=pathinfo(Yii::app()->params['upload'].$data->url);
	echo "<a href=\"javascript:setData('".$data->MyCategory."','".$fileinfo['filename']."','".$data->name."','".$fileinfo['extension']."','".Utiles::formatBytes(filesize(Yii::app()->params['upload'].$data->url))."','".$data->description."');\"><img src='upload/".$fileinfo['filename']."_low.".$fileinfo['extension']."'></a>"; 
?>
