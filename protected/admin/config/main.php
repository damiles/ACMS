<?php

$backend=dirname(dirname(__FILE__));
$frontend=dirname($backend);
Yii::setPathOfAlias('admin', $backend);

$frontendArray=require($frontend.'/config/main.php');

// This is the main Web application backend configuration. Any writable
// CWebApplication properties can be configured here.
$backendArray=array(
    'basePath' => $frontend,

    'controllerPath' => $backend.'/controllers',
    'viewPath' => $backend.'/views',
    'runtimePath' => $backend.'/runtime',
    'components'=>array(
	'urlManager'=>array(
            'urlFormat'=>'get',
	),
        'log'=>array(
        'class'=>'CLogRouter',
        'routes'=>array(
        array(
        'class'=>'CFileLogRoute',
        'levels'=>'error, warning',
        ),
        ),
        ),
    ),
    
    // autoloading model and component classes
    'import'=>array(
        'admin.models.*',
        'admin.components.*',
        'application.models.*',
        'application.components.*',
        'application.extensions.*',
    ),
    'theme'=>null,
);



return CMap::mergeArray($frontendArray, $backendArray);
?>
