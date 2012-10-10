<?php
//Necesitamos textarea y datapicker (ui jquery)
$cs=Yii::app()->clientScript;
//$cs->registerCoreScript('jquery');
//$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/ui-lightness/jquery-ui-1.7.2.custom.css', '');
//$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui-1.7.2.custom.min.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/tiny_mce/tiny_mce.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/codemirror/codemirror.js', CClientScript::POS_HEAD);
?>
<script type="text/javascript">
$(function() {
        $(".datepicker").datepicker({dateFormat: "yy-mm-dd"});
});

function myCustomFileBrowser(field_name, url, type, win) {
	//Abrir la ventana padre!
	if (type=='image')
		var cmsURL="<?php echo Yii::app()->request->baseUrl?>/admin.php?r=media&type=images&tinyMCE=1";
	if (type=='file')
		var cmsURL="<?php echo Yii::app()->request->baseUrl?>/admin.php?r=media&type=documents&tinyMCE=1";
        // Do custom browser logic
        //win.document.forms[0].elements[field_name].value = 'my browser value';


	 // newer writing style of the TinyMCE developers for tinyMCE.openWindow

     tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'My File Browser',
        width : 900,  // Your dimensions may differ - toy around with them!
        height : 600,
        resizable : "yes",
        inline : "yes",  // This parameter only has an effect if you use the inlinepopups plugin!
        close_previous : "no"
    }, {
        window : win,
        input : field_name
    });
    return false;
}

tinyMCE.init({
        mode : "specific_textareas",
	editor_selector : "mceEditor",
        theme : "advanced",
        plugins : "pagebreak,style,layer,advlink,inlinepopups,insertdatetime,preview,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,xhtmlxtras,wordcount,advimage",

        // Theme options
        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,bullist,numlist,,justifyleft,justifycenter,justifyright,justifyfull,pagebreak,|,styleselect,formatselect,",
        theme_advanced_buttons2 : "cut,copy,paste,pastetext,|,search,replace,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,cleanup",
        theme_advanced_buttons3 : "image,|,sub,sup,charmap,hr,|,fullscreen,|,code",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom",
        //theme_advanced_resizing : true,
	paste_auto_cleanup_on_paste : true,
        paste_remove_styles: true,
        paste_remove_styles_if_webkit: true,
        paste_strip_class_attributes: true,

        // Example content CSS (should be your site CSS)
        content_css : "<?php echo ACMS::getFrontEndThemeUrl();?>/css/admin.css",

        // Drop lists for link/image/media/template dialogs
        external_image_list_url : "admin.php?r=media/imageList",
        width:"100%",
        height:"300px",

	file_browser_callback : "myCustomFileBrowser"
});

</script>

<div id="infoContentWrapper" class="form clearfix">

