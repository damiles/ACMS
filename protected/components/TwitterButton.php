<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TwitterButton
 *
 * @author imac24
 */
class TwitterButton extends CWidget{
    //put your code here
    public function init(){

    }

    public function run()
    {
        
        echo '<a href="http://twitter.com/share" class="twitter-share-button" data-counturl="'.ACMS::selfURL().'"  data-related="eurotri" data-via="eurotri" data-url="'.ACMS::selfURL().'">Tweet</a>';   
        echo '<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>';
        
    }
}

?>
