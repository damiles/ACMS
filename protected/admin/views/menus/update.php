<?php
?>
<div id="mainContent">

<div class="row">
<?php 
if($model->parent!=0)
	echo CHtml::linkButton('<< Volver al menu anterior',array('submit'=>array('update','id'=>$model->parent),'class'=>'button')); 
?>
</div>

<h1><div class="icon32_menu"></div>Editar Menu "<?php echo ACMS::getTitle($model,ACMS::getDefaultLang()->idLang); ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>