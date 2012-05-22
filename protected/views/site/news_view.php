
<div class="news">


    <h2><?php echo CHtml::link(CHtml::encode(ACMS::getTitle($data)), array('page', 'id'=>$data->idArticle)); ?></h2>
	
        <?php $this->widget('PageBreak',array('text'=>ACMS::getText($data))); ?>

        <b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b> <?php echo CHtml::encode($data->date); ?>
	<br />

        
                           

	<b><?php echo CHtml::encode($data->getAttributeLabel('author')); ?>:</b> <?php echo CHtml::encode($data->author0->name); ?>
	<br />

</div>
