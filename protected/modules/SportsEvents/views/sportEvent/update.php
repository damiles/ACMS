<?php
$this->breadcrumbs=array(
	'Sport Events'=>array('index'),
	$model->idSportEvent=>array('view','id'=>$model->idSportEvent),
	'Update',
);

$this->menu=array(
	array('label'=>'Crear evento deportivo', 'url'=>array('create')),
	array('label'=>'Administrar eventos deportivos', 'url'=>array('admin')),
);
?>
<?php
if(Yii::app()->user->hasFlash('status')){
?>
<div class="success"  style='display:none' id='messageOk'>
    	<?php 
        echo Yii::app()->user->getFlash('status');
         ?>
	
        <script>
	$(document).ready(function(){
		$('#messageOk').delay(200).slideDown(300).delay(5000).slideUp(200);
		});
	</script>
</div>
<?php }?>

<h1>Update SportEvent <?php echo $model->idSportEvent; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>