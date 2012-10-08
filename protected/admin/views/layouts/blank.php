<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/framework.css" media="screen, projection" />
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

<?php 
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery');//Old Version

//$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-1.4.2.min.js', CClientScript::POS_HEAD);

$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/admin/framework.css', '');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/ui-lightness/jquery-ui-1.8.6.custom.css', '');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/windows/sexylightbox.css', '');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.delay.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui-1.8.6.custom.min.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/sexylightbox.v2.3.jquery.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/admin.js', CClientScript::POS_HEAD);

$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/swfobject.js', CClientScript::POS_HEAD);

$user=User::model()->find('idUser=?', array(Yii::app()->user->getId()));


?> 

</head>

<body>

<div id="wrapper">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
                <div id="topmenu">
                
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
