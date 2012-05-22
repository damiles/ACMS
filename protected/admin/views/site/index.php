<?php
//$this->layout='admin';
//$this->portlets['UserMenu']=array();
?>

<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?> Admin.</i></h1>
<div class="row">
		<?php $this->widget('AnalyticsReportWidget', array()); ?>
</div>
<div class="row">
	<div class="col50">
		<div class="margin_10">

		</div>
	</div>
	<div class="col50">
		<div class="margin_10">

		</div>
	</div>	
</div>

