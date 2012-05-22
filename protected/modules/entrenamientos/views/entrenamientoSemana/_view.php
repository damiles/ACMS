<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idsemana')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idsemana), array('view', 'id'=>$data->idsemana)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('identrenamiento')); ?>:</b>
	<?php echo CHtml::encode($data->identrenamiento); ?>
	<br />


</div>