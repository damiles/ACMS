<?php
$this->breadcrumbs=array(
	'Sport Contacts'=>array('index'),
	$model->idSportContact=>array('view','id'=>$model->idSportContact),
	'Update',
);

$this->menu=array(
	array('label'=>'List SportContact', 'url'=>array('index')),
	array('label'=>'Create SportContact', 'url'=>array('create')),
	array('label'=>'View SportContact', 'url'=>array('view', 'id'=>$model->idSportContact)),
	array('label'=>'Manage SportContact', 'url'=>array('admin')),
);
?>

<h1>Update SportContact <?php echo $model->idSportContact; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>