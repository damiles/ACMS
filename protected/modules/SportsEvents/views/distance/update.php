<?php
$this->breadcrumbs=array(
	'Distances'=>array('index'),
	$model->idDistance=>array('view','id'=>$model->idDistance),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Distance', 'url'=>array('index')),
	array('label'=>'Crear Distancia', 'url'=>array('create')),
	//array('label'=>'View Distance', 'url'=>array('view', 'id'=>$model->idDistance)),
	array('label'=>'Administrar Distancias', 'url'=>array('admin')),
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

<h1>Update Distance <?php echo $model->idDistance; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>