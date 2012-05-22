<?php $this->beginContent('/layouts/main'); ?>

<div id="sidebar">&nbsp;
<?php 
if(isset($_GET['idm'])){
	$this->widget("UserMenu",array('display_in'=>'0', 'parent'=>$_GET['idm'])); 
}?>
	
<?php 
	foreach($this->portlets as $class=>$properties)
		$this->widget($class,$properties); 
?>
</div>

<div id="maincontent_2col">
    <?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,)); ?><!-- breadcrumbs -->
    <?php echo $content; ?>
</div>


<?php $this->endContent(); ?>