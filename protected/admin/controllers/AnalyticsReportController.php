<?php

class AnalyticsReportController extends Controller
{
	
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
				'actions'=>array('index','logout', 'reportDays'),
				'users'=>User::usernamesByRole((User::ADMIN | User::GESTOR)),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $languages=Lang::model()->findAll();
        $settings=Settings::model()->findAll();
        
		$this->render('index',array('lang'=>$languages, 'settings'=>$settings));
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
	
	public function actionReportDays(){
		//Create the output for report
    	try {
			// create an instance of the GoogleAnalytics class using your own Google {email} and {password}
			$ga = new GoogleAnalytics(ACMS::getAnalyticsUser(),ACMS::getAnalyticsPass());
		 
			// set the Google Analytics profile you want to access - format is 'ga:123456';
			$ga->setProfile('ga:'.ACMS::getAnalyticsId());
		 
			// set the date range we want for the report - format is YYYY-MM-DD
			$date= date("Y-m-d");
			$prevDate= strtotime('-1 month', strtotime( $date ));
			$prevDate= date("Y-m-d", $prevDate);
			$ga->setDateRange($prevDate,$date);
		 
			// get the report for date and country filtered by Australia, showing pageviews and visits
			$report = $ga->getReport(
				array('dimensions'=>urlencode('ga:date'),
					'metrics'=>urlencode('ga:pageviews,ga:visits'),
					'sort'=>'ga:date'
					)
				);
			
		 	$this->renderPartial('_ajaxReport', array('report'=>$report) , false, true);
		} catch (Exception $e) { 
			echo 'Error: ' . $e->getMessage(); 
		}
				
	}
	
}
