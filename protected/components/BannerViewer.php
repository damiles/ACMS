<?php 

class BannerViewer extends CWidget
{
	/*
	 * Sections:
	 * 0: Home
	 * 1: Home subs
	 * 2: Column 1
	 */
	public $section=0;
	/*
	 * Types:
	 * 0: List
	 * 1: Transition
	 */
	public $type=0;
        
        public $limit=-1;

	public $customClass='banner';
        
        public $tags=array();
        
	public function init(){

	}

        public function run()
	{
            $req=Yii::app()->getRequest();
            $cond='published=true and date <=NOW() and display_in='.$this->section;
            //Estos banners siempre deben aparecer por activar el attributo 
	    $crit=new CDbCriteria;
            $crit->condition=$cond;//.' and always_present=1';
            $crit->order="orden";
            //$crit->limit=$this->limit;
            $banners=Banner::model()->findAll($crit);

            foreach($banners as $banner){
                $banner->calculateProb($this->tags, $req->getUrl());
            }
            $banners=ACMS::sortBanners($banners);
            

            switch($this->type){
                    case 0:
                            $this->render("bannerList", array("banners"=>$banners,"customClass"=>$this->customClass, 'limit'=>$this->limit));	
                        
                            break;
                    case 1:
                            $this->render("bannerTransition", array("banners"=>$banners, "customClass"=>$this->customClass));	
                            break;
            }
	}
}

