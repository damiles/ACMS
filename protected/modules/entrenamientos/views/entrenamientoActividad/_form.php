<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'entrenamiento-actividad-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
        <div class="row">
             <label for="modalidad" class="required">Modalidad <span class="required">*</span></label>
             <?php
                    $crit=new CDbCriteria;
                    $crit->order="modalidad";
                    $datos_modalidad=EntrenamientoModalidad::model()->findAll($crit);
                    echo CHtml::dropDownList(
                            "modalidad",
                            '',
                            CHtml::listData($datos_modalidad, "idmodalidad", "modalidad"),
                            array(
                                "empty"=>"Selecciona modalidad",
                                "style"=>"width:153px;",
                                "onchange"=>"jQuery('#Entrenamientos_plan_box span').html('Cargando Planes de Entrenamiento');jQuery('#Entrenamientos_plan_box .jqTransformSelectOpen').addClass('select_ajax_loader');jQuery.ajax({'type':'POST','url':'".CHtml::normalizeUrl('index.php?r=/entrenamientos/EntrenamientoEntrenamiento/dynamicPlanWithModalidad')."','cache':false,'data':jQuery(this).parents('form').serialize(),'success':function(html){jQuery('#Entrenamientos_plan_box').html(html); jQuery('#Entrenamientos_plan_box').removeClass('jqtransformdone'); jQuery('#Entrenamientos_plan_box').jqTransform();}});",
                                ));

                    ?>
        </div>
        <div class="row">
            <label for="planEntrenamiento" class="required">Plan de Entrenamiento <span class="required">*</span></label>
           <div  id="Entrenamientos_plan_box">
                 <?php
                             echo CHtml::dropDownList(
                                     "planEntrenamiento",
                                     '',
                                     array(),
                                     array(
                                         "id"=>"planEntrenamiento",
                                         "style"=>"width:167px",
                                         "empty"=>"Selecciona Plan de Entrenamiento",
                                         "onchange"=>"jQuery('#Entrenamientos_semana_box span').html('Cargando Semanas del Plan');jQuery('#Entrenamientos_semana_box .jqTransformSelectOpen').addClass('select_ajax_loader');jQuery.ajax({'type':'POST','url':'".CHtml::normalizeUrl('index.php?r=/entrenamientos/EntrenamientoEntrenamiento/dynamicSemanasWithEntrene')."','cache':false,'data':jQuery(this).parents('form').serialize(),'success':function(html){jQuery('#Entrenamientos_semana_box').html(html); jQuery('#Entrenamientos_semana_box').removeClass('jqtransformdone'); jQuery('#Entrenamientos_semana_box').jqTransform();}});",
                                         ));
                 ?>
            </div>
        </div>

        <div class="row">
            <label for="semanasEntrenamiento" class="required">Semana del Entrenamiento <span class="required">*</span></label>
           <div  id="Entrenamientos_semana_box">
                 <?php
                             echo CHtml::dropDownList(
                                     "semanasEntrenamiento",
                                     '',
                                     array(),
                                     array(
                                         'id'=>'semana_Entrenamiento',
                                         'style'=>'width:167px',"empty"=>"Selecciona Semana de Entrenamiento",
                                         ));
                 ?>
            </div>
        </div>

        <div class="row">
            <label for="diasSemana" class="required">Día del entrenamiento <span class="required">*</span></label>
           <div  id="Entrenamientos_dia_box">
                 <?php
                             echo CHtml::dropDownList(
                                     "EntrenamientoActividad[iddia]",
                                     '',
                                     array(),
                                     array(
                                         'id'=>'semana_Entrenamiento',
                                         'style'=>'width:167px',"empty"=>"Selecciona Semana de Entrenamiento",
                                         ));
                 ?>
            </div>
        </div>
       <div class="row">
             <label for="modalidad" class="required">Tipo de Actividad <span class="required">*</span></label>
             <?php
                    $crit=new CDbCriteria;
                    $crit->order="tipo";
                    $tipos=EntrenamientoTipoactividad::model()->findAll($crit);
                    echo CHtml::dropDownList(
                            "EntrenamientoActividad[idtipo]",
                            null,
                            CHtml::listData($tipos, "idtipo", "tipo"),
                            array(
                                "empty"=>"Selecciona tipo de Actividad",
                                "style"=>"width:153px;",
                                ));

                    ?>
        </div>
        
        <div class="row">
            <?php echo CHtml::activeLabelEx($model,'resumen'); ?>
         <?php echo $form->textField($model,'resumen',array('size'=>30,'maxlength'=>255)); ?>
        </div>
        
        <table>
            <tr><th>Titular</th><th>Descripcion</th></tr>
            <tr><td valign="top"><?php echo $form->textField($model,'titular1',array('size'=>30,'maxlength'=>255)); ?></td><td><?php echo $form->textField($model,'descripcion1',array('size'=>90,'maxlength'=>450)); ?></td></tr>
            <tr><td valign="top"><?php echo $form->textField($model,'titular2',array('size'=>30,'maxlength'=>255)); ?></td><td><?php echo $form->textField($model,'descripcion2',array('size'=>90,'maxlength'=>450)); ?></td></tr>
            <tr><td valign="top"><?php echo $form->textField($model,'titular3',array('size'=>30,'maxlength'=>255)); ?></td><td><?php echo $form->textField($model,'descripcion3',array('size'=>90,'maxlength'=>450)); ?></td></tr>
            <tr><td valign="top"><?php echo $form->textField($model,'titular4',array('size'=>30,'maxlength'=>255)); ?></td><td><?php echo $form->textField($model,'descripcion4',array('size'=>90,'maxlength'=>450)); ?></td></tr>
            <tr><td valign="top"><?php echo $form->textField($model,'titular5',array('size'=>30,'maxlength'=>255)); ?></td><td><?php echo $form->textField($model,'descripcion5',array('size'=>90,'maxlength'=>450)); ?></td></tr>
        </table>
	
<!--	<div class="row">
		<?php echo $form->labelEx($model,'orden'); ?>
		<?php echo $form->textField($model,'orden',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'orden'); ?>
	</div>-->

	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->