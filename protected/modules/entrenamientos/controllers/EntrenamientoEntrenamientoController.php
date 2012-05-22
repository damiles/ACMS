<?php

class EntrenamientoEntrenamientoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $menu;

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
				'actions'=>array('index','view','dynamicEntrenesWithModalidad','dynamicPlanWithModalidad','dynamicSemanasWithEntrene','dynamicDiaWithSemana'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
		$model=new EntrenamientoEntrenamiento;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EntrenamientoEntrenamiento']))
		{
			$model->attributes=$_POST['EntrenamientoEntrenamiento'];
			if($model->save()) {
                            for ($i=0;$i<$model->nsemanas;$i++) {
                                $semana = new EntrenamientoSemana();
                                $semana->identrenamiento = $model->identrenamiento;
                                $semana->nsemana = $i+1;
                                $semana->save();
                            }
				$this->redirect(array('view','id'=>$model->identrenamiento));
                        }
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['EntrenamientoEntrenamiento']))
		{
			$model->attributes=$_POST['EntrenamientoEntrenamiento'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->identrenamiento));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
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
		$dataProvider=new CActiveDataProvider('EntrenamientoEntrenamiento');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EntrenamientoEntrenamiento('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EntrenamientoEntrenamiento']))
			$model->attributes=$_GET['EntrenamientoEntrenamiento'];

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
		$model=EntrenamientoEntrenamiento::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

        public function actionDynamicEntrenesWithModalidad(){
            $datosP=$_POST;
            $modalidad_code=$datosP['modalidad'];

            echo '<select id="planEntrenamiento" style="width: 167px; " name="planEntrenamiento">';

            $datos=array();
            if(isset($modalidad_code) && $modalidad_code!='0'){
                $entrenos=  EntrenamientoEntrenamiento::model()->findAll(new CDbCriteria(array('condition'=>'idmodalidad="'.$modalidad_code.'"', 'order'=>'identrenamiento ASC')));
                echo CHtml::tag('option', array('value'=>0),CHtml::encode("Todos los planes"),true);
                foreach ($entrenos as $item){
                        echo CHtml::tag('option', array('value'=>$item->identrenamiento),CHtml::encode($item->nsemanas." semanas -> ".$item->nhorassemana." horas/semana"),true);
                }
            }

            echo "</select>";
        }
        public function getConcatened()
	{
		return $this->nsemanas.' semanas';
	}
        public function actionDynamicPlanWithModalidad() {
            $datosP=$_POST;
            $modalidad_code=$datosP['modalidad'];           
            $crit=new CDbCriteria(array('condition'=>'idmodalidad="'.$modalidad_code.'"', 'order'=>'identrenamiento ASC'));
            $planes=EntrenamientoEntrenamiento::model()->findAll($crit);

            echo CHtml::dropDownList(
                    "planEntrenamiento",
                    null,
                    CHtml::listData($planes, "identrenamiento", "name"),
                    array(
                        "empty"=>"Selecciona Entrenamiento",
                        "style"=>"width:153px;",
                        "onchange"=>"jQuery('#Entrenamientos_semana_box span').html('Cargando Semanas del Plan');jQuery('#Entrenamientos_semana_box .jqTransformSelectOpen').addClass('select_ajax_loader');jQuery.ajax({'type':'POST','url':'".CHtml::normalizeUrl('index.php?r=/entrenamientos/EntrenamientoEntrenamiento/dynamicSemanasWithEntrene')."','cache':false,'data':jQuery(this).parents('form').serialize(),'success':function(html){jQuery('#Entrenamientos_semana_box').html(html); jQuery('#Entrenamientos_semana_box').removeClass('jqtransformdone'); jQuery('#Entrenamientos_semana_box').jqTransform();}});",
                        ));
        }

        public function actionDynamicSemanasWithEntrene(){
            $datosP=$_POST;
            $plan_code=$datosP['planEntrenamiento'];
            $crit=new CDbCriteria(array('condition'=>'identrenamiento="'.$plan_code.'"', 'order'=>'idsemana ASC'));
            $semanas=EntrenamientoSemana::model()->findAll($crit);


            echo CHtml::dropDownList(
                    "idSemana",
                    null,
                    CHtml::listData($semanas, "idsemana", "nsemana"),
                    array(
                        "empty"=>"Selecciona Semana",
                        "style"=>"width:153px;",
                        "onchange"=>"jQuery('#Entrenamientos_dia_box span').html('Cargando Dias de la Semana');jQuery('#Entrenamientos_dia_box .jqTransformSelectOpen').addClass('select_ajax_loader');jQuery.ajax({'type':'POST','url':'".CHtml::normalizeUrl('index.php?r=/entrenamientos/EntrenamientoEntrenamiento/dynamicDiaWithSemana')."','cache':false,'data':jQuery(this).parents('form').serialize(),'success':function(html){jQuery('#Entrenamientos_dia_box').html(html); jQuery('#Entrenamientos_dia_box').removeClass('jqtransformdone'); jQuery('#Entrenamientos_dia_box').jqTransform();}});",
                        ));
        }

        public function actionDynamicDiaWithSemana(){
            $datosP=$_POST;
            $semana_code=$datosP['idSemana'];
            $crit=new CDbCriteria(array('condition'=>'idsemana="'.$semana_code.'"', 'order'=>'iddia ASC'));
            $semanas=EntrenamientoDia::model()->findAll($crit);
            echo CHtml::dropDownList(
                    "EntrenamientoActividad[iddia]",
                    null,
                    CHtml::listData($semanas, "iddia", "ndia"),
                    array(
                        "empty"=>"Selecciona Dia",
                        "style"=>"width:153px;",                        
                        ));
        }
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='entrenamiento-entrenamiento-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
