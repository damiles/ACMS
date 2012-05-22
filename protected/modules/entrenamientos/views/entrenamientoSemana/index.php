<?php
$this->breadcrumbs=array(
	'Entrenamiento Semanas',
);

$this->menu=array(
	array('label'=>'Create EntrenamientoSemana', 'url'=>array('create')),
	array('label'=>'Manage EntrenamientoSemana', 'url'=>array('admin')),
);
?>

<h1>Entrenamiento Semanas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
