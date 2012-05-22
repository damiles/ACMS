<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entrenamiento-tipoactividad-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo',array('size'=>60,'maxlength'=>450)); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'png'); ?>
		<?php echo $form->textField($model,'png',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'png'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->