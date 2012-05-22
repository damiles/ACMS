<?php
$this->breadcrumbs=array(
	'Planes de Entrenamiento'=>array('index'),
	$model->identrenamiento,
);

$this->menu=array(
	array('label'=>'Listar Planes', 'url'=>array('index')),
	array('label'=>'Crear Plan', 'url'=>array('create')),
	array('label'=>'Actualizar Plan', 'url'=>array('update', 'id'=>$model->identrenamiento)),
	array('label'=>'Borrar Plan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->identrenamiento),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Planes', 'url'=>array('admin')),
);
?>

<h1>Vista del plan de Entrenamiento #<?php echo $model->identrenamiento; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'identrenamiento',
		'idmodalidad',
		'nsemanas',
		'nhorassemana',
	),
)); ?>
