<?php
?>
<div id="mainContent">
<h1><div class="icon32_users"></div>Editar usuario "<?php echo $model->user; ?>"</h1>
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
