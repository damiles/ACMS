<?php
$this->layout='basic';
$this->pageTitle=Yii::app()->name . ' - Login';
?>

<div class="portlet" style="width:300px;margin:0px auto;">
    <div class="top verde">Login</div>
    <div class="flecha_verde"></div>
    <div class="content clearfix" >
        <div class="form">
        <?php echo CHtml::beginForm(); ?>
                <div class="row">
                        <?php echo CHtml::activeLabelEx($model,'username'); ?>
                        <?php echo CHtml::activeTextField($model,'username',array('class'=>'basic','maxlength'=>255)); ?>
                </div>

                <div class="row">
                        <?php echo CHtml::activeLabelEx($model,'password'); ?>
                        <?php echo CHtml::activePasswordField($model,'password',array('class'=>'basic','maxlength'=>255)); ?>
                </div>

                <div class="row rememberMe">
                        <?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
                        <?php echo CHtml::activeLabel($model,'rememberMe',array('style'=>'display:inline;')); ?>
                </div>

                <div class="row submit">
                        <?php echo CHtml::submitButton('Login',array('class'=>'button')); ?>
                </div>
                <?php echo CHtml::errorSummary($model); ?>
        <?php echo CHtml::endForm(); ?>
                
        </div><!-- form -->

        <?php
        $form = new CForm(array(
            'elements'=>array(
                'username'=>array(
                    'type'=>'text',
                    'maxlength'=>32,
                ),
                'password'=>array(
                    'type'=>'password',
                    'maxlength'=>32,
                ),
                'rememberMe'=>array(
                    'type'=>'checkbox',
                )
            ),

            'buttons'=>array(
                'login'=>array(
                    'type'=>'submit',
                    'label'=>'Login',
                ),
            ),
        ), $model);
        ?>
    </div>
</div>