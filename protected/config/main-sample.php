<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
'name'=>'WEBNAME',

// preloading 'log' component
'preload'=>array('log'),
'modules'=>array(
'Search',
'gii'=>array(
'class'=>'system.gii.GiiModule',
'password'=>'admin',
'ipFilters'=>array('127.0.0.1','192.168.1.*','62.43.191.28'),
// 'newFileMode'=>0666,
// 'newDirMode'=>0777,
),
),
// autoloading model and component classes
'import'=>array(
'application.models.*',
'application.components.*',
'application.helpers.*',
'webroot.plugins.*',
),

// application components
'components'=>array(
//Uncomment for minimize js and css scripts
/*'minScript'=>array(
            'class'=>'ext.minScript.components.ExtMinScript',
            'groupMap'=>array(
                    'css'=>array(
                            dirname(__FILE__).'/../../themes/eurotri/css/reset.css',
                            dirname(__FILE__).'/../../themes/eurotri/css/layout.css',
                            dirname(__FILE__).'/../../js/fancybox/jquery.fancybox-1.3.4.css',
                            dirname(__FILE__).'/../../themes/eurotri/css/calendar.css',
                            dirname(__FILE__).'/../../themes/eurotri/js/jqtransform/jqtransform.css',
                    ),
                    'js'=>array(
                        dirname(__FILE__).'/../../js/Artres/bannerTransitions.js',    
                        dirname(__FILE__).'/../../js/Artres/imageCaption.js',
                        dirname(__FILE__).'/../../js/fancybox/jquery.mousewheel-3.0.4.pack.js',
                        dirname(__FILE__).'/../../js/fancybox/jquery.fancybox-1.3.4.pack.js',
                        dirname(__FILE__).'/../../themes/eurotri/js/jqtransform/jquery.jqtransform.js',
                        dirname(__FILE__).'/../../js/jquery-ui-1.8.6.custom.min.js',
                    ),
            ),
    ),
*/
//Uncomment for url manager
/*'urlManager'=>array(
    'urlFormat'=>'path',
),*/
'log'=>array(
'class'=>'CLogRouter',
'routes'=>array(
array(
'class'=>'CFileLogRoute',
'levels'=>'error, warning',
),
),
),
'user'=>array(
// enable cookie-based authentication
'allowAutoLogin'=>true,
),
'db'=>array(
'class'=>'CDbConnection',
'connectionString'=>'mysql:host=HOST;port=3306;dbname=DBA',
'username'=>'USER',
'password'=>'PASS',
'charset'=>'utf8',
),
'image'=>array(
'class'=>'application.extensions.image.CImageComponent',
// GD or ImageMagick
'driver'=>'GD',
// ImageMagick setup path
//'params'=>array('directory'=>'/opt/local/bin'),
),
),
'theme'=>'classic',
// application-level parameters that can be accessed
// using Yii::app()->params['paramName']
'params'=>array(
// this is used in contact page
'adminEmail'=>'EMAIL',
'upload'=>'UPLOAD_DIR',
'frontendTheme'=>'classic',
'path'=>'/',
//'searchIndexPath'=>'/var/www/vhosts/eurotri.com/httpdocs/seindex/',
),
//Uncomment for min script
/*'controllerMap'=>array(
        'min'=>'ext.minScript.controllers.ExtMinScriptController',
),*/
'sourceLanguage'=>'es',
);
