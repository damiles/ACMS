<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtipo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idtipo), array('view', 'id'=>$data->idtipo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('png')); ?>:</b>
	<?php echo CHtml::encode($data->png); ?>
	<br />


</div>