<?php
$this->breadcrumbs=array(
	'Truco Categorias'=>array('index'),
	$model->idTrucoCategoria=>array('view','id'=>$model->idTrucoCategoria),
	'Update',
);

$this->menu=array(
	array('label'=>'List TrucoCategoria', 'url'=>array('index')),
	array('label'=>'Create TrucoCategoria', 'url'=>array('create')),
	array('label'=>'View TrucoCategoria', 'url'=>array('view', 'id'=>$model->idTrucoCategoria)),
	array('label'=>'Manage TrucoCategoria', 'url'=>array('admin')),
);
?>

<h1>Update TrucoCategoria <?php echo $model->idTrucoCategoria; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>