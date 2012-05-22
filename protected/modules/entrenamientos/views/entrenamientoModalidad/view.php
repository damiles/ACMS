<?php
$this->breadcrumbs=array(
	'Modalidades'=>array('index'),
	$model->idmodalidad,
);

$this->menu=array(
	array('label'=>'Listar Modalidades', 'url'=>array('index')),
	array('label'=>'Crear Modalidad', 'url'=>array('create')),
	array('label'=>'Actualizar Modalidad', 'url'=>array('update', 'id'=>$model->idmodalidad)),
	array('label'=>'Borrar Modalidad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idmodalidad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Modalidades', 'url'=>array('admin')),
);
?>

<h1>Visualizar Modalidad #<?php echo $model->idmodalidad; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idmodalidad',
		'modalidad',
	),
)); ?>
