<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FacebookBox
 *
 * @author imac24
 */
class FacebookBox extends CWidget{
    //put your code here
    public $ancho=270;
    public $url='http://www.facebook.com/pages/Eurotri/168637049863680';
    public $faces='true';
    public $border_color="#d6e0e5";
    public $stream='true';
    public $header='false';
    
    public function init(){
        
    
    }
    
    public function run(){
        echo '<div class="FacebookBox">';
        echo '<div id="fb-root" ></div>';
        echo '<script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>';
        echo '<fb:like-box href="'.$this->url.'" width="'.$this->ancho.'" show_faces="'.$this->faces.'" border_color="'.$this->border_color.'" stream="'.$this->stream.'" header="'.$this->header.'"></fb:like-box>';
        echo '</div>';
    }
}

?>
