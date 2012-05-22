<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entrenamiento-semana-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos <span class="required">*</span> son necesarios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'identrenamiento'); ?>
		<?php echo $form->textField($model,'identrenamiento',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'identrenamiento'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->