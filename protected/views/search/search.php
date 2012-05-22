
<?php
$this->pageTitle=Yii::app()->name . ' - Busqueda';
?>
<h2>Resultados te tu busqueda</h2>
<div id='searchResultsContainer'>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>