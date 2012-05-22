<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('identrenamiento')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->identrenamiento), array('view', 'id'=>$data->identrenamiento)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('idmodalidad')); ?>:</b>
	<?php echo CHtml::encode($data->idmodalidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nsemanas')); ?>:</b>
	<?php echo CHtml::encode($data->nsemanas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nhorassemana')); ?>:</b>
	<?php echo CHtml::encode($data->nhorassemana); ?>
	<br />


</div>