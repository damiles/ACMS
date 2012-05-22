<?php
$categorias=array();
if(isset($_GET['idCat'])){
        if($_GET['idCat']!='0'){
              $categoria=ArticleCategory::model()->findByPk($_GET['idCat']);
              array_push($categorias, $categoria->idArticleCategory);
              while($categoria->parent0){
                  $categoria=$categoria->parent0;
                  array_push($categorias, $categoria->idArticleCategory);
              }
        }
}


$tituloPagina='Artículos';
$titularPagina="<span>Artículos</span>Triatlón";
if($categorias){
    if(in_array(9,$categorias)){
        $tituloPagina='Artículos de Triatlón';
        $titularPagina="<span>Artículos</span>Triatlón";
    }else if(in_array(11,$categorias)){
        $tituloPagina='Material técnico';
        $titularPagina="<span>Material</span>Técnico";
    }else if(in_array(12,$categorias)){
        $tituloPagina='Multimedia de triatlón';
        $titularPagina="<span>Multimedia</span>Triatlón";
    }
}


$this->pageTitle=Yii::app()->name . ' - '.$tituloPagina;
$this->layout='column2';
$this->portlets[]=array('BannerViewer',array('section'=>2,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('BannerViewer',array('section'=>3,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('SportEventsWidget', array());
$this->portlets[]=array('SportEventsSearchWidget', array());
$this->portlets[]=array('MailChimp', array());
$this->portlets[]=array('Siguenos',array('urlTwitter'=>'@eurotri','urlFacebook'=>'http://www.facebook.com/pages/Eurotri/168637049863680'));
$this->portlets[]=array('FacebookBox',array());
?>





<h1 class="titular2">
     
    <?php echo $titularPagina; ?>

</h1>


    <?php

//Recogemos el ultimo articulo con banner publicado en portada de esta categoria
$cond='type="news" and published=true and date <=NOW() and banner IS NOT NULL';

if(isset($_GET['idCat'])){
        if($_GET['idCat']!='0'){
            /**
             * Recogemos todos los identificadores 
             * de la categoria seleccionada y sus hijos
             */
            $categoria=ArticleCategory::model()->findByPk($_GET['idCat']);
            $categorias=ACMS::getChildCategories($categoria);
            $catCond=join(' or category=',$categorias);
            $cond=$cond.' and (category='.$catCond.')';
        }
}

$condition= new CDbCriteria();
$condition->condition=$cond;
$condition->order="home DESC, date DESC";
$article=Article::model()->find($condition);
if($article){
    echo "<div class='banner'>";
    echo CHtml::link("<img  alt='".ACMS::getTitle($article)."' src='".Yii::app()->params['path']."/".$article->banner."'>",array('page', 'id'=>$article->idArticle,'idm'=>$_GET['idm'],'idCat'=>$_GET['idCat']));
    echo "</div>";
}
?>
    

<div class="consejos clearfix">
    <ul>
        <?php
        
        
$cond='type="news" and published=true and date <=NOW() ';
$with=array();
$join="";
if(isset($_GET['idCat'])){
        if($_GET['idCat']!='0'){
            /**
             * Recogemos todos los identificadores 
             * de la categoria seleccionada y sus hijos
             */
            $categoria=ArticleCategory::model()->findByPk($_GET['idCat']);
            $categorias=ACMS::getChildCategories($categoria);
            $catCond=join(' or category=',$categorias);
            $cond=$cond.' and (category='.$catCond.')';
        }
}

if(isset($_GET['idTag'])){
    $join=$join.' JOIN Article_has_Tag As AT ON AT.idArticle=t.idArticle ';
    $cond=$cond.' and AT.idTag='.$_GET['idTag'];
}

$pag=9;
if(isset($_GET['ps']))
        $pag=$_GET['ps'];

if(isset($_GET['idTag'])){
    if($article)
        $cond=$cond.' and t.idArticle<>'.$article->idArticle;
}else{
    if($article)
        $cond=$cond.' and idArticle<>'.$article->idArticle;
}
$dataProvider=new CActiveDataProvider('Article', array(
                        'criteria'=>array(
                                'join'=>$join,
                                'with'=>$with,
                                'condition'=>$cond,
                                'order'=>'home, date DESC',
                                ),
                        'pagination'=>array(
                                'pageSize'=>$pag,
                                ),
                        ));



        
        
        $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'article_view',
            'template'=>'<div class="clearfix">{items}</div><div class="clearfix">{pager}</div>',
            'summaryText'=>'Mostrando {start}-{end} de {count} noticia(s)',
            'pager'=>array(
                'header'=>'',
                'prevPageLabel'=>'<',
                'nextPageLabel'=>'>',
                ),
        )); ?>
    </ul>
</div>
