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
class SportEventsWidget extends CWidget{
    
    
    public function run(){
        $cond=  new CDbCriteria;
        $cond->condition=" date >= NOW()";
        $cond->limit=5;
        $cond->order="date ASC";
        $eventos=SportEvent::model()->findAll($cond);
        $this->render("sportEventsWidget", array('eventos'=>$eventos));
    }

}
?>
