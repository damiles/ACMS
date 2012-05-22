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
                    array('news', 'idCat'=>$parentCat->idArticleCategory,'title'=>ACMS::getTitle($parentCat),'idm'=>2),
                    array('class'=>'categoria')); 
            }
            ?>
    </div>
    <div class="datos_consejo">
        <?php echo CHtml::link(CHtml::encode(ACMS::getTitle($data)), array('page', 'id'=>$data->idArticle,'idm'=>2,'idCat'=>4), array('class'=>'tit_consejo')); ?>
        <br/>
        <?php echo CHtml::link(CHtml::encode(ACMS::getTitle($data->myCategory)),array('news', 'idCat'=>$data->myCategory->idArticleCategory,'title'=>ACMS::getTitle($data->myCategory),'idm'=>2 ),array('class'=>'nivel')); ?>
        <p class="consejo_text"><?php echo ACMS::getMinimalText($data, 150)?></p>
    </div>
</li>


