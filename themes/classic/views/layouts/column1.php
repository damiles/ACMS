<?php $this->beginContent('/layouts/main'); ?>

<div id="maincontent">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,)); ?><!-- breadcrumbs -->
    <?php echo $content; ?>
</div>

<?php $this->endContent(); ?>