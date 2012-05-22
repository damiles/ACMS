<?php
$this->breadcrumbs=array(
	'Distances'=>array('index'),
	$model->idDistance,
);

$this->menu=array(
	//array('label'=>'List Distance', 'url'=>array('index')),
	array('label'=>'Crear Distancias', 'url'=>array('create')),
	array('label'=>'Actualizar Distancias', 'url'=>array('update', 'id'=>$model->idDistance)),
	array('label'=>'Borrar Distancias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idDistance),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Distancias', 'url'=>array('admin')),
);
?>

<h1>View Distance #<?php echo $model->idDistance; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idDistance',
		'swimming',
		'cycling',
		'running',
	),
)); ?>
