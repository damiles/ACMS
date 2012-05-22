<?php
$this->breadcrumbs=array(
	'Trucos'=>array('index'),
	$model->idTruco=>array('view','id'=>$model->idTruco),
	'Update',
);

$this->menu=array(
	array('label'=>'List Truco', 'url'=>array('index')),
	array('label'=>'Create Truco', 'url'=>array('create')),
	array('label'=>'View Truco', 'url'=>array('view', 'id'=>$model->idTruco)),
	array('label'=>'Manage Truco', 'url'=>array('admin')),
);
?>

<h1>Update Truco <?php echo $model->idTruco; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>