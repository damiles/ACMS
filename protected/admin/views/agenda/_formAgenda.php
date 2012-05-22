<?php
//Necesitamos textarea y datapicker (ui jquery)
$cs=Yii::app()->clientScript;
//$cs->registerCoreScript('jquery');
//$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/ui-lightness/jquery-ui-1.7.2.custom.css', '');
//$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui-1.7.2.custom.min.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/tiny_mce/tiny_mce.js', CClientScript::POS_HEAD);
?>
<script type="text/javascript">

tinyMCE.init({
        mode : "specific_textareas",
	editor_selector : "mceEditor",
        theme : "advanced",
        plugins : "pagebreak,style,layer,advlink,inlinepopups,insertdatetime,preview,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,xhtmlxtras,wordcount,advimage",

        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,bullist,numlist,,justifyleft,justifycenter,justifyright,justifyfull,pagebreak,|,styleselect,formatselect,",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,|,search,replace,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,cleanup",
        theme_advanced_buttons3 : "image,|,sub,sup,charmap,|,fullscreen,|,code",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        //theme_advanced_resizing : true,
	paste_auto_cleanup_on_paste : true,
        paste_remove_styles: true,
        paste_remove_styles_if_webkit: true,
        paste_strip_class_attributes: true,
	
        // Example content CSS (should be your site CSS)
        content_css : "css/admin/generico.css",

        // Drop lists for link/image/media/template dialogs
        external_image_list_url : "admin.php?r=media/imageList",
        width:"100%",
        height:"300px"
});


</script>

<div id="infoContentWrapper" class="form clearfix">

<?php echo CHtml::beginForm(); ?>

    <div id="side-infoContent">
        <div class="portlet">
            <div class="top naranja">Publicaci&oacute;n</div>
            <div class="flecha_naranja"></div>
            <div class="content">

		 <div class="row">
                        <?php echo CHtml::activeLabelEx($model,'published', array("style"=>"display:inline;")); ?>
                        <?php echo CHtml::activeCheckBox($model,'published'); ?>
                        <?php echo CHtml::error($model,'published'); ?>
                </div>

		<div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button')); ?>
                        <?php echo CHtml::linkButton('Delete',array('submit'=>array('deleteAgenda','id'=>$model->idAgenda),'confirm'=>'ÀEst‡s seguro de eliminar esta noticia?','class'=>'buttonDelete')); ?>
                </div>

                <p class="note">Fields with <span class="required">*</span> are required.</p>

            </div><!-- End content -->
        </div><!-- End portlet -->
        
        
   
        

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
                    echo CHtml::activeHiddenField($item,"[$i]idAgenda");

                    echo CHtml::activeLabelEx($item,"title");
                    echo CHtml::activeTextField($item,"[$i]title",array('class'=>'titular','maxlength'=>255));
                    
		    echo "</div>";
               }
               ?>
               
           </div>

     
    </div>
    
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<script type="text/javascript">
$(document).ready(function(){
$("#tabs_langs").tabs({selected:<?php echo $sel; ?>});
        $(".datepicker").datepicker({dateFormat: "yy-mm-dd"});
});
</script>
