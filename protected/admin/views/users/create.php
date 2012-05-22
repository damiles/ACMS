<?php
?>
<div id="mainContent">
<h1><div class="icon32_users"></div>Crear usuario</h1>
<?php
if(isset($messageOk)){ 
if($messageOk){
	echo "<span style='display:none' id='messageOk'>$messageOk</span>";
?>
	<script>
	$(document).ready(function(){
		$('#messageOk').delay(200).slideDown(300).delay(5000).slideUp(200);
		});
	</script>
<?php }
}?>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
