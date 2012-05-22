<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/framework.css" media="screen, projection" />
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="wrapper">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
                <div id="topmenu">
                <?php
                     $this->widget('zii.widgets.CMenu',array(
                         'items'=>array(
                            array('label'=>'Home', 'url'=>array('/site/index')),
                            array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                            )
                         )
                     );
                 ?>
                </div>
	</div><!-- header -->
        <div id="content" style="margin-left:30px;">
        	<?php echo $content; ?>
	</div><!-- content -->

	<div id="footer">
		Versi&oacute;n 0.1
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>