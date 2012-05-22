<?php
$this->breadcrumbs=array(
	'Sport Brands',
);

$this->menu=array(
	array('label'=>'Create SportBrand', 'url'=>array('create')),
	array('label'=>'Manage SportBrand', 'url'=>array('admin')),
);
?>

<h1>Sport Brands</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
