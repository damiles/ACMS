<?php
$this->breadcrumbs=array(
	'Trucos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Truco', 'url'=>array('index')),
	array('label'=>'Manage Truco', 'url'=>array('admin')),
);
?>

<h1>Create Truco</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>