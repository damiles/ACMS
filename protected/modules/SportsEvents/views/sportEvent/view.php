<?php
$this->breadcrumbs=array(
	'Sport Events'=>array('index'),
	$model->idSportEvent,
);

$this->menu=array(
	array('label'=>'List SportEvent', 'url'=>array('index')),
	array('label'=>'Create SportEvent', 'url'=>array('create')),
	array('label'=>'Update SportEvent', 'url'=>array('update', 'id'=>$model->idSportEvent)),
	array('label'=>'Delete SportEvent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idSportEvent),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SportEvent', 'url'=>array('admin')),
);
?>

<h1>View SportEvent #<?php echo $model->idSportEvent; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idSportEvent',
		'SportContact_idSportContact',
		'date',
		'puntuable',
		'SportCategory_idSportCategory',
		'SportBrand_idSportBrand',
		'Distance_idDistance',
	),
)); ?>
