<?php $this->beginContent('webroot.themes.'.Yii::app()->theme->name.'.views.layouts.main'); ?>


<div id="sidebar1">
<?php 
    foreach($this->portlets as $i=>$dataPortlet){
                    $class=$dataPortlet[0];
                    $properties=$dataPortlet[1];
                    $this->widget($class,$properties); 
            }
?>
</div>



<div id="maincontent_3col">
    
    <?php echo $content; ?>
</div>





<div id="sidebar2">&nbsp;
<?php 
    foreach($this->portlets2 as $i=>$dataPortlet){
                    $class=$dataPortlet[0];
                    $properties=$dataPortlet[1];
                    $this->widget($class,$properties); 
            }
            ?>
</div>








<?php $this->endContent(); ?>