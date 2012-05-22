<?php
$this->breadcrumbs=array(
	'Truco Categorias',
);

$this->menu=array(
	array('label'=>'Create TrucoCategoria', 'url'=>array('create')),
	array('label'=>'Manage TrucoCategoria', 'url'=>array('admin')),
);
?>

<h1>Truco Categorias</h1>
<?php 
if(isset($message)){
	echo "<span style='display:none' id='messageOk'>$message</span>";
?>
	<script>
	$(document).ready(function(){
		$('#messageOk').delay(200).slideDown(300).delay(5000).slideUp(200);
		});
	</script>
<?php }?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
