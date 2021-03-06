<?php

class Banner extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Banner':
	 * @var integer $idBanner
	 * @var string $src
	 * @var integer $display_in
	 * @var string $link
	 * @var string $target
	 * @var integer $visits
	 * @var integer $published
	 * @var integer $orden
	 */
    
         public $linkedT=array();
         public $prob=0;
	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Banner';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('src, display_in', 'required'),
			array('orden, published, display_in, visits, always_present', 'numerical', 'integerOnly'=>true),
			array('src, link, target, miniatura', 'length', 'max'=>255),
                        array('date, endDate', 'safe')
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'tags' => array(self::MANY_MANY, 'Tag', 'Banner_has_Tag(idBanner, idTag)'),
                    'articles' => array(self::MANY_MANY, 'Article', 'Banner_has_Article(idBanner, idArticle)'),
                    'linkedTo' => array(self::HAS_MANY, 'BannerLinkedTo', 'idBanner'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idBanner' => 'Identificador',
			'src' => 'Imagen',
			'display_in' => 'Mostrar en',
			'link' => 'Enlace',
			'target' => 'Target',
			'visits' => 'Visitas',
			'published'=>'Publicado',
			'orden'=>'Orden',
                        'miniatura'=>'Miniatura',
                        'always_present'=>"Siempre presente",
                        'date'=>'Fecha de publicación',
                        'endDate'=>'Fecha fin de publicación',
		);
	}
        
        
        public function afterSave() {
            parent::afterSave();
            
            $query="DELETE FROM Banner_linkedTo WHERE idBanner=".$this->idBanner;
            $command = Yii::app()->db->createCommand($query);
            $command->execute();
            
            foreach($this->linkedT as $url){
                $query="INSERT INTO Banner_linkedTo (idBanner, url) VALUES ($this->idBanner, '$url')";
                $command = Yii::app()->db->createCommand($query);
                $command->execute();
            }
            
        }
        
        public function calculateProb($selTags, $selUrl){
            if($this->always_present){
                    $this->prob=1;
                    return $this->prob;
            }
            foreach($this->linkedTo as $l){
                if(Yii::app()->params['path'].$l->url==$selUrl){
                    $this->prob=1;
                    return $this->prob;
                }
            }
            $ntags=1;
            $netags=0;
            foreach($selTags as $t){
                foreach($this->tags as $st){
                    if($t->idTag==$st->idTag){
                        $netags++;
                    }
                }
                $ntags++;
            }
            $this->prob=$netags/$ntags;
            return $this->prob;
            
        }
        
}