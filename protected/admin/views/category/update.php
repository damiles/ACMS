<?php
$url=array('index');
$donde="el nivel superior";
$idparent=0;
if($model->parent!=0){
        $url=array('update','id'=>$model->parent,'idparent'=>$model->parent0->parent);
        $donde=ACMS::getTitle($model->parent0);
        $idparent=$model->parent0->idArticleCategory;
}
$this->menu=array(
        array('label'=>'Volver a la categoria padre', 'url'=>$url),
	array('label'=>'Crear nueva categoria en '.$donde, 'url'=>array('create','idparent'=>$idparent)),
);

?>
<div id="mainContent">
<h1><div class="icon32_page"></div>Editar Categoria "<?php echo ACMS::getTitle($model,ACMS::getDefaultLang()->idLang); ?>"</h1>
<?php 
if(isset($messageOk)){
	echo "<span style='display:none' id='messageOk'>$messageOk</span>";
?>
	<script>
	$(document).ready(function(){
		$('#messageOk').delay(200).slideDown(300).delay(5000).slideUp(200);
		});
	</script>
<?php }?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
