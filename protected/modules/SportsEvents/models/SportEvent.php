<?php

/**
 * This is the model class for table "SportEvent".
 *
 * The followings are the available columns in table 'SportEvent':
 * @property integer $idSportEvent
 * @property integer $SportContact_idSportContact
 * @property string $date
 * @property integer $puntuable
 * @property integer $SportCategory_idSportCategory
 * @property integer $SportBrand_idSportBrand
 * @property string $results
 * @property integer $province
 * @property string $country
 * @property string $citie
 *
 * The followings are the available model relations:
 * @property Distance $distanceIdDistance
 * @property SportBrand $sportBrandIdSportBrand
 * @property SportCategory $sportCategoryIdSportCategory
 * @property SportContact $sportContactIdSportContact
 * @property Lang[] $langs
 */
class SportEvent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SportEvent the static model class
	 */
    
         //Nueva variable para el titulo generico
        public $title = "";
        public $distanciasIds=array();
        
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'SportEvent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date', 'required'),
			array('SportContact_idSportContact, puntuable, SportCategory_idSportCategory, SportBrand_idSportBrand, province', 'numerical', 'integerOnly'=>true),
			array('results, citie, web', 'length', 'max'=>255),
                        array('country', 'length', 'max'=>2),
                        // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSportEvent, SportContact_idSportContact, date, puntuable, SportCategory_idSportCategory, SportBrand_idSportBrand, title, province, citie, country, results, web', 'safe', 'on'=>'search'),
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
			'distances' => array(self::MANY_MANY, 'Distance', 'SportEvent_Distance(idSportEvent, idDistance)'),
			'brand' => array(self::BELONGS_TO, 'SportBrand', 'SportBrand_idSportBrand'),
			'category' => array(self::BELONGS_TO, 'SportCategory', 'SportCategory_idSportCategory'),
                        'provincia' => array(self::BELONGS_TO, 'Provincia', 'province'),
                        'pais' => array(self::BELONGS_TO, 'Pais', 'country'),
			'contact' => array(self::BELONGS_TO, 'SportContact', 'SportContact_idSportContact'),
			'langs' => array(self::MANY_MANY, 'Lang', 'SportEventContent(idSportEvent, lang)'),
                        'content' => array(self::HAS_MANY, 'SportEventContent', 'idSportEvent'),
                        //Relacion contenido generico
                        'defaultContent'=> array(self::HAS_ONE,'SportEventContent','idSportEvent','with'=>array('lang'=>array('scopes'=>array('default'=>1)))),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSportEvent' => 'Id',
			'SportContact_idSportContact' => 'Contacto',
			'date' => 'Date',
			'puntuable' => 'Puntuable',
			'SportCategory_idSportCategory' => 'Categoria',
			'SportBrand_idSportBrand' => 'Organizador',
			'distances' => 'Distancias',
                        'defaultTitle' => 'Titulo',
                        'results'=>'Resultados',
                        'province'=>"Provincia",
                        'citie'=>'Ciudad',
                        'country'=>'Pais',
                        'web'=>'Web',
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

		$criteria->compare('idSportEvent',$this->idSportEvent);
		$criteria->compare('SportContact_idSportContact',$this->SportContact_idSportContact);
		$criteria->compare('date',$this->date,true);
                $criteria->compare('results',$this->results,true);
		$criteria->compare('puntuable',$this->puntuable);
		$criteria->compare('SportCategory_idSportCategory',$this->SportCategory_idSportCategory);
		$criteria->compare('SportBrand_idSportBrand',$this->SportBrand_idSportBrand);
		
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
            if(!empty($this->distances)){
                foreach($this->distances as $n=>$distance)
                        $this->distanciasIds[]=$distance->idDistance;
            }
            //$this->distanciasIds= array_keys($this->distances);
            return true;
        }
        
        protected function afterSave() {
            
            parent::afterSave();
            
            Yii::trace('writing MANY_MANY (Distance) data for SportEvent','system.db.ar.CActiveRecord');

            $query="DELETE FROM SportEvent_Distance WHERE idSportEvent=".$this->idSportEvent;
            $command = Yii::app()->db->createCommand($query);
            $command->execute();
            
            foreach($this->distanciasIds as $id){
                $query="INSERT INTO SportEvent_Distance (idSportEvent, idDistance) VALUES ($this->idSportEvent, $id)";
                $command = Yii::app()->db->createCommand($query);
                $command->execute();
            }
            
            
        }
}