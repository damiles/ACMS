<?php
$this->breadcrumbs=array(
	'Sport Contacts'=>array('index'),
	$model->idSportContact,
);

$this->menu=array(
	array('label'=>'List SportContact', 'url'=>array('index')),
	array('label'=>'Create SportContact', 'url'=>array('create')),
	array('label'=>'Update SportContact', 'url'=>array('update', 'id'=>$model->idSportContact)),
	array('label'=>'Delete SportContact', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idSportContact),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SportContact', 'url'=>array('admin')),
);
?>

<h1>View SportContact #<?php echo $model->idSportContact; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idSportContact',
		'address',
		'postal_code',
		'city',
		'province',
		'country',
		'web',
		'phone',
		'organization',
		'mainland',
	),
)); ?>
