<ul id="langSel">
<?php
$langs=Lang::model()->findAllByAttributes(array("selected"=>1));
foreach($langs as $i=>$item){
	$class="";
	if($item->idLang==$currentLang)
		$class="on";	
	echo "<li><a href='index.php?r=site/index&_lang=$item->idLang' class='$class' id='lang_$item->idLang'><span>$item->title</span></a></li>";
	
}
?>
</ul>