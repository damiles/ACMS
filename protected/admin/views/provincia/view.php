<?php
$this->breadcrumbs=array(
	'Provincias'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Provincia', 'url'=>array('index')),
	array('label'=>'Create Provincia', 'url'=>array('create')),
	array('label'=>'Update Provincia', 'url'=>array('update', 'id'=>$model->idProvincia)),
	array('label'=>'Delete Provincia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idProvincia),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Provincia', 'url'=>array('admin')),
);
?>

<h1>View Provincia #<?php echo $model->idProvincia; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idProvincia',
		'name',
		'cod_pais',
	),
)); ?>
