<?php
if(isset($_GET["tinyMCE"])){
	$cs=Yii::app()->clientScript;
	$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/tiny_mce/tiny_mce_popup.js', CClientScript::POS_HEAD);
}
?>
<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$popupG='';
if(isset($_GET['popup'])){
	$popupG='&popup='.$_GET['popup'];
}
    echo "<div id='cont_g_$item->idCategory'>";

	echo "<div class='row'><div class='col50' style='margin-right:1%;'>";
	
	echo "<div class='form'><fieldset><legend>Datos de la categoría</legend>";
        echo "Colecci&oacute;n: <br><br><span class='modify' id='tit_cat_$item->idCategory'>$item->name</span>";
	echo "<p class='info'>Pulsa sobre el nombre de la categoría para cambiarla.</p>";
		//echo "<div><a href='#TB_inline?inlineId=form_$item->idCategory&height=125&width=350' class='icon_add' rel='sexylightbox' >A&ntilde;adir imagen</a></div>";
	echo "<div class='row'>";
	echo "<a  onclick='return confirmDelete();'  href='admin.php?r=media/deleteCategory&idCat=$item->idCategory&type=$item->type".$popupG."' class='buttonDelete' style='color:#fff'>Borrar categoría</a>";
	//echo CHtml::linkButton('Borrar categoría',array('submit'=>array('deleteCategory','idCat'=>$item->idCategory),'confirm'=>'¿Estás seguro de eliminar esta categiría y todas las imagenes contennidas en ella?','class'=>'buttonDelete'));
	echo "</div></fieldset></div>";


	echo "</div><div class='col50'>";

        echo "<div id='uploadForm_$item->idCategory' class='form'>";
        echo CHtml::beginForm($this->createUrl('media/uploadFile', array("type"=>$item->type)),'post',array('enctype'=>'multipart/form-data', 'target'=>'uploadResult', 'onsubmit'=>'$("#button_g_'.$item->idCategory.'").hide();$("#loader_g_'.$item->idCategory.'").show()'));
        $myNewFile= new File;
        echo "<fieldset><legend>Subir archivo</legend>";
	echo CHtml::activeHiddenField($myNewFile, 'MyCategory', array('value'=>$item->idCategory) );
        echo CHtml::activeHiddenField($myNewFile, 'MyType', array('value'=>'2') );
        
        echo CHtml::activeLabelEx($myNewFile, 'url');
        echo CHtml::activeFileField($myNewFile, 'url');
        
        echo CHtml::activeLabelEx($myNewFile, 'description');
        echo CHtml::activeTextField($myNewFile, 'description');
        
        
     	//echo "<input type='submit' id='form_g_$item->idCategory' />";
        echo "<div class='row' id='button_g_$item->idCategory'>";
	echo CHtml::submitButton('Subir Archivo', array('id'=>'form_g_'.$item->idCategory));
        echo "</div>";

	echo "<div class='loader' id='loader_g_$item->idCategory'>Subiendo archivo. Porfavor espere.</div>";

     	echo "</fieldset>";
        echo CHtml::endForm();
        echo "</div>";


 	echo "</div></div>";

	echo "<iframe id='uploadResult' name='uploadResult' style='display:none'></iframe>";		
	if(sizeof($item->files)>0){

            $firstImg=$item->files[0];
         ?>
			
	    
        <div class="row">
        	<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'listadoImagenesGrid',
			'dataProvider'=>$model->search(10),
			'filter'=>$model,
			'columns'=>array(
				array(
				    'name'=>'name',
				    'value'=>array($model, 'gridLinkDocName'),
      				    'type'=>'raw',
				    ),
				'description',
				'date',
				array(            // display a column with "view", "update" and "delete" buttons
		            'class'=>'CButtonColumn',
		            'template'=>'{delete}',
		        ),
			),
		)); ?>
        	
        	
        	
	       		
			<script type="text/javascript">
				/*<![CDATA[*/
				

				<?php if(isset($_GET['popup'])): ?>
					jQuery('.descarga_g<?php echo $item->idCategory?>').live('click',
						function(){
							var filename=jQuery(this).attr('href');
							jQuery( '#<?php echo $_GET['popup'] ?>', window.opener.document ).val(filename);
							self.close();
							return false;
						}
					);
				<?php endif; ?>

				jQuery(document).ready(function() {


				jQuery('#borrar_g<?php echo $item->idCategory?>').click(
						function(){
							jQuery.ajax({
								'beforeSend':function(){},
								'complete':function(){},
								'success':function(html){initGaleryAjax(<?php echo $item->idCategory?>)},
								'type':'POST',
								'url':'<?php echo $this->createUrl('media/deleteFile') ?>',
								'cache':false,
								'data':({id: $('#borrar_g<?php echo $item->idCategory ?>').attr("href")})
								});
							return false;
						});
				});
				/*]]>*/
				</script>
	
	        <?php }
	
	        ?>
						
        </div>
            <?php
        

        echo "</div>";