<?php echo CHtml::beginForm(); ?>
    <?php echo CHtml::activeHiddenField($model,'type'); ?>
    <?php echo CHtml::activeHiddenField($model,'author'); ?>
    <?php echo CHtml::activeHiddenField($model,'hits'); ?>

    <div id="side-infoContent">
        <div class="portlet">
            <div class="top naranja">Publicaci&oacute;n</div>
            <div class="flecha_naranja"></div>
            <div class="content">
                
                <div class="row">
                    <?php echo CHtml::activeLabelEx($model,'template'); ?>
                    <?php echo CHtml::activeDropDownList($model,'template',ACMS::getTemplates_Page()); ?>
                    <?php echo CHtml::error($model,'template'); ?>
                </div>
                
                <div class="row">
		<?php echo CHtml::activeLabelEx($model,'date'); ?>
		<?php echo CHtml::activeTextField($model,'date', array('class'=>'datepicker')); ?>
                
		<?php echo CHtml::error($model,'date'); ?>
                </div>
	
		<div class="row">
		<?php echo CHtml::activeLabelEx($model,'category');
		echo CHtml::activeDropDownList($model,'category',ACMS::listadoCategoriaNews(), array('style'=>'width:100%'));
		echo CHtml::error($model,'category');?>    
		</div>
	
		<div class="row">
		<?php echo CHtml::activeLabelEx($model,'img_portada');
		//echo CHtml::activeDropDownList($model,'img_portada',ACMS::getImagenList(), array('style'=>'width:100%'));
		$this->widget('ImageSelector',array('model'=>$model, 'object'=>'img_portada')); 
		echo CHtml::error($model,'img_portada');?>    
		</div>
                
                <div class="row">
		<?php echo CHtml::activeLabelEx($model,'banner');
		//echo CHtml::activeDropDownList($model,'banner',ACMS::getImagenList(), array('style'=>'width:100%'));
		$this->widget('ImageSelector',array('model'=>$model, 'object'=>'banner')); 
		echo CHtml::error($model,'banner');?>    
		</div>
       
 
	        <div class="row">
                        <?php echo CHtml::activeCheckBox($model,'published'); ?>
                        <?php echo CHtml::activeLabelEx($model,'published', array("style"=>"display:inline;")); ?>
                        <?php echo CHtml::error($model,'published'); ?>
                </div>
                
                <div class="row">
                        <?php echo CHtml::activeCheckBox($model,'home'); ?>
                        <?php echo CHtml::activeLabelEx($model,'home', array("style"=>"display:inline;")); ?>
                        <?php echo CHtml::error($model,'home'); ?>
                </div>
                
                <div class="row">
                    <b>Autor:</b> <?php echo CHtml::encode($model->author0->name ." ".$model->author0->surnames) ?>
                </div>
                <div class="row">
                    <b>Visitas:</b> <?php echo CHtml::encode($model->hits); ?>
                </div>

                <div class="row">
                    <b>Comentarios:</b> <?php echo CHtml::encode($model->commentTotalCount); ?><br/>
                    <b>Aprovados:</b> <?php echo CHtml::encode($model->commentCount); ?><br/>
                    <b>Pendientes:</b> <?php echo CHtml::encode($model->commentPendingCount); ?><br/>
                    <b>Spam:</b> <?php echo CHtml::encode($model->commentSpamCount); ?><br/>
                </div>

                <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button')); ?>
                        <?php echo CHtml::linkButton('Delete',array('submit'=>array('delete','id'=>$model->idArticle),'confirm'=>'¿Estás seguro de eliminar esta noticia?','class'=>'buttonDelete')); ?>
                        <?php echo CHtml::link('Previsualizar','index.php?r=site/page&preview=1&idm=1&idCat='.$model->category.'&id='.$model->idArticle,array('class'=>'button','target'=>'_blank')); ?>
                </div>

                <p class="note">Fields with <span class="required">*</span> are required.</p>

            </div><!-- End content -->
        </div><!-- End portlet -->
        
        
   
        
         <div class="portlet">
            <div class="top naranja">Post Tags</div>
            <div class="flecha_naranja"></div>
            <div class="content">
                <div class="row">
                            <?php //echo CHtml::activeLabelEx($model,'tags'); ?>
                            <?php //echo CHtml::activeTextArea($model,'tags',array('style'=>"width:100%;height:50px;")); ?>
                            <?php //echo CHtml::error($model,'tags'); ?>
                    <div id="tags_div">
                    <?php
                    $tags=$model->tags;
                    foreach($tags as $tag)
                    {
                        echo CHtml::ajaxLink($tag->tag, 
                                array('tag/deleteTagLink','idTag'=>$tag->idTag,'idArticle'=>$model->idArticle), 
                                array('success'=>'function(data){
                                        if(data=="1")
                                            $("#tag_'.$tag->idTag.'").hide();
                                    }'),
                                array('class'=>'tagDelButton','id'=>'tag_'.$tag->idTag));
                    }
                    ?>
                        </div>
                            <?php 
                            $this->widget('CAutoComplete',
                              array(
                                             //name of the html field that will be generated
                                 'name'=>'tags', 
                                             //replace controller/action with real ids
                                 'url'=>array('tag/autoCompleteLookup'), 
                                 'max'=>10, //specifies the max number of items to display

                                             //specifies the number of chars that must be entered 
                                             //before autocomplete initiates a lookup
                                 'minChars'=>2,
                                  'multiple'=>true,
                                 'delay'=>500, //number of milliseconds before lookup occurs
                                 'matchCase'=>false, //match case when performing a lookup?

                                             //any additional html attributes that go inside of 
                                             //the input field can be defined here
                                 'htmlOptions'=>array('style'=>'width:95%','id'=>'tags'), 

                                 //'methodChain'=>".result(function(event,item){\$(\"#user_id\").val(item[1]);})",
                                 ));
                            echo CHtml::ajaxButton("Añadir tags", 
                                    array('tag/addTagsToArticle','idArticle'=>$model->idArticle),
                                    array('update'=>'#tags_div','data'=>array('idArticle'=>$model->idArticle,'tags'=>'js:$("#tags").val()'))
                                    );
                            ?>
                    
                    </div>
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
                    echo CHtml::activeHiddenField($item,"[$i]idArticle");

                    echo CHtml::activeLabelEx($item,"title");
                    echo CHtml::activeTextField($item,"[$i]title",array('class'=>'titular','maxlength'=>255));
                    
                    echo CHtml::activeLabelEx($item,'text',array('class'=>'hidde'));
                    echo CHtml::activeTextArea($item,"[$i]text",array('class'=>'mceEditor'));
                    
                    echo "</div>";
               }
               ?>
               
           </div>
           <br/>
           <br/>
           <div class="portlet">
                <div class="top naranja">Fuentes</div>
                <div class="flecha_naranja"></div>
                <div class="content">
                    <?php echo CHtml::activeLabelEx($model,'fuente'); ?>
                    <?php echo CHtml::activeTextField($model,'fuente',array('style'=>"width:100%")); ?>
                    <?php echo CHtml::error($model,'fuente'); ?>
               
                    <?php echo CHtml::activeLabelEx($model,'bibliografia'); ?>
                    <?php echo CHtml::activeTextArea($model,'bibliografia',array('style'=>"width:100%;height:80px;")); ?>
                    <?php echo CHtml::error($model,'bibliografia'); ?>
                </div>
           </div>

    </div>
    
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<script type="text/javascript">
$(document).ready(function(){
$("#tabs_langs").tabs({selected:<?php echo $sel; ?>});
});
</script>
