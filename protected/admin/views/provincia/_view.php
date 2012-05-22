<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idProvincia')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idProvincia), array('view', 'id'=>$data->idProvincia)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_pais')); ?>:</b>
	<?php echo CHtml::encode($data->cod_pais); ?>
	<br />


</div>