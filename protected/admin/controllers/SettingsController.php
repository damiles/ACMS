<?php

class SettingsController extends Controller
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
				'actions'=>array('index','logout','updateLang','updateDefaultLang'),
				'users'=>User::usernamesByRole((User::ADMIN | User::GESTOR), User::PERM_PREFERENCIAS),
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
        $languages=Lang::model()->findAll();
        $settings=Settings::model()->findAll();
        
		$this->render('index',array('lang'=>$languages, 'settings'=>$settings));
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

        
        public function actionUpdateLang(){
            $languages=Lang::model()->findAll();
            $numErr=0;
            if(isset($_POST['lang'])){
                $langs=$_POST['lang'];
                foreach($languages as $lang){
                	$beforeState=$lang->selected;
                    $lang->selected=0;
                    foreach($langs as $sel){
                        if($sel==$lang->idLang)
                                $lang->selected=1;
                    }
                    if($lang->selected!=$beforeState){
                    	//Two posibilities
                    	//if now is selected (1) then we have to create
                    	//the rows for all articles with this new language
                    	//In other case  (value 0) we have to delete
                    	//all rows with this language
                    	if($lang->selected==1){
                    		//Create all new articles
                    		$articulos=Article::model()->findAll();
                    		foreach($articulos as $item){
                    			$cont=new ArticleContent;
                    			$cont->idArticle=$item->idArticle;
                    			$cont->lang=$lang->idLang;
                    			$cont->title="Not Set";
                    			$cont->text="No Content";
                    			$cont->save();
                    			$err=$cont->getErrors();
                    			$i=0;
                    		}
                    		//Create all new menus
                    		$menus=Menu::model()->findAll();
                    		foreach($menus as $item){
                    			$cont=new MenuContent;
                    			$cont->title="Not set";
                    			$cont->lang=$lang->idLang;
                    			$cont->idMenu=$item->idMenu;
                    			$cont->save();
                    		}
                    	}else{
                    		ArticleContent::model()->deleteAllByAttributes(array("lang"=>$lang->idLang));
                    		MenuContent::model()->deleteAllByAttributes(array("lang"=>$lang->idLang));
                    	}
                    }
                    $lang->save();

                }
                
                //Set the selected langs as true;
                /**/

            }else{
                //Posiblemente no haya ninguno seleccionado!
            }
            
            $this->renderPartial('_ajaxLang', array('lang'=>$languages) , false, true);
        }

        public function actionUpdateDefaultLang(){
            $languages=Lang::model()->findAll();
            if(isset($_POST['default'])){
                $langs=$_POST['lang'];
                foreach($languages as $lang){
                    $lang->default=0;
                    if($_POST['default']==$lang->idLang)
                                $lang->default=1;
                    
                    $lang->save();
                }

            }else{
                //Posiblemente no haya ninguno seleccionado!
            }

            $this->renderPartial('_ajaxLangList', array('lang'=>$languages) , false, true);
        }
}
