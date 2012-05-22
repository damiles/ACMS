<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idactividad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idactividad), array('view', 'id'=>$data->idactividad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idtipo')); ?>:</b>
	<?php echo CHtml::encode($data->idtipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('orden')); ?>:</b>
	<?php echo CHtml::encode($data->orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iddia')); ?>:</b>
	<?php echo CHtml::encode($data->iddia); ?>
	<br />


</div>