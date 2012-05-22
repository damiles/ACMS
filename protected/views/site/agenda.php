<?php
$this->pageTitle=Yii::app()->name . ' - Noticias';
$this->layout='column2';

$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'agenda_view',
)); ?>
