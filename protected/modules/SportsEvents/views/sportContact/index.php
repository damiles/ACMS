<?php
$this->breadcrumbs=array(
	'Sport Contacts',
);

$this->menu=array(
	array('label'=>'Create SportContact', 'url'=>array('create')),
	array('label'=>'Manage SportContact', 'url'=>array('admin')),
);
?>

<h1>Sport Contacts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
