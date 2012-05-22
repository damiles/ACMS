<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

    echo "<div id='cont_g_$item->idCategory'>";

	echo "<div class='row'><div class='col50' style='margin-right:1%;'>";
	
	echo "<div class='form'><fieldset><legend>Datos de la categoría</legend>";
        echo "Colecci&oacute;n: <br><br><span class='modify' id='tit_cat_$item->idCategory'>$item->name</span>";
	echo "<p class='info'>Pulsa sobre el nombre de la categoría para cambiarla.</p>";
		//echo "<div><a href='#TB_inline?inlineId=form_$item->idCategory&height=125&width=350' class='icon_add' rel='sexylightbox' >A&ntilde;adir imagen</a></div>";
	echo "<div class='row'>";
	echo "<a  onclick='return confirmDelete();'  href='admin.php?r=media/deleteCategory&idCat=$item->idCategory&type=$item->type' class='buttonDelete' style='color:#fff'>Borrar categoría</a>";
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
	        <table class='listado' width="100%">
						<thead>
							<tr><th width="24" class="center">Id</th><th>Descripción</th><th width="75">Tipo</th><th width="100">Tamaño</th><th width="100">Acciones</th></tr>
						</thead>
						<tbody class='contenido_tabla'>
	        <?php
	        foreach($item->files as $index=>$item_arch){
		            $fileinfo=pathinfo(Yii::app()->params['upload'].$item_arch->url);
								$class=(($index%2)==0)? "even":"odd";
							echo "<tr id='fila_$item_arch->idFile' class='".$class."'>";
							echo "<td class='center'>$item_arch->idFile</td>";
							echo "<td class='title_table_link'><a href='upload/$item_arch->url' target='_blank'>$item_arch->description</a></td>";
							echo "<td>".$fileinfo['extension']."</td>";
							echo "<td>".Utiles::formatBytes(filesize(Yii::app()->params['upload'].$item_arch->url))."</td>";
							echo "<td><a href='$item_arch->url' id='$item_arch->idFile' class='delete' style='color:#ff0000'>Borrar</a></td></tr>";

	
	        }
	
	        ?>
						</tbody>
        </div>
            <?php
         }else{
             echo "<p>Esta colecci&oacute;n no contiene documentos</p>";
         }

        echo "</div>";

?>

<!-- Edicion de campos -->
<script type="text/javascript">
function confirmDelete(){
    return confirm("Estas seguro de borrar la categoria, si esta categoría contiene documentos también serán eliminados.");
}

function updateActualTab(){
	$("#tabs").tabs("load",$("#tabs").tabs("option","selected"));
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

	deleteLinksInit();

});


	
</script>
