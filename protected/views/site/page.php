<?php
$this->pageTitle=Yii::app()->name . ' - '. ACMS::getTitle($model);
$this->layout='column2';

?>

<h2><?php echo ACMS::getTitle($model);?></h2>
<?php echo ACMS::getText($model);?>