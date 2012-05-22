<?php
if($limit==-1)
    $limit=20;
foreach ($banners as $i=>$item){
    if($i<$limit)
	echo "<a href='index.php?r=site/banner&id=$item->idBanner' class='$customClass' target='$item->target'><img src='".Yii::app()->params['path']."/$item->src'></a>";
    else
        break;
}    	
?>
