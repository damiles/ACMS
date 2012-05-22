<?php
$this->breadcrumbs=array(
	'Trucos'=>array('index'),
	$model->idTruco,
);

$this->menu=array(
	array('label'=>'List Truco', 'url'=>array('index')),
	array('label'=>'Create Truco', 'url'=>array('create')),
	array('label'=>'Update Truco', 'url'=>array('update', 'id'=>$model->idTruco)),
	array('label'=>'Delete Truco', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTruco),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Truco', 'url'=>array('admin')),
);
?>

<h1>View Truco #<?php echo $model->idTruco; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTruco',
		'published',
		'idTrucoCategoria',
	),
)); ?>
