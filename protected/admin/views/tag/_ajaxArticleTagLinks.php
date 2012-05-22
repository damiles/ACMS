<?php
foreach($tags as $tag)
{
    echo CHtml::ajaxLink($tag->tag, 
            array('tag/deleteTagLink','idTag'=>$tag->idTag,'idArticle'=>$idArticle), 
            array('success'=>'function(data){
                    if(data=="1")
                        $("#tag_'.$tag->idTag.'").hide();
                }'),
            array('class'=>'tagDelButton','id'=>'tag_'.$tag->idTag));
}
?>
