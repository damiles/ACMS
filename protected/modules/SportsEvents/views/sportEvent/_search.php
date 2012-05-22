<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idSportEvent'); ?>
		<?php echo $form->textField($model,'idSportEvent'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SportContact_idSportContact'); ?>
		<?php echo $form->textField($model,'SportContact_idSportContact'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'puntuable'); ?>
		<?php echo $form->textField($model,'puntuable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SportCategory_idSportCategory'); ?>
		<?php echo $form->textField($model,'SportCategory_idSportCategory'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SportBrand_idSportBrand'); ?>
		<?php echo $form->textField($model,'SportBrand_idSportBrand'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
