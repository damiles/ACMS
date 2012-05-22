

<a class="row searchResult" href="<?php echo $data->url;?>">
<div class="num"></div>
<div class="searchContent">

<div class="searchTitle"><?php echo html_entity_decode($data->title);?></div>
<?php 
$text="";
/*
$words=$_GET['q'];
$wordsArr=split(" ",$words);
$text="";
foreach($wordsArr as $word){
	if($pos=strpos($data['fulltxt'],$word))
	{
		$minpos=$pos-200;
		if($minpos<0)
			$minpos=0;
		$text=$text."...".substr($data['fulltxt'],$minpos, 400);
	}
}
$text=$text."...";
$patterns=array();
$replacements=array();
foreach($wordsArr as $i=>$word){
	$patterns[$i]="/".$word."/";
	$replacements[$i]="<b>".$word."</b>";
}
$text=preg_replace($patterns,$replacements, $text);
*/
?>
<div class="searchDescription"><?php echo $text;?></div>
<div class="searchMetadata"><?php echo $data->url;?> </div>


</div>
</a>