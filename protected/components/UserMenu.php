<?php

Yii::import('zii.widgets.CMenu');

class UserMenu extends CMenu
{
	public $parent=0;
	public $recursive=false;
	public $display_in=ACMS_MENU_PRINCIPAL;
	public $style="";
	public $style_sub="";
	public $submenu=false;
	public $elementosActivos;
        public $defaultMenu=1;
        public function init()
	{
		$this->elementosActivos= array();
		$this->activateParents=true;
		$this->activeCssClass="active";
		$selectedMenu=(isset($_GET['idm']))?$_GET['idm']:$this->defaultMenu;
		$this->getElementosActivos($selectedMenu);
		if($this->submenu)
			$this->items=$this->createSubMenu();
		else
			$this->items=$this->createMenu($this->parent,$this->recursive);
		$this->htmlOptions=array('class'=>$this->style);
		//$this->submenuHtmlOptions=array('class'=>$this->style_sub);
		//$this->title=CHtml::encode(Yii::app()->user->name);
		parent::init();
	}


	private function getElementosActivos($selectedMenu){
		$menu=Menu::model()->findByPk(array($selectedMenu));
		if(isset($menu)){
			while($menu->parent!=0){
				array_push($this->elementosActivos, $menu->idMenu);
				$menu=$menu->parent0;
			}
			array_push($this->elementosActivos, $menu->idMenu);
		}
	}

	private function createSubMenu(){
		$mymenu=array();
		
		$menu=Menu::model()->findByPk(array($this->elementosActivos[count($this->elementosActivos)-1]));
		
		$mymenu=$this->createMenu($menu->idMenu, true);
		
		return $mymenu;

	}

	private function createMenu($myparent,$rec=false){
		//Select parent menu where parent are 0
		//Usuario::model()->find('user=?', array($this->username));
		$mymenu=array();
		$menu=Menu::model()->findAll('parent=? and display_in=? and active=true order by orden', array($myparent,$this->display_in));


		$route= $this->getController()->getRoute();
		$this->items=array();
		foreach($menu as $n=>$itemMenu){
			$url=ACMS::getMenuLink($itemMenu);
			//Check type (external or no)
			//if($itemMenu->type==ACMS_LINK_EXTERNAL){
			//	$item=array('label'=>ACMS::getTitle($itemMenu), 'url'=>$url, 'linkOptions'=>array('class'=>$itemMenu->css,'target'=>$itemMenu->target));//$itemMenu->title
			//}else{
				//$params=$this->parseParams($itemMenu, $itemMenu->params);
				if($rec){
					$subs=$this->createMenu($itemMenu->idMenu,$rec);
					if(count($subs)>0)
						$item=array('label'=>ACMS::getTitle($itemMenu), 'url'=>$url,'items'=>$subs, 'itemOptions'=>array('class'=>$this->style_sub), 'linkOptions'=>array('class'=>$itemMenu->css,'target'=>$itemMenu->target));//$itemMenu->title
					else
						$item=array('label'=>ACMS::getTitle($itemMenu), 'url'=>$url, 'linkOptions'=>array('class'=>$itemMenu->css,'target'=>$itemMenu->target));//$itemMenu->title
				}else{
					$item=array('label'=>ACMS::getTitle($itemMenu), 'url'=>$url, 'linkOptions'=>array('class'=>$itemMenu->css,'target'=>$itemMenu->target));//$itemMenu->title
				}
			//}
			//Check if is private or no

			if($itemMenu->access_level==ACMS_PRIVATE){
				if(Yii::app()->user->isGuest)
				{
					$item["visible"]=false;
				}else{
					$user=User::model()->find('idUser=?', array(Yii::app()->user->getId()));
					$item["visible"]=$user->checkRole(User::ADMIN | User::GESTOR | User::USUARIO_WEB);
				}
				$item["visible"]=!Yii::app()->user->isGuest;
			}
			if($itemMenu->access_level==ACMS_ONLYPUBLIC)
				$item["visible"]=Yii::app()->user->isGuest;
			
			//Add identifier paramenter
			$item["id"]=$itemMenu->idMenu;
			//Add new item
			array_push($mymenu,$item);
		}
		return $mymenu;
	}



	public function run(){
		$this->renderMenu($this->items);
	}

	protected function isItemActive($item,$route){
		//if(isset($_GET["idm"])){
			/*$selMen=$_GET["idm"];
			if(is_array($selMen)){
				if(in_array($item['id'], $selMen))
					return true;
			}else{
				if($item['id']==$selMen)
					return true;
			}*/	
			if(in_array($item['id'], $this->elementosActivos))
				return true;
		/*}else{
			if($item['url']['idm']=="1")
				return true;
		}*/
		return false;
	}

}
