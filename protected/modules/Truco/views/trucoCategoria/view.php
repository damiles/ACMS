<?php
$this->breadcrumbs=array(
	'Truco Categorias'=>array('index'),
	$model->idTrucoCategoria,
);

$this->menu=array(
	array('label'=>'List TrucoCategoria', 'url'=>array('index')),
	array('label'=>'Create TrucoCategoria', 'url'=>array('create')),
	array('label'=>'Update TrucoCategoria', 'url'=>array('update', 'id'=>$model->idTrucoCategoria)),
	array('label'=>'Delete TrucoCategoria', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idTrucoCategoria),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TrucoCategoria', 'url'=>array('admin')),
);
?>

<h1>View TrucoCategoria #<?php echo $model->idTrucoCategoria; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idTrucoCategoria',
		'imagen',
	),
)); ?>
