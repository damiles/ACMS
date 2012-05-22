<?php

/**
 * This is the model class for table "SportCategory".
 *
 * The followings are the available columns in table 'SportCategory':
 * @property integer $idSportCategory
 *
 * The followings are the available model relations:
 * @property Lang[] $langs
 * @property SportEvent[] $sportEvents
 */
class SportCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SportCategory the static model class
	 */
         public $title;
         
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'SportCategory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSportCategory, title', 'safe', 'on'=>'search'),
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
			'content' => array(self::HAS_MANY, 'SportCategoryContent', 'idSportCategory'),
			'langs' => array(self::MANY_MANY, 'Lang', 'SportCategoryContent(SportCategory, lang)'),
			'sportEvents' => array(self::HAS_MANY, 'SportEvent', 'SportCategory_idSportCategory'),
                        'defaultContent'=> array(self::HAS_ONE,'SportCategoryContent','idSportCategory','with'=>array('lang'=>array('scopes'=>array('default'=>1)))),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSportCategory' => 'Id Sport Category',
                        'title'=>'Categoria',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idSportCategory',$this->idSportCategory);
                 //Busqueda por titulo generico
                $criteria->with= array('defaultContent');
                $criteria->addSearchCondition('defaultContent.title', $this->title, true);
                
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        
        protected function afterFind(){
            parent::afterFind();
            $this->title=ACMS::getTitle($this);
            
            return true;
        }
        
}
