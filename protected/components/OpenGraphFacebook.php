<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OpenGraphFacebook
 *
 * @author imac24
 */
class OpenGraphFacebook extends CWidget{
    //put your code here
    public $email='';
    public $phone='';
    public $fax='';
    public $url='';
    public $image='';
    public $type='';
    public $titular='';
    public $site_name='';
    public $admins='100002206191714';
    public $app_id='';
    
    public function init(){
        $this->site_name=Yii::app()->name;
        $this->url=ACMS::selfURL();
    }
    
    public function run(){
        //Necesarios
        echo '<meta property="og:title" content="'.$this->titular.'" />';
        echo '<meta property="og:type" content="'.$this->type.'" />';
        echo '<meta property="og:url" content="'.$this->url.'" />';
        echo '<meta property="og:image" content="'.$this->image.'" />';
        echo '<meta property="og:site_name" content="'.$this->site_name.'" />';
        echo '<meta property="fb:admins" content="'.$this->admins.'" />';
        echo '<meta property="fb:app_id" content="'.$this->app_id.'" />';
        //Datos contactos
        echo '<meta property="og:email" content="'.$this->email.'"/>';
        echo '<meta property="og:phone_number" content="'.$this->phone.'"/>';
        echo '<meta property="og:fax_number" content="'.$this->fax.'"/>';
        echo '<meta property="og:language" content="es" />';
    }
    
}

?>
