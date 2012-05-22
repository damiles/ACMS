<?php
$this->breadcrumbs=array(
	'Actividades'=>array('index'),
	$model->idactividad=>array('view','id'=>$model->idactividad),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Actividades', 'url'=>array('index')),
	array('label'=>'Crear Actividad', 'url'=>array('create')),
	array('label'=>'Ver Actividad', 'url'=>array('view', 'id'=>$model->idactividad)),
	array('label'=>'Gestionar Actividades', 'url'=>array('admin')),
);
?>

<h1>Update EntrenamientoActividad <?php echo $model->idactividad; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>