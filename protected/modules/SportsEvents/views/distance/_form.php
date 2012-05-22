<div id="infoContentWrapper" class="form clearfix">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'distance-form',
	'enableAjaxValidation'=>false,
)); ?>
    
    
    
    <!-- ICNICIO LATERAL -->



    <div id="side-infoContent">
        <div class="portlet">
            <div class="top naranja">Publicaci&oacute;n</div>
            <div class="flecha_naranja"></div>
            <div class="content">
                <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button')); ?>
                        <?php echo CHtml::linkButton('Delete',array('submit'=>array('delete','id'=>$model->idDistance),'confirm'=>'¿Estás seguro de eliminar esta distancia?','class'=>'buttonDelete')); ?>
                </div>

                <p class="note">Fields with <span class="required">*</span> are required.</p>

            </div><!-- End content -->
        </div><!-- End portlet -->
        
        
    </div>
<!-- FIN LATERAL -->
    
    


<!-- INICIO CONTENIDO CENTRAL -->

   <div id="infoContent">
            <?php echo CHtml::errorSummary($model); ?>
       
       
            <!-- INICIO PESTAÑA Y CONTENIDO IDIOMAS -->
           <div id="tabs_langs">
               <!-- Listado de idiomas -->    
               <ul>
                   <?php
                   $sel=1;
                   $langs=Lang::model()->findAllByAttributes(array("selected"=>1));
                   foreach($langs as $i=>$item){
                        echo "<li><a href='#lang_$item->idLang'><span>$item->title</span></a></li>";
                        if($item->default)
                             $sel=$i;
                   }
                   ?>
               </ul>
               
               <!-- Contenidos -->
               <?php
               foreach($model->content as $i=>$item){
                    echo "<div id='lang_$item->lang'>";
                    
                    echo CHtml::activeHiddenField($item,"[$i]idDistance");                    
                    echo CHtml::activeHiddenField($item,"[$i]lang");
                    echo CHtml::activeLabelEx($item,"title");
                    echo CHtml::activeTextField($item,"[$i]title",array('class'=>'titular','maxlength'=>255));
                    
                    echo "</div>";
               }
               ?>
               
           </div>
            <br/>
           <!-- FIN PESTAÑAS Y CONTENIDO IDIOMAS -->
           
           <div class="portlet">
            <div class="top naranja">Información técnica</div>
            <div class="flecha_naranja"></div>
            <div class="content">
                   <div class="row">
                       <?php echo $form->labelEx($model,'duatlon', array('style'=>'float:left; margin-right:10px;')); ?>
                        <?php echo $form->checkBox($model,'duatlon'); ?>
                        <?php echo $form->error($model,'duatlon'); ?>
                   </div>
                   <div class="row">
                        <?php echo $form->labelEx($model,'swimming'); ?>
                        <?php echo $form->textField($model,'swimming'); ?>
                        <?php echo $form->error($model,'swimming'); ?>
                    </div>

                    <div class="row">
                            <?php echo $form->labelEx($model,'cycling'); ?>
                            <?php echo $form->textField($model,'cycling'); ?>
                            <?php echo $form->error($model,'cycling'); ?>
                    </div>

                    <div class="row">
                            <?php echo $form->labelEx($model,'running'); ?>
                            <?php echo $form->textField($model,'running'); ?>
                            <?php echo $form->error($model,'running'); ?>
                    </div>
            </div>
           </div>

    </div>
    
<script type="text/javascript">
$(document).ready(function(){
$("#tabs_langs").tabs({selected:<?php echo $sel; ?>});
});
</script>



<?php $this->endWidget(); ?>

</div><!-- form -->








