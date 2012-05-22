<?php
$this->breadcrumbs=array(
	'Trucos',
);

$this->menu=array(
	array('label'=>'Create Truco', 'url'=>array('create')),
	array('label'=>'Manage Truco', 'url'=>array('admin')),
);
?>

<h1>Trucos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
