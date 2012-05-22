<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/yii/framework/yii.php';
$config=dirname(__FILE__).'/protected/admin/config/main.php';

$plugins=require_once(dirname(__FILE__).'/plugins/plugins.php');
$modules=require_once(dirname(__FILE__).'/protected/modules/modules.php');
// remove the following line when in production mode
//defined('YII_DEBUG') or define('YII_DEBUG',true);

require_once($yii);
Yii::createWebApplication($config)->run();
