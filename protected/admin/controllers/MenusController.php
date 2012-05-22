<?php

class MenusController extends Controller
{
        const PAGE_SIZE=10;
        /*const TYPE_TIT_MENU=1;
        const TYPE_TIT_APARTADO=2;
        const TYPE_CON_APARTADO=3;*/
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
				'actions'=>array('index','logout', 'update','linkForm', 'pagesForm', 'createMenu','deleteMenu'),
				'users'=>User::usernamesByRole((User::ADMIN | User::GESTOR), User::PERM_MENU),
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
	 * Pages
	 */
        public function actionPages(){
            $dataProvider=new CActiveDataProvider('Article', array(
                    'criteria'=>array(
                        'condition'=>'type="page"'
                    ),
                    'pagination'=>array(
                            'pageSize'=>self::PAGE_SIZE,
                    ),
            ));

            $this->render('pages',array(
                    'dataProvider'=>$dataProvider,
            ));
        }
        
        /**
         * Menus
         */

        /**
	 * Displays a Menu model.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Menu', array(
                        'criteria'=>array(
                            'order'=>'display_in, orden',
                            'condition'=>'parent=0'
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
	 * Create menu
	 */
	public function actionCreateMenu(){
		$model=new Menu;
		$model->type=0;
		$model->active=0;
		$model->link="";
		$model->target="_self";
		$model->access_level=0;
		$model->orden=0;
		$model->display_in=0;
		if(isset($_GET["idparent"]))
			$model->parent=$_GET["idparent"];
		else
			$model->parent=0;
		$model->editable=1;
				
		if($model->save())
		{
			$langs=Lang::model()->findAllByAttributes(array("selected"=>1));
			foreach($langs as $i=>$item){
				$cont=new MenuContent;
				$cont->lang=$item->idLang;
				$cont->title="Sin titulo";
				$cont->idMenu=$model->idMenu;
				if(!$cont->save()){
					$model->delete();
					$this->redirect(array('index'));
				}
			}
			$this->redirect(array('update','id'=>$model->idMenu));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	/**
	 * Display a updateMenu
	 */
	public function actionUpdate(){
		$model=$this->loadModelMenu();
		if(isset($_POST['Menu']))
		{
			//Save titles
			$contents=$_POST['MenuContent'];
	        foreach($contents as $item){
	            	$contenido=MenuContent::model()->findbyPk(array("idMenu"=>$item["idMenu"], "lang"=>$item["lang"]));
	                $contenido->attributes=$item;
	                $contenido->save();
	        }
	        
	        //Get other menu data to save
			$model->attributes=$_POST['Menu'];
			switch(intval($model->type)){
				case ACMS_LINK_SITE:
					//if($model->link=='page'){
						//$model->params="id=".$model->params;
						$model->params="".$model->params;
					//}else{
					//	$model->params="";
					//}
					break;
				case ACMS_LINK_EXTERNAL:
					$model->params="";
					break;
			}
			if($model->save())
				$this->redirect(array('update','id'=>$model->idMenu));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	private function deleteMenuRecursive($itemMenu){
		foreach($itemMenu->content as $item){
			$item->delete();
		}
		//for each submenu we delete it calling this function recursive.
		foreach($itemMenu->menus as $item){
			$this->deleteMenuRecursive($item);
		}
		
		$itemMenu->delete();
	}
	
	public function actionDeleteMenu(){
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=$this->loadModelMenu();
			$this->deleteMenuRecursive($model);
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		
	}
	
        public function loadModelMenu()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Menu::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	public function actionLinkForm(){
		$model=new Menu;
		if(isset($_POST['Menu']))
		{
			$model->attributes=$_POST['Menu'];
		}
		$this->renderPartial('_linkFormAjax', array('model'=>$model), false, true);
	}

	public function actionPagesForm(){
	$model=new Menu;
		if(isset($_POST['Menu']))
		{
			$model->attributes=$_POST['Menu'];
		}
		$this->renderPartial('_pageFormAjax',array('model'=>$model), false, true);
	}

        
}
