<?php
$this->breadcrumbs=array(
	'Modalidades'=>array('index'),
	$model->idmodalidad=>array('view','id'=>$model->idmodalidad),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listar Modalidades', 'url'=>array('index')),
	array('label'=>'Crear Modalidad', 'url'=>array('create')),
	array('label'=>'Ver Modalidades', 'url'=>array('view', 'id'=>$model->idmodalidad)),
	array('label'=>'GestionarModalidades', 'url'=>array('admin')),
);
?>

<h1>Actualizar Modalidad <?php echo $model->idmodalidad; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>