<?php
$this->breadcrumbs=array(
	'Sport Brands'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('sport-brand-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Organizadores</h1>

<div class="form">
    <fieldset>
        <legend>Añadir nueva Marca</legend>
        <div class="add-form" >
        <?php	
                $this->renderPartial('_form',array('model'=>$newmodel)); ?>
        </div>

    </fieldset>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sport-brand-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                //'ico_file',
                array(
                    'name'=>'ico_file',
                    'value'=>'CHtml::image("upload/organizadores/".$data->ico_file, "imagen")',
                    'type'=>'raw',
                ),
		'title',
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{delete}'
		),
	),
)); ?>
