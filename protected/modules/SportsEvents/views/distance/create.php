<?php
$this->breadcrumbs=array(
	'Distances'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Distance', 'url'=>array('index')),
	array('label'=>'Administrar Distancias', 'url'=>array('admin')),
);
?>

<h1>Create Distance</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>