<?php
$this->breadcrumbs=array(
	'Entrenamiento Actividads'=>array('index'),
	$model->idactividad,
);

$this->menu=array(
	array('label'=>'Listar Actividad', 'url'=>array('index')),
	array('label'=>'Crear Actividad', 'url'=>array('create')),
	array('label'=>'Actualizar Actividad', 'url'=>array('update', 'id'=>$model->idactividad)),
	array('label'=>'Borrar Actividad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idactividad),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Actividad', 'url'=>array('admin')),
);
?>

<h1>View EntrenamientoActividad #<?php echo $model->idactividad; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idactividad',
		'idtipo',
		'orden',
		'iddia',
	),
)); ?>
