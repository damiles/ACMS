<?php
$this->breadcrumbs=array(
	'Entrenamiento Semanas'=>array('index'),
	$model->idsemana=>array('view','id'=>$model->idsemana),
	'Update',
);

$this->menu=array(
	array('label'=>'List EntrenamientoSemana', 'url'=>array('index')),
	array('label'=>'Create EntrenamientoSemana', 'url'=>array('create')),
	array('label'=>'View EntrenamientoSemana', 'url'=>array('view', 'id'=>$model->idsemana)),
	array('label'=>'Manage EntrenamientoSemana', 'url'=>array('admin')),
);
?>

<h1>Update EntrenamientoSemana <?php echo $model->idsemana; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>