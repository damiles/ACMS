<?php
$this->breadcrumbs=array(
	'Plan de entrenamiento'=>array('index'),
	$model->identrenamiento=>array('view','id'=>$model->identrenamiento),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Planes', 'url'=>array('index')),
	array('label'=>'Crear Plan', 'url'=>array('create')),
	array('label'=>'Ver Plan', 'url'=>array('view', 'id'=>$model->identrenamiento)),
	array('label'=>'Gestionar Plan', 'url'=>array('admin')),
);
?>

<h1>Actualizar Plan de Entranamiento <?php echo $model->identrenamiento; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>