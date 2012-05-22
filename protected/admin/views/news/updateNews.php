<?php
?>
<div id="mainContent">
<h1><div class="icon32_news"></div>Editar Noticia "<?php echo ACMS::getTitle($model,ACMS::getDefaultLang()->idLang); ?>"</h1>
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
<?php echo $this->renderPartial('_formNews', array('model'=>$model)); ?>
</div>
