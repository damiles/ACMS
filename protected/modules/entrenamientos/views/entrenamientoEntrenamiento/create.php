<?php
$this->breadcrumbs=array(
	'Plan de Entrenamiento'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Planes', 'url'=>array('index')),
	array('label'=>'Gestionar Planes', 'url'=>array('admin')),
);
?>

<h1>Create EntrenamientoEntrenamiento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>