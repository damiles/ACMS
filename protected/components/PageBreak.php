<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PageBreak
 *
 * @author damiles
 */
class PageBreak extends CWidget{
    
    public $text="";
    public $breakText="";
    public $delimiter="<!-- pagebreak -->";
    
    public function run(){
        $splitText=split($this->delimiter, $this->text);
        $this->breakText=$splitText[0];
        /*if(strlen($this->text)>strlen($this->breakText))
                $this->breakText=$this->breakText.' ...';*/
        echo $this->breakText;
    }

}
?>
