<div id="infoContentWrapper" class="form clearfix">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'truco-categoria-form',
	'enableAjaxValidation'=>false,
)); ?>
    <div id="side-infoContent">
        <div class="portlet">
            <div class="top naranja">Publicaci&oacute;n</div>
            <div class="flecha_naranja"></div>
            <div class="content">

                <p class="note">Fields with <span class="required">*</span> are required.</p>


                <div class="row">
                        <?php echo $form->labelEx($model,'imagen'); ?>
                        <?php echo CHtml::activeDropDownList($model,'imagen',ACMS::getImagenList(false,'trucos'), array('style'=>'width:100%')); ?>
                        <?php echo $form->error($model,'imagen'); ?>
                </div>

                <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class'=>'button')); ?>
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
                    echo CHtml::activeHiddenField($item,"[$i]idTrucoCategoria");

                    echo CHtml::activeLabelEx($item,"title");
                    echo CHtml::activeTextField($item,"[$i]title",array('class'=>'titular','maxlength'=>255));
                    
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