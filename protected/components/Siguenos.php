<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Siguenos
 *
 * @author imac24
 */
class Siguenos extends CWidget{
    //put your code here
    public $urlFacebook='';
    public $urlTwitter='';
    
    public function init(){
        
    
    }
    
    public function run(){
        echo '<div class="lateralBox clearfix">';
        echo '<a href="'.$this->urlFacebook.'" class="facebookButtonWidget" target="_blank">Siguenos en Facebook</a><a href="http://www.twitter.com/'.$this->urlTwitter.'" class="twitterButtonWidget" target="_blank">Siguenos en twitter</a>';
        echo '</div>';
    }
}

?>
