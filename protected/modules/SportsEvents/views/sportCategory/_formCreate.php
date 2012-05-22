<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sport-category-form',
	'enableAjaxValidation'=>false,
)); ?>

	
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
                   $langs=Lang::model()->findAllByAttributes(array("selected"=>1));
               foreach($langs as $i=>$item){
                    echo "<div id='lang_$item->idLang'>";
                    
                    
                    
                    echo CHtml::hiddenField("SportCategoryContent[$i][lang]", $item->idLang);
                    
                    //echo CHtml::labelEx($item,"title");
                    echo CHtml::textField('SportCategoryContent['.$i.'][title]',"",array('class'=>'titular','maxlength'=>255));
                    
                    echo "</div>";
               }
               ?>
               
           </div>
            <br/>
           <!-- FIN PESTAÑAS Y CONTENIDO IDIOMAS -->
 


	<div class="row buttons">
		<?php echo CHtml::submitButton('Añadir', array('class'=>'button')); ?>
	</div>

<?php $this->endWidget(); ?>
    
<script type="text/javascript">
$(document).ready(function(){
$("#tabs_langs").tabs({selected:<?php echo $sel; ?>});
});
</script>


</div><!-- form -->
