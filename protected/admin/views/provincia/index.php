<?php
$this->breadcrumbs=array(
	'Provincias',
);

$this->menu=array(
	array('label'=>'Create Provincia', 'url'=>array('create')),
	array('label'=>'Manage Provincia', 'url'=>array('admin')),
);
?>

<h1>Provincias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
