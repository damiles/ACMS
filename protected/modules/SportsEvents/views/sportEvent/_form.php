<div id="infoContentWrapper" class="form clearfix">

<?php 

$cs=Yii::app()->clientScript;

$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/admin/jquery.asmselect.css', '');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.asmselect.js', CClientScript::POS_HEAD);

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'sport-event-form',
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
                        <?php echo CHtml::linkButton('Delete',array('submit'=>array('delete','id'=>$model->idSportEvent),'confirm'=>'¿Estás seguro de eliminar esta distancia?','class'=>'buttonDelete')); ?>
                </div>

                <p class="note">Fields with <span class="required">*</span> are required.</p>

            </div><!-- End content -->
        </div><!-- End portlet -->
        
        
    </div>
<!-- FIN LATERAL -->
    
    
	
<!-- INICIO CONTENIDO CENTRAL -->

   <div id="infoContent">
       
       
	<?php echo $form->errorSummary($model); ?>

       
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

                echo CHtml::activeHiddenField($item,"[$i]idSportEvent");                    
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
            <div class="top naranja">Fecha y lugar del evento</div>
            <div class="flecha_naranja"></div>
            <div class="content">
                <div class="row">
                    <?php echo $form->label($model,'date', array('style'=>'float:left; margin-right:10px;padding-top:5px;')); ?>
                    <?php echo $form->textField($model,'date', array('class'=>'datepicker')); ?>
                    <?php echo $form->error($model,'date'); ?>
                </div>
                <div class="row">
                        <?php echo $form->textField($model,'web', array('style'=>'width:100%')); ?>
                        <?php echo $form->error($model,'web'); ?>
                </div>
                <div class="row">
                    <?php
                       echo $form->label($model,'country');
                       echo $form->dropDownList($model,
                               'country',
                               ACMS::getCountries(), 
                               array('style'=>'width:80%',
                                   'ajax'=>array(
                                       'type'=>'POST',
                                       'url'=>  $this->createURL('SportEvent/dynamicProvinces'),
                                       'update'=>'#SportEvent_province'
                                   ),
                                   ));
                       echo $form->error($model,'country');
                    ?>
                </div>
                
                <div class="row">
                    <?php
                       echo $form->label($model,'province');
                       echo $form->dropDownList($model,'province',ACMS::getProvinces($model->country), array('style'=>'width:80%'));
                       echo $form->error($model,'province');
                    ?>
                </div>
                
                <div class="row">
                    
                       <?php echo $form->label($model,'citie'); ?>
                       <?php echo $form->textField($model,'citie', array('style'=>'width:80%')); ?>
                       <?php echo $form->error($model,'citie'); ?>
                    
                </div>
                
            </div>
       </div>
       
       <div class="portlet">
            <div class="top naranja">Información técnica</div>
            <div class="flecha_naranja"></div>
            <div class="content">
       
                
                <div class="row">
                        <?php echo $form->labelEx($model,'puntuable', array('style'=>'float:left; margin-right:10px;padding-top:2px;')); ?>
                        <?php echo $form->checkBox($model,'puntuable'); ?>
                        <?php echo $form->error($model,'puntuable'); ?>
                </div>

                <div class="row">
                    <div class="col33"><div class="colcontent">
                        <fieldset class="CheckBoxList">
                            <legend><?php echo $model->getAttributeLabel('distances'); ?></legend>
  
                                <?php echo $form->checkBoxList($model,'distanciasIds', CHtml::listData(Distance::model()->findAll(),'idDistance','title')); ?>
                            
                            <?php echo $form->error($model,'distances'); ?>
                        </fieldset>
                            </div>
                    </div>
                    <div class="col33"><div class="colcontent">
                        <fieldset class="CheckBoxList">
                            <legend><?php echo $model->getAttributeLabel('SportCategory_idSportCategory'); ?></legend>
                            <?php echo $form->radioButtonList($model,'SportCategory_idSportCategory', CHtml::listData(SportCategory::model()->findAll(),'idSportCategory','title')); ?>
                            <?php echo $form->error($model,'SportCategory_idSportCategory'); ?> 
                            </fieldset>
                        </div>
                    </div>
                    <div class="col33">
                        <fieldset class="CheckBoxList">
                            <legend><?php echo $model->getAttributeLabel('SportBrand_idSportBrand'); ?></legend>
                            <?php 
                            $brands=CHtml::listData(SportBrand::model()->findAll(),'idSportBrand','title');
                            $brands[0]='Sin organizador';
                            echo $form->radioButtonList($model,'SportBrand_idSportBrand', $brands); ?>
                            <?php echo $form->error($model,'SportBrand_idSportBrand'); ?> 
                            </fieldset>
                        
                    </div>
                </div>



                </div>
           </div>
       
       
       
       
           <div class="portlet">
            <div class="top naranja">Resultados de la prueba</div>
            <div class="flecha_naranja"></div>
            <div class="content">
       
       
                <div class="row">
                        <?php echo $form->textField($model,'results', array('style'=>'width:100%')); ?>
                        <?php echo $form->error($model,'results'); ?>
                </div>
            </div>
           </div>
       
       
       

    </div>
    
<script type="text/javascript">
$(document).ready(function(){
    $("#tabs_langs").tabs({selected:<?php echo $sel; ?>});
/*
    $("#SportEvent_distances").asmSelect({
            addItemTarget: 'bottom',
            animate: true,
            highlight: true,
            sortable: false

    }); 
*/
});

$(function() {
        $(".datepicker").datepicker({dateFormat: "yy-mm-dd"});
});
</script>
<?php $this->endWidget(); ?>

</div><!-- form -->