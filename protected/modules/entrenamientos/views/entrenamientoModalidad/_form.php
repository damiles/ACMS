<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entrenamiento-modalidad-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'modalidad'); ?>
		<?php echo $form->textField($model,'modalidad',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'modalidad'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->