<?php
$this->breadcrumbs=array(
	'Tipos de actividad'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Tipos de actividad', 'url'=>array('index')),
	array('label'=>'Gestionar Tipos de actividad', 'url'=>array('admin')),
);
?>

<h1>Crear Tipo de actividad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>