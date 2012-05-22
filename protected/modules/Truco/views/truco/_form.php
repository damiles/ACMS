<div id="infoContentWrapper" class="form clearfix">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'truco-form',
	'enableAjaxValidation'=>false,
)); ?>

 <div id="side-infoContent">
        <div class="portlet">
            <div class="top naranja">Publicaci&oacute;n</div>
            <div class="flecha_naranja"></div>
            <div class="content">
                <p class="note">Fields with <span class="required">*</span> are required.</p>

                    
                    <div class="row">
                            <?php echo $form->labelEx($model,'published'); ?>
                            <?php echo $form->checkBox($model,'published'); ?>
                            <?php echo $form->error($model,'published'); ?>
                    </div>

                    <div class="row">
                            <?php echo $form->labelEx($model,'idTrucoCategoria'); ?>
                            <?php 
                            $cats=TrucoCategoria::model()->findAll();
                            $result=Array();
                            $result['0']="Sin categoría";
                            foreach($cats as $cat){
                                    $result[$cat->idTrucoCategoria]=ACMS::getTitle($cat,ACMS::getDefaultLang()->idLang);
                            }	
                            
                            echo $form->dropDownList($model,'idTrucoCategoria', $result); ?>
                            <?php echo $form->error($model,'idTrucoCategoria'); ?>
                    </div>

                    <div class="row buttons">
                            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
                    </div>
            </div>
        </div>
     </div>
      <div id="infoContent">
		   <?php echo CHtml::errorSummary($model); ?>
           <div id="tabs_langs">
                   
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
               <?php
               foreach($model->content as $i=>$item){
                    echo "<div id='lang_$item->lang'>";

                    echo CHtml::activeHiddenField($item,"[$i]lang");
                    echo CHtml::activeHiddenField($item,"[$i]idTruco");

                    echo CHtml::activeLabelEx($item,"text");
                    echo CHtml::activeTextArea($item,"[$i]text",array('class'=>'', 'style'=>'width:98%; height:200px;'));
                    
		    echo "</div>";
               }
               ?>
               
           </div>

     
    </div>
     
<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
$(document).ready(function(){
$("#tabs_langs").tabs({selected:<?php echo $sel; ?>});
        $(".datepicker").datepicker({dateFormat: "yy-mm-dd"});
});
</script>