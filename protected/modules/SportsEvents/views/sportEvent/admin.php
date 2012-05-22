<?php
$this->breadcrumbs=array(
	'Sport Events'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List SportEvent', 'url'=>array('index')),
	array('label'=>'Crear evento deportivo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('sport-event-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Sport Events</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sport-event-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                    'name'=>'title',
                    'value'=>'$data->defaultContent->title',
                    'type'=>'text',
                    ),
		'date',
		'puntuable',
		/*
                'SportCategory_idSportCategory',
		'SportBrand_idSportBrand',
		'Distance_idDistance',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
