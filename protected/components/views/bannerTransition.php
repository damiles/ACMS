<div id="banner">
<?php
$numBanners=0;
$now=time();
$i=0;
foreach ($banners as $item){
    
    $endDate=strtotime($item->endDate);
    
    if($endDate > $now || $item->endDate=='0000-00-00'){
	$numBanners++;
	$style="";
	if($i>0)
		$style="display:none";
	echo "<a class='$customClass' id='imgBanner_$i' style='$style' href='index.php?r=site/banner&id=$item->idBanner' target='$item->target'><img src='".Yii::app()->params['path']."/$item->src' alt='Banner' /></a>";
    
        $i++;
    }
}    
?>   
</div>

<?php
if($numBanners>1){
	$cs=Yii::app()->clientScript;
	$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/Artres/bannerTransitions.js', CClientScript::POS_HEAD);
?>

<div class="contenebolas">
       <ul class="bolas">
<?php
$i=0;
foreach ($banners as $item){
	$class='';
        $endDate=strtotime($item->endDate);
    
        if($endDate > $now || $item->endDate=='0000-00-00'){
            if($i==0)
                    $class="active";
            echo "<li><a id='linkBanner_$i' class='linkBanner $class' href='#'><img src='".Yii::app()->params['path']."/$item->miniatura' alt='Banner' /></a></li>";			
            $i++;
            
        }
}   ?> 
       </ul>

<script>
Artres.bannerTransitions.numBanners=<?php echo $numBanners;?>;
</script>
</div>
<?php } ?>


