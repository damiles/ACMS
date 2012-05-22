<?php
$this->breadcrumbs=array(
	'Entrenamiento Modalidads'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Listar Modalidades', 'url'=>array('index')),
	array('label'=>'Crear Modalidad', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('entrenamiento-modalidad-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Modalidades</h1>

<p>
    Ud puede, opcionalmente establecer criterios de busqueda (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al comienzo de cada peticion.
</p>

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'entrenamiento-modalidad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idmodalidad',
		'modalidad',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
