<?php
$this->breadcrumbs=array(
	'Truco Categorias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TrucoCategoria', 'url'=>array('index')),
	array('label'=>'Manage TrucoCategoria', 'url'=>array('admin')),
);
?>

<h1>Create TrucoCategoria</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>