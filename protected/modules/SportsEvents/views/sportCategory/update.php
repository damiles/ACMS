<?php
$this->breadcrumbs=array(
	'Sport Categories'=>array('index'),
	$model->idSportCategory=>array('view','id'=>$model->idSportCategory),
	'Update',
);

$this->menu=array(
	array('label'=>'List SportCategory', 'url'=>array('index')),
	array('label'=>'Create SportCategory', 'url'=>array('create')),
	array('label'=>'View SportCategory', 'url'=>array('view', 'id'=>$model->idSportCategory)),
	array('label'=>'Manage SportCategory', 'url'=>array('admin')),
);
?>

<h1>Update SportCategory <?php echo $model->idSportCategory; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>