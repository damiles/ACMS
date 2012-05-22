<?php
$this->breadcrumbs=array(
	'Entrenamiento Tipoactividads'=>array('index'),
	$model->idtipo,
);

$this->menu=array(
	array('label'=>'Listar Tipos de Actividad', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Actividad', 'url'=>array('create')),
	array('label'=>'Actualizar Tipo de Actividad', 'url'=>array('update', 'id'=>$model->idtipo)),
	array('label'=>'Borrar Tipo de Actividad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtipo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gestionar Tipo de Actividad', 'url'=>array('admin')),
);
?>

<h1>View EntrenamientoTipoactividad #<?php echo $model->idtipo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idtipo',
		'tipo',
		'png',
	),
)); ?>
