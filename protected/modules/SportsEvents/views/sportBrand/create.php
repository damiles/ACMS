<?php
$this->breadcrumbs=array(
	'Sport Brands'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SportBrand', 'url'=>array('index')),
	array('label'=>'Manage SportBrand', 'url'=>array('admin')),
);
?>

<h1>Create SportBrand</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>