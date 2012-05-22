<?php

$this->layout='column2';
$this->portlets[]=array('BannerViewer',array('section'=>2,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('BannerViewer',array('section'=>3,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('SportEventsWidget', array());
$this->portlets[]=array('SportEventsSearchWidget', array());
$this->portlets[]=array('MailChimp', array());
$this->portlets[]=array('Siguenos',array('urlTwitter'=>'@eurotri','urlFacebook'=>'http://www.facebook.com/pages/Eurotri/168637049863680'));
$this->portlets[]=array('FacebookBox',array());



$categoria=ArticleCategory::model()->findByPk($_GET['idCat']);
$titular=ACMS::getTitle($categoria);

$this->pageTitle=Yii::app()->name . ' - '.$titular;

$titleArr=split(" ", $titular);
$lastTitleWord=  array_pop($titleArr);
$firstWords=  join(" ", $titleArr);



//Recogemos otras noticias
$cond='type="news" and published=true and date <=NOW() ';
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

$condicion=  new CDbCriteria;
$condicion->limit=2;
$condicion->condition=$cond;
$condicion->order=" home desc, date DESC";

$mostImportantNews=Article::model()->findAll($condicion);

$nfotos=0;
?>

<div class="titular2">
        <span><?php echo $firstWords;?></span><?php echo $lastTitleWord;?>
</div>




<div class="desplegado_news clearfix">
		
    <div class="desplegado_news_iz">
        <?php foreach($mostImportantNews as $i=>$item): ?>
        <div class="noticia_big <?php if($i==1){echo 'noborder';}?>">
            <?php 
            if(ACMS::getFirstTextImageSrc($item)!="src='upload/default.png'"){
                $nfotos++;
            ?>
            <img <?php echo ACMS::getFirstTextImageSrc($item); ?> width="346" style="margin-bottom:9px;">
            <?php } ?>
            <div class="titular3">
                    <?php
                    $fecha=getDate(strtotime($item->date));
                    $mon=ACMS::getMonthsLabel();
                    ?>
                <?php echo $fecha['mday'].' '.strtoupper($mon[$fecha['mon']]); ?>  | <?php echo ACMS::getTitle($item->myCategory);?> <span>Fuente: <?php if($item->fuente!= null && $item->fuente!=""){ echo $item->fuente;}else{echo "Eurotri";}?></span>
                    
            </div>

            <?php echo CHtml::link(ACMS::getTitle($item),array('site/page','idm'=>$_GET['idm'],'idCat'=>$_GET['idCat'], 'id'=>$item->idArticle, 'title'=>ACMS::getTitle($item)));?>
            <p><?php echo ACMS::getMinimalText($item, 800); ?>...</p>
        </div>
        <?php endforeach;?>
    </div>
    
    <?php
    if($nfotos==0)
        $condicion->limit=5;
    else if($nfotos>0)
        $condicion->limit=7;

$condicion->offset=2;
$importantNews=Article::model()->findAll($condicion);
    ?>
    
    
    <div class="desplegado_news_de">
        <?php foreach($importantNews as $i=>$item): ?>
            <div class="noticia_small <?php if($i==6){echo 'noborder';}?>">
                    <?php if( ($i==2 || $i==5)&& $nfotos==2){ 
                        if(ACMS::getFirstTextImageSrc($item)!="src='upload/default.png'"){
                    ?>
                    <img  <?php echo ACMS::getFirstTextImageSrc($item); ?> width="283" /><br><br>
                    <?php }}?>
                    <?php echo CHtml::link(ACMS::getTitle($item),array('site/page','idm'=>$_GET['idm'],'idCat'=>$_GET['idCat'], 'id'=>$item->idArticle, 'title'=>ACMS::getTitle($item)));?>
                    <div class="titular4">
                            <?php
                                $fecha=getDate(strtotime($item->date));
                                $mon=ACMS::getMonthsLabel();
                                ?>
                            <?php echo $fecha['mday'].' '.strtoupper($mon[$fecha['mon']]); ?>  | <span>Fuente: <?php if($item->fuente!= null && $item->fuente!=""){ echo $item->fuente;}else{echo "Eurotri";}?></span>

                    </div>
                    <p><?php echo ACMS::getMinimalText($item, 80); ?>...</p>
            </div>
        <?php endforeach; ?>
    </div>			
</div>









<div class="titular2">
        <span>otros</span>titulares
</div>

<ul class="otros_tit">
<?php

$cond='type="news" and published=true and date <=NOW()';
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

$cond=$cond.' and ( ';
foreach($mostImportantNews as $item){
    $cond=$cond.' idArticle <> '.$item->idArticle." and";
}
foreach($importantNews as $item){
    $cond=$cond.' idArticle <> '.$item->idArticle." and";
}
$cond=$cond.' 1 ) ';

$dataProvider=new CActiveDataProvider('Article', array(
                        'criteria'=>array(
                                'join'=>$join,
                                'with'=>$with,
                                'condition'=>$cond,
                                'order'=>'home DESC, date DESC',
                                ),
                        'pagination'=>array(
                                'pageSize'=>$pag,
                                ),
                        ));




$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'news_view',
        'template'=>'{items}<div class="clearfix">{summary}{pager}</div>',
        'summaryText'=>'Mostrando {start}-{end} de {count} noticia(s)',
        'pager'=>array(
            'header'=>'',
            'prevPageLabel'=>'<',
            'nextPageLabel'=>'>',
        )
        
)); ?>
</ul>