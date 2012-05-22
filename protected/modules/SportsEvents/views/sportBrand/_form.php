<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sport-brand-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ico_file'); ?>
		<?php echo $form->fileField($model,'ico_file'); ?>
		<?php echo $form->error($model,'ico_file'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Añadir', array('class'=>"button")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->