<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idSportBrand')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idSportBrand), array('view', 'id'=>$data->idSportBrand)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ico_file')); ?>:</b>
	<?php echo CHtml::encode($data->ico_file); ?>
	<br />


</div>