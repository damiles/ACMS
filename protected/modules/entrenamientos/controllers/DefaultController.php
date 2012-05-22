<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
                $modalidad=null;
                $entrenamiento=null;
                $semanaActual=null;
                $condition='';
                $with='';
                $joinType='';
                $together=false;
                if(!isset($_GET['modalidad']) && !isset($_GET['planEntrenamiento']))
                {
                        $condition='idsemana<0';
                }
                else {
                    $condition='identrenamiento='.$_GET['planEntrenamiento'];
                }
                $ps=1;
                if(isset($_GET['print']))
                    $ps=200;
                $dataProvider=new CActiveDataProvider('EntrenamientoSemana',array(
                'criteria'=>array(
                    'condition'=>$condition,
                    'order'=>'',
                    'with'=>$with,
                    'join'=>$joinType,
                    'together'=>$together,
                ),
                'pagination'=>array('pageSize'=>$ps),
                ));
					
				
		$error="";	
                if(isset($_GET['modalidad'])){
                    if($_GET['modalidad']==''){
                        $error='<br><span class="error">Selecciona una modalidad y un plan de entrenamiento</span>';
                    }else
                        $modalidad = EntrenamientoModalidad::model()->findByPk($_GET['modalidad']);
                }
                if(isset($_GET['idsemana'])){
                    $semanaActual = EntrenamientoSemana::model()->findByPk($_GET['idsemana']);
                }
                if(isset($_GET['planEntrenamiento'])){
                    if($_GET['planEntrenamiento']==''){
                        $error='<br><span class="error">Selecciona una modalidad y un plan de entrenamiento</span>';
                    }else
                        $entrenamiento = EntrenamientoEntrenamiento::model()->findByPk($_GET['planEntrenamiento']);
                }
                
                if(isset($_GET['print'])){
                    $this->render('print',array(
                            'dataProvider'=>$dataProvider,'modalidad'=>$modalidad,'entrenamiento'=>$entrenamiento,'error'=>$error
                    ));
                }else{
                    $this->render('index',array(
                            'dataProvider'=>$dataProvider,'modalidad'=>$modalidad,'entrenamiento'=>$entrenamiento,'error'=>$error
                    ));
                }
	}
}