<?php
$this->pageTitle=Yii::app()->name . ' - Busqueda';
$this->layout='column3';
?>
<div id='searchResultsContainer'>
<?php
$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'search_view',
)); ?>
</div>
