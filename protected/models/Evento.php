<?php

/**
 * This is the model class for table "Evento".
 *
 * The followings are the available columns in table 'Evento':
 * @property integer $idEvento
 * @property string $date
 * @property string $location
 * @property string $time
 * @property integer $idAgenda
 *
 * The followings are the available model relations:
 * @property Agenda $idAgenda0
 * @property EventoContent[] $eventoContents
 */
class Evento extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Evento the static model class
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
		return 'Evento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idAgenda', 'required'),
			array('idAgenda', 'numerical', 'integerOnly'=>true),
			array('location', 'length', 'max'=>255),
			array('date, time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idEvento, date, location, time, idAgenda', 'safe', 'on'=>'search'),
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
			'agenda' => array(self::BELONGS_TO, 'Agenda', 'idAgenda'),
			'content' => array(self::HAS_MANY, 'EventoContent', 'idEvento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEvento' => 'Id Evento',
			'date' => 'Date',
			'location' => 'Location',
			'time' => 'Time',
			'idAgenda' => 'Id Agenda',
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

		$criteria->compare('idEvento',$this->idEvento);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('idAgenda',$this->idAgenda);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
