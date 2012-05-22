<?php

class NewsController extends Controller
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
					'actions'=>array('index','logout','updateNews','createNews','deleteNews', 'addCategory'),
					'users'=>User::usernamesByRole((User::ADMIN | User::GESTOR), User::PERM_NOTICIAS),
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
                $condicion='type="news" ';
               if(isset ($_GET['cat'])){
                   if($_GET['cat']!='')
                    $condicion.=' and category='.$_GET['cat'];
               }
                $dataProvider=new CActiveDataProvider('Article', array(
					'criteria'=>array(
						'condition'=>$condicion,
                                                'order'=>'idArticle DESC'
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
	public function actionCreateNews()
	{
		$model=new Article;
		$model->type="news";
		$model->author=Yii::app()->user->id;
		$model->hits=0;
		$model->published=0;
		$model->date=date('Y-m-d');

		if($model->save()){
			$langs=Lang::model()->findAllByAttributes(array("selected"=>1));
			foreach($langs as $i=>$item){
				$cont=new ArticleContent;
				$cont->lang=$item->idLang;
				$cont->title="Sin titulo";
				$cont->text="Contenido de ejemplo";
				$cont->idArticle=$model->idArticle;
				if(!$cont->save()){
					$model->delete();
					$this->redirect(array('index'));
				}
			}
			$this->redirect(array('updateNews','id'=>$model->idArticle));
		}else{
			$this->redirect(array('index'));
		}

	}



	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdateNews()
	{
		$model=$this->loadModelArticle();
		if(isset($_POST['Article']))
		{
			$contents=$_POST['ArticleContent'];
			foreach($contents as $item){
				$contenido=ArticleContent::model()->findbyPk(array("idArticle"=>$item["idArticle"], "lang"=>$item["lang"]));
				$contenido->attributes=$item;
				$contenido->save();
			}
			$model->attributes=$_POST['Article'];
                        
			if($model->save())
				$this->redirect(array('updateNews','id'=>$model->idArticle,'updated'=>'1'));
		}
		$updated=0;
		if(isset($_GET["updated"]))
			$updated=$_GET["updated"];
		if($updated==0)
			$this->render('updateNews',array('model'=>$model,));
		else if($updated=="1")
			$this->render('updateNews',array('model'=>$model,'messageOk'=>"Noticia guardada"));
	}
	/**
	 * Delete a particular News
	 */
	public function actionDeleteNews()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model=$this->loadModelArticle();
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
	public function loadModelArticle()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Article::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}






}
