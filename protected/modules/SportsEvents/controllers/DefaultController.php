<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
            
            $condition=' date > NOW()';
            $with='';
            $joinType='';
            $together=false;
            if(isset($_GET['q'])){
                if($_GET['q']=='d'){
                    $condition='date = "'.$_GET['date'].'"';
                }
                if($_GET['q']=='s'){
                    $condition='';
                    //Search condition
                    
                    if(isset ($_GET['distance']) && $_GET['distance']!=''){
                        $with=array('distances');
                        $together=true;
                        //$joinType='INNER JOIN';
                        $condition.='distances.idDistance='.$_GET['distance'].' AND ';
                    }

                    if(isset($_GET['country']) && $_GET['country']!=''){
                        $condition.=' country="'.$_GET['country'].'" AND ';
                        if(isset($_GET['province']) && $_GET['province']!='' && $_GET['province']!='0'){
                            $condition.=' province='.$_GET['province']. " AND ";
                        }
                    }

                    if(isset($_GET['brand']) && $_GET['brand']!=''){
                        $condition.=' SportBrand_idSportBrand="'.$_GET['brand'].'" AND ';
                    }

                    if(isset($_GET['from']) && $_GET['from']!=''){
                        $fa=explode("-",$_GET['from']);
                        $f=$fa[2]."-".$fa[1]."-".$fa[0];
                        $condition.=' date >= "'.$f. '" AND ';
                    }

                    if(isset($_GET['to']) && $_GET['to']!=''){
                        $fa=explode("-",$_GET['to']);
                        $f=$fa[2]."-".$fa[1]."-".$fa[0];
                        $condition.=' date <= "'.$f. '" AND ';
                    }
                    //Para finalizar los ANDS
                    $condition.=" 1 ";

                }
            }
            
                $dataProvider=new CActiveDataProvider('SportEvent',array(
                        'criteria'=>array(
                            'condition'=>$condition,
                            'order'=>'date ASC',
                            'with'=>$with,
                            'join'=>$joinType,
                            'together'=>$together,
                        ),
                        'pagination'=>array('pageSize'=>10),
                        ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
        
        
        public function actionAjaxEvents(){
            
            $crit=new CDbCriteria;
            $crit->condition="date >= NOW() - INTERVAL 6 MONTH  and date <= ( NOW()  + INTERVAL 6 MONTH)";
            $crit->order="date";
            $eventos=SportEvent::model()->findAll($crit);
            
            echo '[';
            $dates="";
            foreach($eventos as $evento){
                    $converteddate =  date("n,j,Y",strtotime($evento->date));
                    $dates .= '['.$converteddate.'],';

            }
            $dates =rtrim($dates, ",");
            echo $dates;
            echo ']';
            
        }
        
        
        
        public function actionAjaxDayEvents(){
            if(isset ($_POST['date'])){
                $condition='date = "'.$_POST['date'].'"';
                $crit=  new CDbCriteria;
                $crit->condition=$condition;
                $crit->limit=5;
                $eventos=SportEvent::model()->findAll($crit);
                $this->renderPartial("_widgetDayCalendars",array('eventos'=>$eventos,'date'=>$_POST['date']));
            }
        }
}