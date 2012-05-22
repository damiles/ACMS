<?php
$this->breadcrumbs=array(
	'Plan de Ent.'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>'Listar Planes', 'url'=>array('index')),
	array('label'=>'Crear Plan', 'url'=>array('create')),
        array('label'=>'Modalidades', 'url'=>'admin.php?r=entrenamientos/EntrenamientoModalidad/admin'),
        array('label'=>'Tipos de Actividad', 'url'=>'admin.php?r=entrenamientos/EntrenamientoTipoactividad/admin'),
        array('label'=>'Actividades', 'url'=>'admin.php?r=entrenamientos/EntrenamientoActividad/admin')
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('entrenamiento-entrenamiento-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestionar Planes de Entrenamiento</h1>

<p>
    Ud puede, opcionalmente establecer criterios de busqueda (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) al comienzo de cada peticion.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'entrenamiento-entrenamiento-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'identrenamiento',
		//'idmodalidad',
                array(
                    'name'=>'idmodalidad',
                    'value'=>'$data->idmodalidad0->modalidad',
                    'type'=>'text',
                    ),
		'nsemanas',
		'nhorassemana',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
