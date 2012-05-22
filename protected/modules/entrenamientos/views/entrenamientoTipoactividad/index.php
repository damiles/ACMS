<?php
$this->breadcrumbs=array(
	'Tipos de actividad',
);

$this->menu=array(
	array('label'=>'Crear Tipo de Actividad', 'url'=>array('create')),
	array('label'=>'Gestionar Tipos de Actividad', 'url'=>array('admin')),
);
?>

<h1>Tipos de actividad</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
