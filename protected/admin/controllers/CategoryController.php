<?php

class CategoryController extends Controller
{
        const PAGE_SIZE=10;
        /**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
        public $menu;

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			
		);
	}

        /**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

        /**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'list' and 'show' actions
				'actions'=>array('login', 'captcha'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticate users
				'actions'=>array('index','logout','update','create','delete'),
				'users'=>User::usernamesByRole((User::ADMIN | User::GESTOR), User::PERM_CATEGORIAS),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
        /**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

        /**
	 * News
	 */
        public function actionIndex(){
            $dataProvider=new CActiveDataProvider('ArticleCategory', array(
                    'criteria'=>array(
                        'condition'=>'parent=0',
                    ),
                    'pagination'=>array(
                            'pageSize'=>self::PAGE_SIZE,
                    ),
            ));

            $this->render('index',array(
                    'dataProvider'=>$dataProvider,
            ));
        }
        /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            $model=new ArticleCategory;
            if(isset ($_GET['idparent'])){
                $model->parent=$_GET['idparent'];
            }else{
                $model->parent=0;
            }
                
           
            if($model->save()){
	        $langs=Lang::model()->findAllByAttributes(array("selected"=>1));
			foreach($langs as $i=>$item){
				$cont=new ArticleCategoryContent;
				$cont->lang=$item->idLang;
				$cont->title="Sin titulo";
				$cont->idArticleCategory=$model->idArticleCategory;
				if(!$cont->save()){
					$model->delete();
					$this->redirect(array('index'));
				}
			}
                    $this->redirect(array('update','id'=>$model->idArticleCategory,'idparent'=>$model->parent));
            }else{
                    $this->redirect(array('index'));
            }
		
	}

	
	
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModelCategory();
                if(isset($_POST['ArticleCategory']))
		{
			$contents=$_POST['ArticleCategoryContent'];
                        foreach($contents as $item){
                                $contenido=ArticleCategoryContent::model()->findbyPk(array("idArticleCategory"=>$item["idArticleCategory"], "lang"=>$item["lang"]));
                                $contenido->attributes=$item;
                                $contenido->save();
                        }
			$model->attributes=$_POST['ArticleCategory'];
			if($model->save())
                            $this->redirect(array('update','id'=>$model->idArticleCategory,'updated'=>'1','idparent'=>$model->parent));
		}
		$updated=0;
		if(isset($_GET["updated"])){
			$updated=$_GET["updated"];
			if($updated==0)
				$this->render('update',array('model'=>$model,'messageOk'=>"Error al guardar"));
			else if($updated=="1")
				$this->render('update',array('model'=>$model,'messageOk'=>"Categoría guardada"));
		}else
			$this->render('update',array('model'=>$model));
		
		
	}
        /**
         * Delete a particular News
         */
        public function actionDelete()
		{
			if(Yii::app()->request->isPostRequest)
			{
				// we only allow deletion via POST request
				$model=$this->loadModelCategory();
				foreach($model->content as $item){
					$item->delete();
				}
				$model->delete();
				// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
				if(!isset($_POST['ajax']))
					$this->redirect(array('index'));
			}
			else
				throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}


          /**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModelCategory()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=ArticleCategory::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}



        

        
}
