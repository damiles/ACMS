<?php
$this->breadcrumbs=array(
	'Sport Categories'=>array('index'),
	'Manage',
);



Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('sport-category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Categorias deportivas</h1>


<div class="form">
    <fieldset>
        <legend>Añadir nueva categoría</legend>
        <div class="add-form" >
        <?php	
                $newModel=new SportCategory;
                $this->renderPartial('_formCreate',array('model'=>$newModel)); ?>
        </div>

    </fieldset>
</div>




<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'sport-category-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'idSportCategory',
                array(
                    'name'=>'title',
                    'value'=>'$data->defaultContent->title',
                    'type'=>'text',
                    ),
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{delete}',
		),
	),
)); ?>
