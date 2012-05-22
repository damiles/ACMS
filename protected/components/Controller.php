<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();//Path
        public $portlets=array();//Portlets to add in left column
        public $portlets2=array();//Portlets to add in right column

        function init()
        {
            parent::init();
            $app = Yii::app();
            if (isset($_GET['_lang']))
            {
                $app->language = $_GET['_lang'];
                $app->session['_lang'] = $app->language;
            }
            else if (isset($app->session['_lang']))
            {
                $app->language = $app->session['_lang'];
            }else{
                $app->language = ACMS::getDefaultLang()->idLang;
                $app->session['_lang'] = $app->language;
	    }
		ACMS::load();
        }

}
