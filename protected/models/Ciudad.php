<?php

/**
 * This is the model class for table "Ciudad".
 *
 * The followings are the available columns in table 'Ciudad':
 * @property integer $idCiudad
 * @property string $name
 * @property integer $Provincia_idProvincia
 *
 * The followings are the available model relations:
 * @property Provincia $provinciaIdProvincia
 */
class Ciudad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ciudad the static model class
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
		return 'Ciudad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCiudad, name, Provincia_idProvincia', 'required'),
			array('idCiudad, Provincia_idProvincia', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCiudad, name, Provincia_idProvincia', 'safe', 'on'=>'search'),
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
			'provinciaIdProvincia' => array(self::BELONGS_TO, 'Provincia', 'Provincia_idProvincia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCiudad' => 'Id Ciudad',
			'name' => 'Name',
			'Provincia_idProvincia' => 'Provincia Id Provincia',
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

		$criteria->compare('idCiudad',$this->idCiudad);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('Provincia_idProvincia',$this->Provincia_idProvincia);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}