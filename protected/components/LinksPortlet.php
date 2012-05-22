<?php
Yii::import('zii.widgets.CPortlet');
 
class LinksPortlet extends CPortlet
{

	public $tags='';
 	
    protected function renderContent()
    {
 		$links=Link::model()->findAll('published=true order by orden');
 		echo "<ul>";
 		foreach ($links as $item){
 			$visible=true;
 			if($this->tags!=''){
 				$pos = strpos($item->tags,$this->tags);
 				if($pos === false){
 					$visible=false;
 				}
 			}
			if($visible==true)
 				echo "<li><a href='site/link&id=$item->idLink' target='$item->target' class='$item->css'>$item->title</a></li>";
 				
 		}   
 		echo "</ul>"; 	
    }
}

