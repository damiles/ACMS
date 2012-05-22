<?php
class LangSel extends CWidget
{
	public function init()
	{
		
	}
	
	public function run()
	{
		$currentLang=Yii::app()->language;
		$this->render("langView", array("currentLang"=>$currentLang));	
	}
}
?>