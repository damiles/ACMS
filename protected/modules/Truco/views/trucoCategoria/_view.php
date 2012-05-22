<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTrucoCategoria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idTrucoCategoria), array('view', 'id'=>$data->idTrucoCategoria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('imagen')); ?>:</b>
	<?php echo CHtml::encode($data->imagen); ?>
	<br />


</div>