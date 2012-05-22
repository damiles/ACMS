<?php 

Yii::app()->clientScript->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js');
Yii::app()->clientScript->registerCSSFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/themes/smoothness/jquery-ui.css');

$publish = Yii::app()->assetManager->publish( Yii::getPathOfAlias('application.widgets.elFinder.assets'));
Yii::app()->clientScript->registerCSSFile($publish .  '/css/elfinder.full.css');
Yii::app()->clientScript->registerCSSFile($publish .  '/css/theme.css');

$publish = Yii::app()->assetManager->publish( Yii::getPathOfAlias('application.widgets.elFinder.assets.js') .  '/elfinder.min.js');
Yii::app()->clientScript->registerScriptFile($publish);

$script = "var elf = $('".$this->selector."').elfinder({
					url : '".$this->action."'  // connector URL (REQUIRED)
				}).elfinder('instance');";
Yii::app()->clientScript->registerScript('elfinder', $script, CClientScript::POS_READY);

?>