<?php
$this->breadcrumbs=array(
	'Sport Events'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SportEvent', 'url'=>array('index')),
	array('label'=>'Manage SportEvent', 'url'=>array('admin')),
);
?>

<h1>Create SportEvent</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>