<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
           $dataProvider=new CActiveDataProvider('TrucoCategoria', array(
					'pagination'=>array(
						'pageSize'=>false,
						),
               ));
		$this->render('index',array('dataProvider'=>$dataProvider));
	}
}