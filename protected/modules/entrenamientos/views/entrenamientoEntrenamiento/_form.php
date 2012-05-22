<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entrenamiento-entrenamiento-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php
                                $crit=new CDbCriteria;
                                $crit->order="modalidad";
                                $datos_modalidad=EntrenamientoModalidad::model()->findAll($crit);
                                echo CHtml::dropDownList(
                                        "EntrenamientoEntrenamiento[idmodalidad]",
                                        null,
                                        CHtml::listData($datos_modalidad, "idmodalidad", "modalidad"),
                                        array(
                                            "empty"=>"Selecciona modalidad",
                                            ));

                ?>
                
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nsemanas'); ?>
		<?php echo $form->textField($model,'nsemanas',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'nsemanas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nhorassemana'); ?>
		<?php echo $form->textField($model,'nhorassemana',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'nhorassemana'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->