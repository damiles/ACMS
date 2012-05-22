<?php
$this->breadcrumbs=array(
	'Sport Categories',
);

$this->menu=array(
	array('label'=>'Create SportCategory', 'url'=>array('create')),
	array('label'=>'Manage SportCategory', 'url'=>array('admin')),
);
?>

<h1>Sport Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
