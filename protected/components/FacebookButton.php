<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacebookButton
 *
 * @author imac24
 */
class FacebookButton extends CWidget{
    //put your code here
    public $ancho=160;
    public $sendButton=true;
    public function init(){
        
    }
    
    public function run(){
        $cs=Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');//Old Version
        $cs->registerScriptFile('http://connect.facebook.net/es_ES/all.js', CClientScript::POS_END);
        $cs->registerScript('fb_init',"
            FB.init({
                appId  : '108289235933467',
                status : true, // check login status
                cookie : true, // enable cookies to allow the server to access the session
                xfbml  : true  // parse XFBML
              });
        ");
        echo '<div id="fb-root"></div>';
        echo '<fb:like href="'.ACMS::selfURL().'" send="'.$this->sendButton.'" layout="button_count" width="'.$this->ancho.'" show_faces="false" font=""></fb:like>';
    }
}

?>
