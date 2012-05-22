<?php
//$this->layout='admin';
/*
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/ui-lightness/jquery-ui-1.7.2.custom.css', '');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui-1.7.2.custom.min.js', CClientScript::POS_HEAD);
*/

?>




<h1>
	<div class="icon32_img"></div>
	<?php 
	if($_GET['type']=='images'):
		$urlToLoad='viewImageGallery';
	?>
	Im&aacute;genes
	<?php 
	else:
		$urlToLoad='viewDocumentGallery';
	?>
Documentos
<?php endif; ?>
</h1>

<div id="infoContentWrapper" class="form clearfix">
	<div id="side-infoContent" style="float:left;">
		<div class="portlet">
			<div class="top azul"><span class="titulo">Categorias</span></div>
			<div class="flecha_azul"></div>	
			<div class="menuPortlet">
			    <ul id="menu_categorias">
				<?php
				    $firstGalery;
				    foreach($galeria as $i=>$item){
					if($i==0)
					    $firstGalery=$item;
					    echo "<li><a href='".Yii::app()->getBaseUrl()."/admin.php?r=media/".$urlToLoad."&id=".$item->idCategory."' class='ajaxLink'><span id='tabitem_".$item->idCategory."'>".$item->name."</span></a></li>";
				    }
				   

				?>

			    </ul>
			    <ul>
				 <?php echo "<li><a href='#add' id='newCategory'><span>Añadir nueva categoria</span></a></li>";?>
			    </ul>
			<!--  <div id="add">Loading...</div>-->
			</div>
		</div>
	</div>

	<div id="infoContent" style="margin-left:240px; margin-right:0px;">

		<div id="contentTab"></div>


	</div>





</div>

<script type="text/javascript">

function initLinks(){

	$('.ajaxLink').click(function(){

		jQuery.ajax({'url':$(this).attr('href'),'cache':false,'success':function(html){
		        //if(html>0){
		        	$("#contentTab").html(html);	   
		        //}
		    }
		});


		$('.ajaxLink').removeClass('active');	
		$(this).addClass('active');

		return false;
	});
}
function initGaleryAjax(id){

	$('.ajaxLink').removeClass('active');	
	$('#tabitem_'+id).parent().addClass('active');

	//Iniciamos la primera galeria
	var firstLink="<?php echo Yii::app()->getBaseUrl()."/admin.php?r=media/".$urlToLoad."&id=" ?>"+id;
	jQuery.ajax({'url':firstLink,'cache':false,'success':function(html){
	        $("#contentTab").html(html);	   
	        
	    }
	});

}
  $(document).ready(function(){
    //$("#tabs").tabs();
	initLinks();
	initGaleryAjax(<?php echo $firstGalery->idCategory?>);
  });
</script>
<script>
function setData(galeria, file, nombre, ext, size){
    $('#previo_g'+galeria).attr("src", "upload/"+file+"_med."+ext);
    $('#FileName_g'+galeria).html(nombre);
    $('#FileType_g'+galeria).html(ext);
    $('#FileSize_g'+galeria).html(size);
    $('#descarga_g'+galeria).attr("href", "?r=media/download&descarga="+file+"."+ext);
    $('#borrar_g'+galeria).attr("href",file+"."+ext);
    
}
</script>
<script type="text/javascript">
/*<![CDATA[*/
jQuery(document).ready(function() {
    jQuery('#newCategory').click(function(){
        jQuery.ajax({'url':'<?php echo Yii::app()->getBaseUrl();?>/admin.php?r=media/newCategoryAjax','data':'type=<?php echo $_GET['type'];?>','cache':false,'success':function(html){
                if(html>0){
                    $("#menu_categorias").append('<?php echo "<li><a href=\"".Yii::app()->getBaseUrl()."/admin.php?r=media/".$urlToLoad."&id='+html+'\" class=\"ajaxLink \"><span id=\"tabitem_'+html+'\">Sin titulo</span></a></li>";?>');
			initLinks();
			initGaleryAjax(html);
                }
                    
            }
        });
        return false;
    });
});
/*]]>*/
</script>