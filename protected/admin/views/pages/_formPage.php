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
        height:"300px"
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
                <?php echo CHtml::activeHiddenField($model, 'template',array('value'=>'page')); ?>
                <div class="row">
		<?php echo CHtml::activeLabelEx($model,'date'); ?>
		<?php echo CHtml::activeTextField($model,'date', array('class'=>'datepicker')); ?>
                
		<?php echo CHtml::error($model,'date'); ?>
                </div>

		<div class="row">
                        <?php echo CHtml::activeLabelEx($model,'show_title'); ?>
                        <?php echo CHtml::activeCheckBox($model,'show_title'); ?>
                        <?php echo CHtml::error($model,'show_title'); ?>
                </div>


                <div class="row">
                        <?php echo CHtml::activeLabelEx($model,'published'); ?>
                        <?php echo CHtml::activeCheckBox($model,'published'); ?>
                        <?php echo CHtml::error($model,'published'); ?>
                </div>
                <div class="row">
                    Autor: <?php echo CHtml::encode($model->author0->name ." ".$model->author0->surnames) ?>
                </div>
                <div class="row">
                    Visitas: <?php echo CHtml::encode($model->hits); ?>
                </div>

                <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button')); ?>
                        <?php echo CHtml::linkButton('Delete',array('submit'=>array('deletePage','id'=>$model->idArticle),'confirm'=>'¿Estás seguro de eliminar esta noticia?','class'=>'buttonDelete')); ?>
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
                    echo CHtml::activeHiddenField($item,"[$i]idArticle");

                    echo CHtml::activeLabelEx($item,"title");
                    echo CHtml::activeTextField($item,"[$i]title",array('class'=>'titular','maxlength'=>255));
                    
                    echo CHtml::activeLabelEx($item,'text',array('class'=>'hidde'));
                    echo CHtml::activeTextArea($item,"[$i]text",array('class'=>'mceEditor'));
                    
		    echo "<a href='#ArticleContent_".$i."_text' id='' class='htmleditor'>Editor HTML</a>";

                    echo "</div>";
               }
               ?>
               
           </div>
		<!-- Plugins -->
		<br/>
	   	<div class="portlet ">
		    	<div class="top naranja"> Componentes asociados</div>
		 	<div class="flecha_naranja"></div>
		 	<div class="content clearfix" >
			<table class="listado" width="100%">
			<thead>
				<tr>
					<th class="first">Componente</th>
					<th>Parametros</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php
				global $plugins;
				foreach($model->components as $component){
					echo "<tr><td class='first title'>".$plugins[$component->plugin]['pluginName']."</td><td>".$component->params."</td><td>Borrar</td></tr>";
				}
			?>
			</tbody>
			</table>
			<br/>
			<fieldset>	
			<legend>Añadir componente:</legend>
			<label for="plugin" style="display:inline">Componente:</label>
			<select id="plugin">
				<?php
				foreach($plugins as $plugin=>$pluginData){
					echo "<option value='".$plugin."'>".$pluginData['pluginName']."</option>";
				}
				?>	
			</select>
			<br/>
			<label for="params" style="display:inline">Parámetros:</label>
			<input id="params" value=""/>
			<div class="row buttons">
				<a class="button"><span><span class="icon_add">Añadir</span></span></a> 
			</div>
			</fieldset>
			</div>
		</div>		
		<!-- End Plugins -->
     
    </div>
    
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<script type="text/javascript">
$(document).ready(function(){

$("#tabs_langs").tabs({selected:<?php echo $sel; ?>});

$('.htmleditor').click(function(){
	ident=$(this).attr("href");
	ident=ident.substr(1);
//	tinyMCE.get(ident).hide();

  var editor = CodeMirror.fromTextArea(ident, {
    height: "350px",
    parserfile: ["parsexml.js", "parsecss.js", "tokenizejavascript.js", "parsejavascript.js", "parsehtmlmixed.js"],
    stylesheet: ["css/codemirror/xmlcolors.css", "css/codemirror/jscolors.css", "css/codemirror/csscolors.css"],
    path: "js/codemirror/",
    lineNumbers: true
  });

});



});
</script>
