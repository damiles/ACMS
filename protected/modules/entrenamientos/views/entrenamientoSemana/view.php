<?php
$this->breadcrumbs=array(
	'Entrenamiento Semanas'=>array('index'),
	$model->idsemana,
);

$this->menu=array(
	array('label'=>'Listar Planes', 'url'=>array('index')),
	array('label'=>'Crear Plan', 'url'=>array('create')),
	array('label'=>'Actualizar Plan', 'url'=>array('update', 'id'=>$model->idsemana)),
	array('label'=>'Borrar Plan', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idsemana),'confirm'=>'¿Estás seguro de borrar este plan?')),
	array('label'=>'Gestionar Planes', 'url'=>array('admin')),
);
?>

<h1>Visualizar Plan #<?php echo $model->idsemana; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idsemana',
		'identrenamiento',
	),
)); ?>
