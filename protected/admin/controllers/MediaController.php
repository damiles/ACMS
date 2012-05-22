<?php

class MediaController extends Controller
{
	const PAGE_SIZE=10;
	const TYPE_TIT_MENU=1;
	const TYPE_TIT_APARTADO=2;
	const TYPE_CON_APARTADO=3;
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
					'actions'=>array('index','logout','newCategoryAjax',
						'viewImageGallery','viewDocumentGallery', 'updateCategory', 'uploadFile', 'download', 'deleteFile','imageList', '_ajaxGenericContent', 'deleteCategory' ),
					'users'=>User::usernamesByRole((User::ADMIN | User::GESTOR), (User::PERM_IMAGENES | User::PERM_DOCUMENTOS)),
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

	public function actionDeleteCategory(){
		if(isset($_GET['idCat']) && isset($_GET['type'])){
			$model=Category::model()->findByPk($_GET['idCat']);
			foreach($model->files as $file){
				$this->deleteFile($file->url);
			}
			$model->delete();	

			//Volvemos a la pagina
			$criterio1=new CDbCriteria;
			$criterio1->condition="type='".$_GET['type']."'";
			$galeria=Category::model()->findAll($criterio1);

			return $this->render('index', array('galeria'=>$galeria));
		}else{
			throw new CHttpException(404,'The requested page does not exist.');
		}

	}
	/**
	 * Images
	 */
	public function actionIndex(){
		if(isset($_GET["type"])){ 
			$criterio1=new CDbCriteria;
			$criterio1->condition="type='".$_GET['type']."'";
			$galeria=Category::model()->findAll($criterio1);

			return $this->render('index', array('galeria'=>$galeria));
		}else{
			throw new CHttpException(404,'The requested page does not exist.');
		}
	}

	public function actionViewImageGallery(){
		if(isset($_GET['id'])){
			$galeria=Category::model()->findByPk($_GET['id']);
			
			$criterio1=new CDbCriteria;
			$criterio1->condition="MyCategory=".$_GET['id'];
			/*$dataProvider=new CActiveDataProvider('File',
				array(
				'criteria'=>$criterio1 ,
				 'pagination'=>array(
					'pageSize'=>80,
				    ),));
			*/

			$model=new File('search');
			$model->unsetAttributes();  // clear any default values

			if(isset($_GET['File']))
				$model->attributes=$_GET['File'];			

			if(isset($_GET['id']))
				$model->MyCategory=$_GET['id'];
			

			return $this->renderPartial('_viewImageGallery', array('item'=>$galeria, 'model'=>$model),false,true);
		}
	}

	public function actionViewDocumentGallery(){
		if(isset($_GET['id'])){
			$galeria=Category::model()->findByPk($_GET['id']);
			return $this->renderPartial('_viewDocumentGallery', array('item'=>$galeria));
		}
	}

	/**
	 * Creates a new archivo.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	public function actionUploadFile()
	{
		ini_set("memory_limit","120M");
		$archivo=new File;
		if(isset($_POST['File']))
		{
			$archivo->attributes=$_POST['File'];

			$myfile=CUploadedFile::getInstance($archivo, 'url');
			$fileNewName=date("Ymdhis");
			if (file_exists($myfile->getTempName())) {
				$archivo->url=$fileNewName.".".$myfile->getExtensionName();
			}
			$archivo->name=$myfile->getName();
			$archivo->date=date("Y-m-d h:i:s");
			$isGalery=false;
			$idCateg=$archivo->MyCategory;
			$cat=Category::model()->findByPk($idCateg);
			if($cat->type=='images')
				$isGalery=true;

			if($archivo->save()){
				if (file_exists($myfile->getTempName())){
					$myfile->saveAs(Yii::app()->params['upload'].$fileNewName.".".$myfile->getExtensionName());
					if($isGalery){
						$image = Yii::app()->image->load(Yii::app()->params['upload'].$fileNewName.".".$myfile->getExtensionName());
						$aspect=$image->width/$image->height;
						if($aspect>1)
							$image->resize(75, 75, Image::HEIGHT)->crop(75,75,'center','center');
						else
							$image->resize(75, 75, Image::WIDTH)->crop(75,75,'center','center');

						$image->save(Yii::app()->params['upload'].$fileNewName."_low.".$myfile->getExtensionName());

						$image1 = Yii::app()->image->load(Yii::app()->params['upload'].$fileNewName.".".$myfile->getExtensionName());
						$image1->resize(240, 159)->crop(240,159,'center','center');
						$image1->save(Yii::app()->params['upload'].$fileNewName."_med.".$myfile->getExtensionName());
					}
				}



				if(isset($_GET["type"])){ 
					$criterio1=new CDbCriteria;
					$criterio1->condition="type='".$_GET['type']."'";
					$galeria=Category::model()->findAll($criterio1);

					return $this->renderPartial('_ajaxGenericContent',array('text'=>'<script>window.top.window.updateActualTab();</script>'));

					//return $this->render('index', array('galeria'=>$galeria));
				}else{
					throw new CHttpException(404,'The requested page does not exist.');
				}


			}
		}
		//$this->renderPartial('_viewImageGallery', array('item'=>$galeria));
	}

	/**
	 * Creates a new archivo.
	 * If creation is successful, the browser will be redirected to the 'show' page.
	 */
	private function deleteFile($idurl){
		$parts=explode(".",$idurl);
		$file_low=$parts[0]."_low.".$parts[1];
		$file_med=$parts[0]."_med.".$parts[1];
		$file=File::model()->findByAttributes(array('url'=>$idurl));

		unlink(Yii::app()->params['upload'].$idurl);
		if($file->myCategory->type=="images"){
			unlink(Yii::app()->params['upload'].$file_low);
			unlink(Yii::app()->params['upload'].$file_med);
		}
		$file->delete();
	}

	public function actionDeleteFile()
	{
		ini_set("memory_limit","120M");
		if(isset($_POST['id']))
		{
			$this->deleteFile($_POST['id']);	
		}
		$this->renderPartial('_ajaxGenericContent', array('text'=>"Ok"));
	}

	/**
	 *
	 */
	public function actionDownload()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$descarga=$_GET['descarga'];

		$this->render('download', array('descarga'=>$descarga));
	}

	/**
	 * Funcion que extrae lista de imagenes para el editor de texto. Formato JS
	 */
	public function actionImageList(){
		$criterio1=new CDbCriteria;
		$criterio1->condition="type='images'";
		$galeria=Category::model()->findAll($criterio1);
		$this->renderPartial('imagelist',array('galeria'=>$galeria));
	}
}

