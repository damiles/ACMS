<?php

class SportEventController extends Controller
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
				'actions'=>array('index','view','dynamicProvinces','dynamicProvincesWithEvents','dynamicProvincesWithEventsWidget','searchEvents'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
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
		$model=new SportEvent;
                $model->date=  date('Y-m-d');
		if($model->save()){
			$langs=Lang::model()->findAllByAttributes(array("selected"=>1));
			foreach($langs as $i=>$item){
				$cont=new SportEventContent;
				$cont->lang=$item->idLang;
				$cont->title="Sin titulo";
				$cont->idSportEvent=$model->idSportEvent;
				if(!$cont->save()){
					$model->delete();
					$this->redirect(array('index'));
				}
			}
			$this->redirect(array('update','id'=>$model->idSportEvent));
		}else{
			//$this->redirect(array('index'));
                    $errors=$model->getErrors();
                    $error="";
                    foreach($errors as $item)
                        $error=$error.$item[0]."\n";
                    throw new CHttpException(500,'Errores:'.$error);
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

		if(isset($_POST['SportEvent']))
		{
			$model->attributes=$_POST['SportEvent'];
                        $datos=$_POST['SportEvent'];
                        $model->distanciasIds=$datos['distanciasIds'];
			if($model->save()){
                                $contents=$_POST['SportEventContent'];
                                foreach($contents as $item){
                                        $contenido=SportEventContent::model()->findbyPk(array("idSportEvent"=>$item["idSportEvent"], "lang"=>$item["lang"]));
                                        $contenido->attributes=$item;
                                        $contenido->save();
                                }
				//$this->redirect(array('view','id'=>$model->idDistance));
                                Yii::app()->user->setFlash('status','Evento guardado.');
				$this->refresh();
                        }
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
			$model=$this->loadModel($id);
                        
                        foreach($model->content as $item){
                            $item->delete();
                        }
                        
                        $model->delete();

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
		$dataProvider=new CActiveDataProvider('SportEvent');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SportEvent('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SportEvent']))
			$model->attributes=$_GET['SportEvent'];

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
		$model=SportEvent::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='sport-event-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionDynamicProvinces(){
            $datos=$_POST['SportEvent'];
            $data=ACMS::getProvinces($datos['country']);
            foreach($data as $value=>$name){
                echo CHtml::tag('option',
                        array('value'=>$value),CHtml::encode($name),true);
            }
        }
        
        public function actionDynamicProvincesWithEvents(){
            $datosP=$_POST;
            $country_code=$datosP['country'];
            
            echo '<select id="SportEvent_province" style="width: 167px; " name="province">';
            
            $datos=array();
            if(isset($country_code) && $country_code!='0'){
                $provincias=  Provincia::model()->with(array(
                    'eventos'=>array(
                    'joinType'=>'INNER JOIN',
                )))->findAll(new CDbCriteria(array('condition'=>'cod_pais="'.$country_code.'"', 'order'=>'name ASC'))); 
                
                echo CHtml::tag('option', array('value'=>0),CHtml::encode("Todas las provincias"),true);
                foreach ($provincias as $item){
                        echo CHtml::tag('option', array('value'=>$item->idProvincia),CHtml::encode($item->name),true);
                }
            }
            
            echo "</select>";
        }
		
		public function actionSearchEvents()
		{
			$condition='';
                        $with='';
                        $joinType='';
                        $together=false;
			
			if(isset($_GET['texto'])){
                            if($_GET['texto']!='Prueba')
				  $condition.=' ( title LIKE "%'.$_GET['texto'].'%" OR name LIKE "%'.$_GET['texto'].'%" OR citie LIKE "%'.$_GET['texto'].'%" )';
                                  
			 }
                         
			 if(isset($_GET['mes']))
                        {
                             if(isset($_GET['texto'])){
                                 if($_GET['texto']!='Prueba')
                                     $condition.=' AND ';
                             }
                                $condition.=' mes = '.$_GET['mes'].'';
                        }
			 if(!isset($_GET['texto']) && !isset($_GET['mes'])){
                             $condition=' fecha between DATE_SUB(NOW(), INTERVAL 1 WEEK) AND NOW()';
                         }
			 $dataProvider=new CActiveDataProvider('Resulevents',array(
							'criteria'=>array(
                            'condition'=>$condition,
                            'order'=>'mes'
                        ),
                        'pagination'=>array('pageSize'=>10),
                        ));
						
						
			$this->render('resultados',array(
			'dataProvider'=>$dataProvider,));
		}
		
        
         public function actionDynamicProvincesWithEventsWidget(){
            $datosP=$_POST;
            $country_code=$datosP['country'];
            
            echo '<select id="SportEvent_province" style="width: 122px; " name="province">';
            
            $datos=array();
            if(isset($country_code) && $country_code!='0'){
                $provincias=  Provincia::model()->with(array(
                    'eventos'=>array(
                    'joinType'=>'INNER JOIN',
                )))->findAll(new CDbCriteria(array('condition'=>'cod_pais="'.$country_code.'"', 'order'=>'name ASC'))); 
                
                echo CHtml::tag('option', array('value'=>0),CHtml::encode("Provincias"),true);
                foreach ($provincias as $item){
                        echo CHtml::tag('option', array('value'=>$item->idProvincia),CHtml::encode($item->name),true);
                }
            }
            
            echo "</select>";
        }
        
}
