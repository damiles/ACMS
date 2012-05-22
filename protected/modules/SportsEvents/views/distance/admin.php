<?php
$this->breadcrumbs=array(
	'Distances'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Crear Distancia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('distance-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administración de distancias</h1>

<p>
Puedes introducir operadores comparativos (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
o <b>=</b>) al principio de cada campo de busquedas.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'distance-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'name'=>'title',
                    'value'=>'$data->defaultContent->title',
                    'type'=>'text',
                    ),
                    //'title',
                'swimming',
		'cycling',
		'running',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
