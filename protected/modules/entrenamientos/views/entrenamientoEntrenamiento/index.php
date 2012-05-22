<?php
$this->breadcrumbs=array(
	'Planes de Entrenamiento',
);

$this->menu=array(
	array('label'=>'Crear Plan', 'url'=>array('create')),
	array('label'=>'Gestionar Planes de Entrenamientos', 'url'=>array('admin')),
);
?>

<h1>Planes de entrenamiento</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
