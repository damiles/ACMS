<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ArticulosEnPortada
 *
 * @author imac24
 */
class MultimediaEnPortada extends CWidget{
    //put your code here
    public function init(){
        
    }
    public function run(){
        $cond='type="news" and published=true and date <=NOW()';


        $categoria=ArticleCategory::model()->findByPk(12);
        $categorias=ACMS::getChildCategories($categoria);

        $catCond=join(' or category=',$categorias);

        $cond=$cond.' and (category='.$catCond.')';

        $condition= new CDbCriteria();
        $condition->condition=$cond;
        $condition->order="home DESC, date DESC";
        $condition->limit=9;
        $articulos=Article::model()->findAll($condition);

        $this->render('multimediaEnPortada', array('articulos'=>$articulos));
    }
}

?>
