<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NoticiasBiCol
 *
 * @author imac24
 */
class NoticiasBiCol extends CWidget{
    //put your code here
    public function init(){
        
    }
    
    public function run(){
        
        
        //Nacional
        $cond="type='news' and published=true and date <=NOW() ";
        
        $categoria=ArticleCategory::model()->findByPk(6);
        $categorias=ACMS::getChildCategories($categoria);
        if(count($categorias)>1)
            $catCond=join(' or category=',$categorias);
        else
            $catCond=$categorias[0];
        
        $cond=$cond.' and (category='.$catCond.')';
        
        $condicion=new CDbCriteria;
        $condicion->condition=$cond;
        $condicion->order='date DESC';
        $condicion->limit=7;
        
        $noticiasNacional=Article::model()->findAll($condicion);
        
        
        //Internacional
        $cond="type='news' and published=true";
        
        $categoria=ArticleCategory::model()->findByPk(7);
        $categorias=ACMS::getChildCategories($categoria);
        if(count($categorias)>1)
            $catCond=join(' or category=',$categorias);
        else
            $catCond=$categorias[0];
        
        $cond=$cond.' and (category='.$catCond.')';
        
        $condicion=new CDbCriteria;
        $condicion->condition=$cond;
        $condicion->order='date DESC';
        $condicion->limit=7;
        
        
        $noticiasInternacional=Article::model()->findAll($condicion);
        
        $this->render("noticiasBiCol",array(
            'nacional'=>$noticiasNacional,
            'internacional'=>$noticiasInternacional,
        ));
    }
}

?>
