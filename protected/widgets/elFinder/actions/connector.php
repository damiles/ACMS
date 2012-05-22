<?php

$path = Yii::getPathOfAlias('application.widgets.elFinder.php');

require_once( $path . '/elFinderConnector.class.php' );
require_once( $path . '/elFinder.class.php' );
require_once( $path . '/elFinderVolumeDriver.class.php' );
require_once( $path . '/elFinderVolumeLocalFileSystem.class.php' );

// Required for MySQL storage connector
// include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'elFinderVolumeMySQL.class.php';

/**
 * elFinder connector action
 *
 */
class connector extends CAction{
    public function run(){
		$opts = array(
			// 'debug' => true,
			'roots' => array(
				array(
					'driver'        => 'LocalFileSystem',   // driver for accessing file system (REQUIRED)
					'path'          => base64_decode(Yii::app()->request->getParam('elfinder_path')),         // path to files (REQUIRED)
					'URL'           => base64_decode(Yii::app()->request->getParam('elfinder_url')), // URL to files (REQUIRED)
					'accessControl' => 'access'             // disable and hide dot starting files (OPTIONAL)
				)
			)
		);
		
		// run elFinder
		$connector = new elFinderConnector(new elFinder($opts));
		$connector->run();
    }
}


/**
 * Simple function to demonstrate how to control file access using "accessControl" callback.
 * This method will disable accessing files/folders starting from  '.' (dot)
 *
 * @param  string  $attr  attribute name (read|write|locked|hidden)
 * @param  string  $path  file path relative to volume root directory started with directory separator
 * @return bool
 **/
function access($attr, $path, $data, $volume) {
	return strpos(basename($path), '.') === 0   // if file/folder begins with '.' (dot)
		? !($attr == 'read' || $attr == 'write')  // set read+write to false, other (locked+hidden) set to true
		: ($attr == 'read' || $attr == 'write');  // else set read+write to true, locked+hidden to false
}
