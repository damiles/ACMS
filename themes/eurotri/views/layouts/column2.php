<?php $this->beginContent('webroot.themes.'.Yii::app()->theme->name.'.views.layouts.main'); ?>

<div class="clearfix margincontent2">
    <div class="col_iz">
        <?php //$this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,)); ?><!-- breadcrumbs -->
        <?php echo $content; ?>
    </div>


    <div class="col_home_banners">
        <?php 
            foreach($this->portlets as $i=>$dataPortlet){
                    $class=$dataPortlet[0];
                    $properties=$dataPortlet[1];
                    $this->widget($class,$properties); 
            }
        ?>


    </div>	
</div>
<?php $this->endContent(); ?>