?>

<!-- Edicion de campos -->
<script type="text/javascript">
function confirmDelete(){
    return confirm("Estas seguro de borrar la categoria, si esta categoría contiene documentos también serán eliminados.");
}

function updateActualTab(){
	//$("#tabs").tabs("load",$("#tabs").tabs("option","selected"));
	initGaleryAjax(<?php echo $item->idCategory?>);
}

function inputs_init(){
        var elements=$('.modify');
        elements.each( function (index){
                //var w=$(this).width()+70;
                var w="100%";
                var initText=$(this).html();
                var id=$(this).attr('id');
                var input="<input value=\""+initText+"\" id='input_"+id+"' style=\"display:none;width:"+w+";font-size:26px;font-family:Arial; color:#555050;margin:0\" />";
                var spn="<span id='span_"+id+"' class='editable' style=''>"+initText+"</span>";
                
                $(this).html('');
                $(this).append(input);
                $(this).append(spn);
                //Create events
                inputs_createEvents("#input_"+id, "#span_"+id);
        });

}
function inputs_createEvents(input, spn){
        $(spn).click(function(event){
                //var w=$(this).width()+70;
                var w="100%";
                $(input).width(w);
                $(this).hide();
                $(input).show();
                $(input).focus();
        });
        $(input).blur(function(event){
                //Here must update via ajax and update tab name
                var theId=$(this).attr('id').split("input_tit_cat_")[1];
                $.ajax({
                   method: "get",
                   url: "<?php echo Yii::app()->getBaseUrl()."/admin.php" ?>",
                   data: {r:'media/updateCategory',id:theId,val:$(input).val()},
                   beforeSend:function(){

                   },
                   complete:function(){

                   },
                   success: function(html){
                       $("#input_tit_cat_"+theId).hide();
                       $(spn).html(html);
                       $("#tabitem_"+theId).html(html);
                       $(spn).show();
		       $(".ui-tabs-selected a span").html(html);
                   }
                });
                
        });
}

function deleteLinksInit(){
				var elements = $('.delete');
				elements.each( function (index){
						var theid=$(this).attr('id');
						var theurl=$(this).attr('href');
						$(this).click(function(event){
							$.ajax({
								'beforeSend':function(){},
								'complete':function(){},
								'success':function(html){$('#fila_'+theid).remove();},
								'type':'POST',
								'url':'<?php echo $this->createUrl('media/deleteFile') ?>',
								'cache':false,
								'data':({id: theurl})
								});
							return false;
						});
			
				});
}

jQuery(document).ready(function() {
	
	inputs_init();
	<?php if(isset($_GET["tinyMCE"])){ ?>
		tinyMCEPopup.executeOnLoad('init();')



		var FileBrowserDialogue = {
		    init : function () {
			// Here goes your code for setting your custom things onLoad.
		    },
		    mySubmit : function () {
			var URL = fileSelected;
			var win = tinyMCEPopup.getWindowArg("window");

			// insert information now
			win.document.getElementById(tinyMCEPopup.getWindowArg("input")).value = URL;
			

			// are we an image browser
			if (typeof(win.ImageDialog) != "undefined") {
			    // we are, so update image dimensions...
			    if (win.ImageDialog.getImageData)
				win.ImageDialog.getImageData();

			    // ... and preview if necessary
			    if (win.ImageDialog.showPreviewImage)
				win.ImageDialog.showPreviewImage(URL);
			}

			// close popup window
			tinyMCEPopup.close();
		    }
		}

		tinyMCEPopup.onInit.add(FileBrowserDialogue.init, FileBrowserDialogue);

		
						
		jQuery('.descarga_g<?php echo $item->idCategory?>').live('click',
			function(){
				fileSelected=jQuery(this).attr('href');
				descrSelected=jQuery(this).attr('title');
				FileBrowserDialogue.mySubmit();
				return false;
			}
		);

	<?php } ?>
	deleteLinksInit();

});




	
</script>
