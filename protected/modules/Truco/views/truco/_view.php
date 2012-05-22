<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTruco')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idTruco), array('view', 'id'=>$data->idTruco)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('published')); ?>:</b>
	<?php echo CHtml::encode($data->published); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idTrucoCategoria')); ?>:</b>
	<?php echo CHtml::encode($data->idTrucoCategoria); ?>
	<br />


</div>