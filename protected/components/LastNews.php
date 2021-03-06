<?php 
Yii::import('zii.widgets.CPortlet');
 
class LastNews extends CPortlet
{
	public $showFirstImage=true;
	public $showMinimalText=false;
	public $numNews=3;
	protected function renderContent()
    {
 		$news=Article::model()->findAll('type=? and published=true and date <=NOW() order by date desc limit '.$this->numNews, array("news"));
 		echo "<ul>";
 		foreach ($news as $item){
 			echo "<li class='news'>";
 			echo "<div class='metainfo'>".ACMS::getTitle($item->myCategory)." | <a href='index.php?r=site/page&id=$item->idArticle'>Ver m&aacute;s</a></div>";
 			echo "<div class='content clearfix'>";
 			if($this->showFirstImage)
 				if(ACMS::getHomeImageSrc($item)!='')
 					echo "<div class='imageNews'><img ".ACMS::getHomeImageSrc($item)." /></div>";
 			echo "<div class='title'>".ACMS::getTitle($item)."</div>";
 			if($this->showMinimalText)
 				echo "<div class='minimalText'>".ACMS::getMinimalText($item)."</div>";
                        echo "</div>";
 			echo "</li>";			
 		}    	
 		echo "</ul>";
    }
}

