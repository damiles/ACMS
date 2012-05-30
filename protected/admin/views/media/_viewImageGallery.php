<div class="menu_interior " style="height:27px;margin-bottom:10px;"><ul id="yw6">
<li><a href="#" onclick="Mostrar('categoria')">Editar Categoria</a></li>
<li><a href="#" onclick="Mostrar('archivo')">Subir Archivo</a></li>
<li><a href="#" onclick="MostrarVista('')">Cambiar Vista</a></li>
</ul></div>

<script type="text/javascript">
    function Mostrar(option){
	var contenedor = $("#"+option);
        contenedor.toggle();
        return true;
    }

    var isTab=true;
    function MostrarVista(){
	if(isTab){
		$('#tabsContainer').hide();
		$('#listado').show();
		isTab=false;
	}else{
		$('#tabsContainer').show();
		$('#listado').hide();
		isTab=true;
	}



	return true;
	
    }
</script>
<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$popupG='';
if(isset($_GET['popup']))
	$popupG='&popup='.$_GET['popup'];

    echo "<div id='cont_g_$item->idCategory'>";

	echo "<div class='' >";
	
	echo "<div class='form'><fieldset id='categoria' style='display:none;'><legend>Datos de la categoría</a></legend>";
        echo "Colecci&oacute;n: <br><br><span class='modify' id='tit_cat_$item->idCategory'>$item->name</span>";
	echo "<p class='info'>Pulsa sobre el nombre de la categoría para cambiarla.</p>";
	//echo "<div><a href='#TB_inline?inlineId=form_$item->idCategory&height=125&width=350' class='icon_add' rel='sexylightbox' >A&ntilde;adir imagen</a></div>";
	echo "<div class='row'>";
	echo "<a onclick='return confirmDelete();' href='admin.php?r=media/deleteCategory&idCat=$item->idCategory&type=$item->type".$popupG."' class='buttonDelete' style='color:#fff'>Borrar categoría</a>";
	//echo CHtml::linkButton('Borrar categoría',array('submit'=>array('deleteCategory','idCat'=>$item->idCategory),'confirm'=>'¿Estás seguro de eliminar esta categiría y todas las imagenes contennidas en ella?','class'=>'buttonDelete'));
	echo "</div></fieldset>";
	echo "</div>";
        echo "<div id='uploadForm_$item->idCategory' class='form'>";
        echo CHtml::beginForm($this->createUrl('media/uploadFile', array("type"=>$item->type)),'post',array('enctype'=>'multipart/form-data', 'target'=>'uploadResult', 'onsubmit'=>'$("#button_g_'.$item->idCategory.'").hide();$("#loader_g_'.$item->idCategory.'").show()'));
        $myNewFile= new File;

        echo "<fieldset id='archivo' style='display:none;'><legend>Subir archivo</legend>";
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


 	echo "</div>";

	echo "<iframe id='uploadResult' name='uploadResult' style='display:none'></iframe>";		
	if(sizeof($item->files)>0){

            $firstImg=$item->files[0];
         ?>
			
        <div class="">
	        <div class="info_image">
	            <div class="imagen_previo" style="background:none; margin-top:-20px">
	                <?php  $fileinfo=pathinfo(Yii::app()->params['upload'].$firstImg->url); ?>
		    <div style="width:239px; height:159px; overflow:hidden; background:#ccc;">
	                <img style="display:block; margin:0 auto" src="upload/<?php echo $fileinfo['filename']."_med.".$fileinfo['extension']; ?>" id="previo_g<?php echo $item->idCategory ?>" />
		    </div>
	            </div>
		</div>

		<div class="info_image" style="background:none; margin-top:17px">		    
			<div class="coleccion_info"><span><?php echo sizeof($item->files);?> fotos |</span> colecci&oacute;n <?php echo $item->name;?></div>
			    <div class="nombre_foto">Nombre<br/><strong id="FileName_g<?php echo $item->idCategory?>"><?php echo $firstImg->name; ?></strong></div>
			    <div class="tipo_archivo">
			        <span class="titulo">Tipo de archivo</span>
			        <span class="txt" id="FileType_g<?php echo $item->idCategory ?>"><?php echo $fileinfo['extension'] ?></span>
			    </div>
			    <div class="size_archivo">
			        <span class="titulo">Tama&ntilde;o</span>
			        <span class="txt" id="FileSize_g<?php echo $item->idCategory ?>"><?php echo Utiles::formatBytes(filesize(Yii::app()->params['upload'].$firstImg->url)) ?></span>
			    </div>
			    <div class="acciones clearfix" style="padding-left:18px;margin-top:8px;">
				<?php if(isset($_GET['popup'])){ ?>
					<a class="button" style="color:#fff;" href="upload/<?php echo $firstImg->url;?>" id="descarga_g<?php echo $item->idCategory ?>">Utilizar</a>
				<?php }else{ ?>			    	
				<a class="button" style="color:#fff;" href="--?r=media/download&descarga=<?php echo $firstImg->url;?>" id="descarga_g<?php echo $item->idCategory ?>">Descargar</a>
				<?php } ?>
				<a class="buttonDelete" style="color:#fff;" href="<?php echo $firstImg->url;?>"  id="borrar_g<?php echo $item->idCategory ?>">Borrar</a>
			    </div>

	         <script type="text/javascript">
				/*<![CDATA[*/
				jQuery(document).ready(function() {

				<?php if(isset($_GET['popup'])): ?>
					jQuery('#descarga_g<?php echo $item->idCategory?>').click(
						function(){
							var filename=jQuery(this).attr('href');
							 var dot = filename.lastIndexOf("."); 
							var extension = filename.substr(dot,filename.length);
							var name=filename.substr(0, dot);
							var minFile=name+"_low"+extension
							jQuery( '#<?php echo $_GET['popup'] ?>', window.opener.document ).val(filename);
							jQuery( '#img_<?php echo $_GET['popup'] ?>', window.opener.document ).attr('src',minFile);
							//jQuery( '#link_<?php echo $_GET['popup'] ?>', window.opener.document ).html(jQuery(this).attr('href'));
							self.close();
							return false;
						}
					);
				<?php endif; ?>

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
                </div>
          </div>



	  <div id="listado" style="display:none; width:100%"> 
	  	<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'listadoImagenesGrid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				array(
				    'name'=>'name',
				    'value'=>array($model, 'gridLinkName'),
      				    'type'=>'raw',
				    ),
				'description',
				'date',
				
			),
		)); ?>
	  </div>


	  <div id="tabsContainer" class="tabsContainer" style="width:100%">
		<?php   $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$model->search(),
			'id'=>'listaImagenes',
			'itemView'=>'_view',));

			/*foreach($item->files as $item_arch){
    			$fileinfo=pathinfo(Yii::app()->params['upload'].$item_arch->url);
    			echo "<a href=\"javascript:setData('".$item->idCategory."','".$fileinfo['filename']."','".$item_arch->name."','".$fileinfo['extension']."','".Utiles::formatBytes(filesize(Yii::app()->params['upload'].$item_arch->url))."');\"><img src='upload/".$fileinfo['filename']."_low.".$fileinfo['extension']."'></a>";}*/
		?>
	  </div>
          <?php
         	}else{
             		echo "<p>Esta colecci&oacute;n no contiene im&aacute;genes</p>";
        	}
		echo "</div>";

	   ?>

<!-- Edicion de campos -->
<script type="text/javascript">

function confirmDelete(){
    return confirm("Estas seguro de borrar la categoria, si esta categoría contiene imágenes también serán eliminadas.");
}

function updateActualTab(){
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
jQuery(document).ready(function() {
	
	inputs_init();
});	
</script>
