<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idDistance')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idDistance), array('view', 'id'=>$data->idDistance)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('swimming')); ?>:</b>
	<?php echo CHtml::encode($data->swimming); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cycling')); ?>:</b>
	<?php echo CHtml::encode($data->cycling); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('running')); ?>:</b>
	<?php echo CHtml::encode($data->running); ?>
	<br />


</div>