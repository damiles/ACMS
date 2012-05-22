<?php

/**
 * This is the model class for table "Distance".
 *
 * The followings are the available columns in table 'Distance':
 * @property integer $idDistance
 * @property double $swimming
 * @property double $cycling
 * @property double $running
 *
 * The followings are the available model relations:
 * @property DistanceContent[] $distanceContents
 * @property SportEvent[] $sportEvents
 */
class Distance extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Distance the static model class
	 */
        //Nueva variable para el titulo generico
        public $title = "";
         
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Distance';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('swimming, cycling, running, duatlon', 'numerical'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
                        // Se añade title para realizar busqueda por titulos
			array('idDistance, swimming, cycling, running, duatlon, title', 'safe', 'on'=>'search'),
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
			'content' => array(self::HAS_MANY, 'DistanceContent', 'idDistance'),
			'sportEvents' => array(self::MANY_MANY, 'SportEvent', 'SportEvent_Distance(idSportEvent, idDistance)'),
                        //Relacion contenido generico
                        'defaultContent'=> array(self::HAS_ONE,'DistanceContent','idDistance','with'=>array('lang'=>array('scopes'=>array('default'=>1)))),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
                    	'idDistance' => 'Id Distance',
			'swimming' => 'Swimming/Running',
			'cycling' => 'Cycling',
			'running' => 'Running',
                        'title'=> 'Titulo',
                        'duatlon'=> '¿Es duatlon?'		
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

		$criteria->compare('idDistance',$this->idDistance);
		$criteria->compare('swimming',$this->swimming);
		$criteria->compare('cycling',$this->cycling);
		$criteria->compare('running',$this->running);
                
                //Busqueda por titulo generico
                $criteria->with= array('defaultContent');
                $criteria->addSearchCondition('defaultContent.title', $this->title, true);
                
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        
        protected function afterFind(){
            parent::afterFind();
            //if(parent::afterFind())
            //{
                $this->title=ACMS::getTitle($this);
                return true;
            //}else{
            //    return false;
            //}
        }
}