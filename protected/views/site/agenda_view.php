
<div class="news">


    <h2><?php echo CHtml::link(CHtml::encode(ACMS::getTitle($data)), array('page', 'id'=>$data->idAgenda)); ?></h2>
	

        <b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b> <?php echo CHtml::encode($data->date); ?>
	<br />

        

</div>
