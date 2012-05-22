
<?php
$this->pageTitle=Yii::app()->name . ' - Busqueda';
$this->layout='webroot.themes.'.Yii::app()->theme->name.'.views.layouts.column2';
$this->portlets['BannerViewer']=array('section'=>2,'customClass'=>'banner_lateral');
$this->portlets['SportEventsWidget']=array();
$this->portlets['SportEventsSearchWidget']=array();
?>
<h2>Resultados de tu busqueda</h2>
<div id='searchResultsContainer'>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>