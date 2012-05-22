<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSportEvent')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idSportEvent), array('view', 'id'=>$data->idSportEvent)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SportContact_idSportContact')); ?>:</b>
	<?php echo CHtml::encode($data->SportContact_idSportContact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('puntuable')); ?>:</b>
	<?php echo CHtml::encode($data->puntuable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SportCategory_idSportCategory')); ?>:</b>
	<?php echo CHtml::encode($data->SportCategory_idSportCategory); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SportBrand_idSportBrand')); ?>:</b>
	<?php echo CHtml::encode($data->SportBrand_idSportBrand); ?>
	<br />


</div>
