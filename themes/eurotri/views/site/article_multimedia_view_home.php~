<?php
$clase='';
if((1+$index)%3==0)
    $clase='tercero';
    
$cat=$data->myCategory;
$categorias=array();

while( $cat->idArticleCategory != 4){
    array_push($categorias, $cat);
    
    if($cat->parent0){
        $cat=$cat->parent0;
    }else {
        break;
    }

}

//array_pop($categorias);
$categorias=array_reverse($categorias);

?>
<li class='<?php echo $clase;?>'>
    <div class="foto_cosejo">
        <img width='211' <?php echo ACMS::getHomeImageSrc($data)?> />
            <!--<span>ENTRENAMIENTO</span>-->
        
            <?php 
            if(count($categorias)>0){
                $parentCat=$categorias[0];
            echo CHtml::link(
                    CHtml::encode(ACMS::getTitle($parentCat)),
                    array('news', 'idCat'=>$parentCat->idArticleCategory,'title'=>ACMS::getTitle($parentCat),'idm'=>4),
                    array('class'=>'categoria')); 
            }
            ?>
    </div>
    <div class="datos_consejo">
        <?php echo CHtml::link(CHtml::encode(ACMS::getTitle($data)), array('page', 'id'=>$data->idArticle,'idm'=>4,'idCat'=>12), array('class'=>'tit_consejo')); ?>
        <br/>
        <?php echo CHtml::link(CHtml::encode(ACMS::getTitle($data->myCategory)),array('news', 'idCat'=>$data->myCategory->idArticleCategory,'title'=>ACMS::getTitle($data->myCategory),'idm'=>2 ),array('class'=>'nivel')); ?>
        <p class="consejo_text"><?php 
        $text=ACMS::getText($data);
            $text=ACMS::strip_selected_tags_by_id_or_class(array('caja_gris'),$text);
            $text=strip_tags($text);
	    $text=ACMS::cutText($text,125);
            $text=str_replace("&nbsp;", '', $text);
            echo $text."...";
        ?></p>
    </div>
</li>


