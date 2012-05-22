

<a class="row searchResult" href="<?php echo $data->url;?>">
<div class="num"></div>
<div class="searchContent">

<div class="searchTitle"><?php echo html_entity_decode($data->title);?></div>
<?php 

$words=strtolower($_GET['q']);
$wordsArr=split(" ",$words);
$text="";
foreach($wordsArr as $word){
	if($pos=strpos(strtolower($data->body),$word))
	{
		$minpos=$pos-200;
		if($minpos<0)
			$minpos=0;
		$text=$text."...".substr($data->body,$minpos, 400);
	}
}
$text=$text."...";
$patterns=array();
$replacements=array();
foreach($wordsArr as $i=>$word){
	$patterns[$i]="/".$word."/i";
	$replacements[$i]="<b>".$word."</b>";
}
$text=preg_replace($patterns,$replacements, $text);

?>
<div class="searchDescription"><?php echo $text;?></div>
<div class="searchMetadata"><?php 
if(strlen($data->url)>80)
        echo substr ($data->url, 0,80)."...";
else
    echo $data->url;
?> </div>


</div>
</a>