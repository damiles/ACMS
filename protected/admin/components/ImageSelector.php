<?php 

class ImageSelector extends CWidget
{
	
	public $model=null;
	public $object='';

	public function init(){
		 $this->registerClientScript();
		parent::init();
	}

	protected function registerClientScript()
	{
		// ...publish CSS or JavaScript file here...
		$cs=Yii::app()->clientScript;
		$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/ImageSelector.js', CClientScript::POS_HEAD);
	}

        public function run()
	{
		if(isset($this->model)){
		    echo CHtml::activeHiddenField($this->model,$this->object);
		    $imagen='upload/noimage.png';
			if(isset($this->model[$this->object])){
				if($this->model[$this->object]!=''){
					$imagen=$this->model[$this->object];
					$extension=substr(strrchr($imagen,'.'),1);
					$filename=substr($imagen,0,strrpos($imagen,'.'));
					$imagen=$filename."_low.".$extension;
				}
			}
				
		    echo "<div ><img style=' margin:4px; border:4px #ccc solid; border-radius:4px;' id='img_".$this->model->tableName()."_".$this->object."' src='".$imagen."' /></div>";
		    echo "<a id='link_".$this->model->tableName()."_".$this->object."' class='imageSelector button' href='admin.php?r=media&type=images&popup=".$this->model->tableName()."_".$this->object."'>Seleccionar imagen</a>";
		}
	}
}

