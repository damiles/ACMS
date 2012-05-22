<?php
$this->breadcrumbs=array(
	'Sport Categories'=>array('index'),
	$model->idSportCategory,
);

$this->menu=array(
	array('label'=>'List SportCategory', 'url'=>array('index')),
	array('label'=>'Create SportCategory', 'url'=>array('create')),
	array('label'=>'Update SportCategory', 'url'=>array('update', 'id'=>$model->idSportCategory)),
	array('label'=>'Delete SportCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idSportCategory),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SportCategory', 'url'=>array('admin')),
);
?>

<h1>View SportCategory #<?php echo $model->idSportCategory; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idSportCategory',
	),
)); ?>
