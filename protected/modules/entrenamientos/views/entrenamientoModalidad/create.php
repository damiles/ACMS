<?php
$this->breadcrumbs=array(
	'Modalidades'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listar Modalidades', 'url'=>array('index')),
	array('label'=>'Gestionar Modalidades', 'url'=>array('admin')),
);
?>

<h1>Crear Modalidad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>