<?php
$this->breadcrumbs=array(
	'Sport Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SportCategory', 'url'=>array('index')),
	array('label'=>'Manage SportCategory', 'url'=>array('admin')),
);
?>

<h1>Create SportCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>