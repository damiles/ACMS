<?php
$this->breadcrumbs=array(
	'Entrenamiento Semanas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EntrenamientoSemana', 'url'=>array('index')),
	array('label'=>'Manage EntrenamientoSemana', 'url'=>array('admin')),
);
?>

<h1>Create EntrenamientoSemana</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>