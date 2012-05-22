<?php
$this->breadcrumbs=array(
	'Sport Brands'=>array('index'),
	$model->title=>array('view','id'=>$model->idSportBrand),
	'Update',
);

$this->menu=array(
	array('label'=>'List SportBrand', 'url'=>array('index')),
	array('label'=>'Create SportBrand', 'url'=>array('create')),
	array('label'=>'View SportBrand', 'url'=>array('view', 'id'=>$model->idSportBrand)),
	array('label'=>'Manage SportBrand', 'url'=>array('admin')),
);
?>

<h1>Update SportBrand <?php echo $model->idSportBrand; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>