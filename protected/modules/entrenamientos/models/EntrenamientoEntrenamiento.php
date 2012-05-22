<?php

/**
 * This is the model class for table "entrenamiento_entrenamiento".
 *
 * The followings are the available columns in table 'entrenamiento_entrenamiento':
 * @property string $identrenamiento
 * @property string $idmodalidad
 * @property string $nsemanas
 * @property string $nhorassemana
 *
 * The followings are the available model relations:
 * @property EntrenamientoModalidad $idmodalidad0
 * @property EntrenamientoSemana[] $entrenamientoSemanas
 */
class EntrenamientoEntrenamiento extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EntrenamientoEntrenamiento the static model class
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
		return 'entrenamiento_entrenamiento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idmodalidad', 'required'),
			array('idmodalidad, nsemanas, nhorassemana', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('identrenamiento, idmodalidad, nsemanas, nhorassemana', 'safe', 'on'=>'search'),
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
			'idmodalidad0' => array(self::BELONGS_TO, 'EntrenamientoModalidad', 'idmodalidad'),
			'entrenamientoSemanas' => array(self::HAS_MANY, 'EntrenamientoSemana', 'identrenamiento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'identrenamiento' => 'Identrenamiento',
			'idmodalidad' => 'Idmodalidad',
			'nsemanas' => 'Nsemanas',
			'nhorassemana' => 'Nhorassemana',
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

		$criteria->compare('identrenamiento',$this->identrenamiento,true);
		$criteria->compare('idmodalidad',$this->idmodalidad,true);
		$criteria->compare('nsemanas',$this->nsemanas,true);
		$criteria->compare('nhorassemana',$this->nhorassemana,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        public function getName() {
            return $this->nsemanas.' semanas/ '.$this->nhorassemana.' horassemana';
        }
}