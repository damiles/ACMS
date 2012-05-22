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


?>

<div class="titular2">
        <span><?php echo $firstWords;?></span><?php echo $lastTitleWord;?>
</div>




<div class=" clearfix" style="margin-top:24px;">
		
    

        

<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'consejos_view',
        'template'=>'{items}<div class="clearfix" style="padding-bottom:30px; border-bottom: 1px solid #D6E0E5">{summary}{pager}</div>',
        'summaryText'=>'Mostrando {start}-{end} de {count} noticia(s)',
        'pager'=>array(
            'header'=>'',
            'prevPageLabel'=>'<',
            'nextPageLabel'=>'>',
        )
        
)); ?>
        
  <?php
        
    $this->widget("NoticiasBiCol");

    $this->widget("ArticulosEnPortada"); 
    ?>
    
  		
</div>
