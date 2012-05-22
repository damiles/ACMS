<?php $this->beginContent('/layouts/main'); ?>


<div id="sidebar1">
<?php foreach($this->portlets as $class=>$properties)
    $this->widget($class,$properties); ?>
</div>

<div id="maincontent_3col">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,)); ?><!-- breadcrumbs -->
    <?php echo $content; ?>
</div>

<div id="sidebar2">&nbsp;
<?php foreach($this->portlets2 as $class=>$properties)
    $this->widget($class,$properties); ?>
</div>

<?php $this->endContent(); ?>