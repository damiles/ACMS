<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idDistance'); ?>
		<?php echo $form->textField($model,'idDistance'); ?>
	</div>
    
        <div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'swimming'); ?>
		<?php echo $form->textField($model,'swimming'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cycling'); ?>
		<?php echo $form->textField($model,'cycling'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'running'); ?>
		<?php echo $form->textField($model,'running'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->