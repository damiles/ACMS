<?php

class CommentController extends Controller
{
	
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
				'actions'=>array('index','view','create','update', 'admin', 'delete','aprove', 'unaprove','spam','reply'),
				'users'=>User::usernamesByRole((User::ADMIN | User::GESTOR), User::PERM_COMMENTS),
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
		$model=new Comment;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Comment']))
		{
                    $model->attributes=$_POST['Comment'];
		
                   
                    if($model->save()){
                        $dataProvider=new CActiveDataProvider('Comment');
			$this->redirect(array('index'),array(
                                'dataProvider'=>$dataProvider,
                                'updated'=>'1',
                                'message'=>"Comentario introducido"
                                ));
                    }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
        public function actionReply()
	{
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $updated=0;
                $comentario="Error al introducir el comentario";
		if(isset($_POST['id']))
		{
                    $model=new Comment;
                    $model->parent=$_POST['id'];
                    $model->content=$_POST['comment'];
                    $model->Lang_idLang="es";
                    $model->Article_idArticle=$_POST['idArticle'];
                    $model->approved=Comment::STATUS_APPROVED;
		
                    $user=User::model()->find('idUser=?', array(Yii::app()->user->getId()));
                    $model->author=$user->name." ".$user->surnames;
                    $model->email=$user->email;

                    
                    
                    if($model->save()){
                        $updated=1;
                        $comentario="Rerspuesta introducida";
                        
                    }
                    
		}
                $dataProvider = new CActiveDataProvider('Comment', array(
                    'criteria' => array(
                        'order' => 'date DESC',
                    )
                ));
                $this->render('index', array(
                    'dataProvider' => $dataProvider,
                    'updated'=>$updated,
                    'message'=>$comentario
                ));
	}

        public function actionAprove($id){
            $model=$this->loadModel($id);
            $model->approved=Comment::STATUS_APPROVED;
            $model->save();
            
            $dataProvider=new CActiveDataProvider('Comment');
            $this->render('index',array(
                    'dataProvider'=>$dataProvider,
                    'updated'=>'1',
                    'message'=>"Comentario aprovado"
            ));
        }
        
        public function actionUnaprove($id){
            $model=$this->loadModel($id);
            $model->approved=Comment::STATUS_PENDING;
            $model->save();
            
            $dataProvider=new CActiveDataProvider('Comment');
            $this->render('index',array(
                    'dataProvider'=>$dataProvider,
                    'updated'=>'1',
                    'message'=>"Comentario desaprobado"
            ));
        }
        
        public function actionSpam($id){
            $model=$this->loadModel($id);
            $model->approved=Comment::STATUS_SPAMMED;
            $model->karma=0;
            $model->save();
            
            $dataProvider=new CActiveDataProvider('Comment');
            $this->render('index',array(
                    'dataProvider'=>$dataProvider,
                    'updated'=>'1',
                    'message'=>"Comentario catalogado como spam"
            ));
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

		if(isset($_POST['Comment']))
		{
			$model->attributes=$_POST['Comment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idComment));
		}

		$this->render('update',array(
			'model'=>$model,
		));
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
                            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
                            //$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Comment',array(
                    'criteria'=>array(
                        'order'=>'date DESC',
                    )
                ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Comment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Comment']))
			$model->attributes=$_GET['Comment'];

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
		$model=Comment::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
