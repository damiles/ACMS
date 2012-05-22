<?php
$this->breadcrumbs=array(
	'Distances',
);

$this->menu=array(
	array('label'=>'Create Distance', 'url'=>array('create')),
	array('label'=>'Manage Distance', 'url'=>array('admin')),
);
?>

<h1>Distances</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
