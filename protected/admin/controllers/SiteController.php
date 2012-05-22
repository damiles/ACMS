<?php

class SiteController extends Controller
{
        const PAGE_SIZE=10;
        const TYPE_TIT_MENU=1;
        const TYPE_TIT_APARTADO=2;
        const TYPE_CON_APARTADO=3;
        /**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
        

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
				'actions'=>array('index','logout'),
				'users'=>User::usernamesByRole((User::ADMIN | User::GESTOR)),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
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
         * Media
         */

        public function actionNewCategoryAjax(){
            $model=new Category;
            $model->name="Sin titulo";
            $model->type='documents';
            if(isset($_GET['type']))
                $model->type=$_GET['type'];
            if($model->save())
                    return $this->renderPartial('_ajaxContent',array('idNewCat'=>$model->idCategory));
            else
                return $this->renderPartial('_ajaxContent',array('idNewCat'=>0));
        }

        public function actionUpdateCategory(){
            if(isset($_GET['id'])){
                $model=Category::model()->findByPk($_GET['id']);
                $model->name=$_GET['val'];
                if($model->save())
                    return $this->renderPartial('_ajaxGenericContent',array('text'=>$_GET['val']));
                else
                    return $this->renderPartial('_ajaxGenericContent',array('text'=>"Error al guardar"));
            }
        }
        /**
         * Images
         */
        public function actionMediaImg(){
                $criterio1=new CDbCriteria;
                $criterio1->condition="type='images'";
                $galeria=Category::model()->findAll($criterio1);

                return $this->render('mediaImg', array('galeria'=>$galeria));
        }

        public function actionViewImageGallery(){
            if(isset($_GET['id'])){
                $galeria=Category::model()->findByPk($_GET['id']);
                return $this->renderPartial('_viewImageGallery', array('item'=>$galeria));
            }
        }


        
}
