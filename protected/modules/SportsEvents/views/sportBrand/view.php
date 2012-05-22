<?php
$this->breadcrumbs=array(
	'Sport Brands'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List SportBrand', 'url'=>array('index')),
	array('label'=>'Create SportBrand', 'url'=>array('create')),
	array('label'=>'Update SportBrand', 'url'=>array('update', 'id'=>$model->idSportBrand)),
	array('label'=>'Delete SportBrand', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idSportBrand),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SportBrand', 'url'=>array('admin')),
);
?>

<h1>View SportBrand #<?php echo $model->idSportBrand; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idSportBrand',
		'title',
		'ico_file',
	),
)); ?>
