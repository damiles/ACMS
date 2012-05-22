<?php
$this->breadcrumbs=array(
	'Tipos de Actividad'=>array('index'),
	$model->idtipo=>array('view','id'=>$model->idtipo),
	'Update',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Actividad', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Actividad', 'url'=>array('create')),
	array('label'=>'Visualizar Tipo de Actividad', 'url'=>array('view', 'id'=>$model->idtipo)),
	array('label'=>'Gestionar Tipos de Actividad', 'url'=>array('admin')),
);
?>

<h1>Update EntrenamientoTipoactividad <?php echo $model->idtipo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>