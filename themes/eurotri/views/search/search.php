<?php
$this->layout='column2';
//$this->portlets['UserMenu']=array();
$this->portlets[]=array('BannerViewer',array('section'=>2,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('BannerViewer',array('section'=>3,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('SportEventsWidget', array());
$this->portlets[]=array('SportEventsSearchWidget', array());
$this->portlets[]=array('MailChimp', array());
$this->portlets[]=array('Siguenos',array('urlTwitter'=>'@eurotri','urlFacebook'=>'http://www.facebook.com/pages/Eurotri/168637049863680'));
$this->portlets[]=array('FacebookBox',array());

$cs=Yii::app()->clientScript;
$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/searchEngine.css',  'screen, projection'); 
       

?>
<?php
$this->pageTitle=Yii::app()->name . ' - Búsqueda';
?>
<h2>Resultados de la b&uacute;squeda</h2>
<div id='searchResultsContainer'>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'pager'=>array(
            'header'=>'',
            'prevPageLabel'=>'<',
            'nextPageLabel'=>'>',
        )
)); ?>
</div>
