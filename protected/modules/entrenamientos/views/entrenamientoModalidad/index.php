<?php
$this->breadcrumbs=array(
	'Modalidades de entrenamiento',
);

$this->menu=array(
	array('label'=>'Crear Modalidad', 'url'=>array('create')),
	array('label'=>'Gestionar Modalidades', 'url'=>array('admin')),
);
?>

<h1>Modalidades</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
