<?php
$this->breadcrumbs=array(
	'Actividades'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Actividades', 'url'=>array('index')),
	array('label'=>'Crear Actividad', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('entrenamiento-actividad-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Actividades</h1>



<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'entrenamiento-actividad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idactividad',
		'idtipo',
		'orden',
		'iddia',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
