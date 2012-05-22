<?php

class TrucoCategoriaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
        public $menu;
        
        public function actions() {
        return array(
            'elfinder.' => 'application.widgets.elFinder.FinderWidget',
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','elfinder.connector'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new TrucoCategoria;
                if($model->save()){
			
			$langs=Lang::model()->findAllByAttributes(array("selected"=>1));
			foreach($langs as $i=>$item){
				$cont=new TrucoCategoriaContent;
				$cont->lang=$item->idLang;
				$cont->title="Sin titulo";
				$cont->idTrucoCategoria=$model->idTrucoCategoria;
				if(!$cont->save()){
					$model->delete();
					$this->redirect(array('index'));
				}
			}
			$this->redirect(array('update','id'=>$model->idTrucoCategoria));
		}else{
			$this->redirect(array('index'), array('message'=>"Error al crear el truco"));
		}
		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                if(isset($_POST['TrucoCategoria']))
		{
			$contents=$_POST['TrucoCategoriaContent'];
			foreach($contents as $item){
				$contenido=TrucoCategoriaContent::model()->findbyPk(array("idTrucoCategoria"=>$item["idTrucoCategoria"], "lang"=>$item["lang"]));
				$contenido->attributes=$item;
				$contenido->save();
			}
			$model->attributes=$_POST['TrucoCategoria'];
			if($model->save())
				$this->redirect(array('update','id'=>$model->idTrucoCategoria,'updated'=>'1'));
		}
		$updated=0;
		if(isset($_GET["updated"]))
			$updated=$_GET["updated"];
		if($updated==0)
			$this->render('update',array('model'=>$model,));
		else if($updated=="1")
			$this->render('update',array('model'=>$model,'message'=>"Truco guardado"));
                
		
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('TrucoCategoria');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TrucoCategoria('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TrucoCategoria']))
			$model->attributes=$_GET['TrucoCategoria'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=TrucoCategoria::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='truco-categoria-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
