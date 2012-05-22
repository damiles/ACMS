<?php
$this->breadcrumbs=array(
	'Sport Contacts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SportContact', 'url'=>array('index')),
	array('label'=>'Manage SportContact', 'url'=>array('admin')),
);
?>

<h1>Create SportContact</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>