<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0036)http://localhost:8888/portalEurotri/ -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="language" content="es">
    <title>Eurotri - 503</title>
    <style>
        body{
            margin:0;
            background:url(<?php echo Yii::app()->theme->baseUrl;?>/images/degra_terror.png) top left repeat-x;
        }
        #wrapper{
             display:block;
             width:1019px;
             margin:0 auto;
        }
    </style>
</head>

<body>

	<div id="wrapper">
		<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/terror.png" border="0" usemap="#Map" />
		<map name="Map" id="Map">
		  <area shape="rect" coords="428,379,529,392" href="mailto:prensa@eurotri.com" target="_blank" />
		  <area shape="rect" coords="642,379,743,392" href="mailto:prensa@eurotri.com" target="_blank" />
		</map>
	</div>	
	<div style="display:none">
        <?php echo nl2br(CHtml::encode($data['message'])); ?>
    </div>	
</body></html>