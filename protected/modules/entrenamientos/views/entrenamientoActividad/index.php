<?php
$this->breadcrumbs=array(
	'Actividades',
);

$this->menu=array(
	array('label'=>'Crear Actividad', 'url'=>array('create')),
	array('label'=>'Gestionar Actividad', 'url'=>array('admin')),
);
?>

<h1>Entrenamiento Actividads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
