<?php
$this->breadcrumbs=array(
	'Tipos de Actividad'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Tipos de Actividad', 'url'=>array('index')),
	array('label'=>'Crear Tipo de Actividad', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('entrenamiento-tipoactividad-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Tipos de actividad</h1>

<p>
Ud puede seleccionar un operador de comparación(<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al principio de cada valor de búsqueda para especificar cómo se debería realizar la búsqueda.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'entrenamiento-tipoactividad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idtipo',
		'tipo',
		'png',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
