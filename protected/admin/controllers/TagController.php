<?php

class TagController extends Controller {
    // Uncomment the following methods and override them if needed
    /*
      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'list' and 'show' actions
                'actions' => array('login', 'captcha'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticate users
                'actions' => array('autoCompleteLookup','deleteTagLink','deleteTagBannerLink','addTagsToArticle','addTagsToBanner'),
                'users' => User::usernamesByRole((User::ADMIN | User::GESTOR), User::PERM_NOTICIAS),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    
    public function actionDeleteTagLink(){
       if(Yii::app()->request->isAjaxRequest && isset($_GET['idTag']) && isset($_GET['idArticle']))
       {
           $connection=Yii::app()->db;
           $command=$connection->createCommand('DELETE FROM Article_has_Tag WHERE idArticle='.$_GET['idArticle'].' AND idTag='.$_GET['idTag']);
           if($command->execute()==1)
               echo "1";
           else
               echo "0";
           
           //$this->renderPartial('_ajaxArticleTagDeleteLinks',$tags);
           
       }
    }
    
    public function actionDeleteTagBannerLink(){
       if(Yii::app()->request->isAjaxRequest && isset($_GET['idTag']) && isset($_GET['idBanner']))
       {
           $connection=Yii::app()->db;
           $command=$connection->createCommand('DELETE FROM Banner_has_Tag WHERE idBanner='.$_GET['idBanner'].' AND idTag='.$_GET['idTag']);
           if($command->execute()==1)
               echo "1";
           else
               echo "0";
           
           //$this->renderPartial('_ajaxArticleTagDeleteLinks',$tags);
           
       }
    }
    
    public function getTagArray($tags){
        return array_unique(
                preg_split('/\s*,\s*/', trim($tags),-1,PREG_SPLIT_NO_EMPTY)
                );
    }
    
    public function actionAddTagsToArticle(){
       if(Yii::app()->request->isAjaxRequest && isset($_GET['idArticle']) && isset($_GET['tags']))
       {
           $connection=Yii::app()->db;
           $tags_array=$this->getTagArray($_GET['tags']);
           foreach($tags_array as $name){
               if(($tag=Tag::model()->findByAttributes(array('tag'=>$name)))===null)
               {
                   $tag=new Tag();
                   $tag->tag=$name;
                   $tag->save();
               }
               //Si no esta lo incluimos
               
               if($connection->createCommand('SELECT * FROM Article_has_Tag WHERE idArticle='.$_GET['idArticle'].' AND idTag='.$tag->idTag)->query()->rowCount==0)
               {
                   $connection->createCommand('INSERT INTO Article_has_Tag (idArticle, idTag) VALUES ('.$_GET['idArticle'].','.$tag->idTag.')')->execute();
               }
               
           }
           
           $tags=Tag::model()->with('articles')->findAll('articles.idArticle='.$_GET['idArticle']);
           
           $this->renderPartial('_ajaxArticleTagLinks',array('tags'=>$tags,'idArticle'=>$_GET['idArticle']));
           
       }
    }
    
    public function actionAddTagsToBanner(){
       if(Yii::app()->request->isAjaxRequest && isset($_GET['idBanner']) && isset($_GET['tags']))
       {
           $connection=Yii::app()->db;
           $tags_array=$this->getTagArray($_GET['tags']);
           foreach($tags_array as $name){
               if(($tag=Tag::model()->findByAttributes(array('tag'=>$name)))===null)
               {
                   $tag=new Tag();
                   $tag->tag=$name;
                   $tag->save();
               }
               //Si no esta lo incluimos
               
               if($connection->createCommand('SELECT * FROM Banner_has_Tag WHERE idBanner='.$_GET['idBanner'].' AND idTag='.$tag->idTag)->query()->rowCount==0)
               {
                   $connection->createCommand('INSERT INTO Banner_has_Tag (idBanner, idTag) VALUES ('.$_GET['idBanner'].','.$tag->idTag.')')->execute();
               }
               
           }
           
           $tags=Tag::model()->with('banners')->findAll('banners.idBanner='.$_GET['idBanner']);
           
           $this->renderPartial('_ajaxBannerTagLinks',array('tags'=>$tags,'idBanner'=>$_GET['idBanner']));
           
       }
    }
    
    //Action
    public function actionAutoCompleteLookup()
    {
       if(Yii::app()->request->isAjaxRequest && isset($_GET['q']))
       {
            /* q is the default GET variable name that is used by
            / the autocomplete widget to pass in user input
            */
          $name = $_GET['q']; 
                    // this was set with the "max" attribute of the CAutoComplete widget
          $limit = min($_GET['limit'], 50); 
          $criteria = new CDbCriteria;
          $criteria->condition = "tag LIKE LOWER(:sterm)";
          $criteria->params = array(":sterm"=>"%$name%");
          $criteria->limit = $limit;
          $tagArray = Tag::model()->findAll($criteria);
          $returnVal = '';
          foreach($tagArray as $tag)
          {
             $returnVal .= $tag->tag.'|'.$tag->idTag."\n";
          }
          echo $returnVal;
       }
    }

}