<?php

/**
 * This is the model class for table "Pais".
 *
 * The followings are the available columns in table 'Pais':
 * @property integer $PAI_ISONUM
 * @property string $PAI_ISO2
 * @property string $PAI_ISO3
 * @property string $PAI_NOMBRE
 *
 * The followings are the available model relations:
 * @property Provincia[] $provincias
 */
class Pais extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pais the static model class
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
		return 'Pais';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('PAI_ISO2', 'required'),
			array('PAI_ISONUM', 'numerical', 'integerOnly'=>true),
			array('PAI_ISO2', 'length', 'max'=>2),
			array('PAI_ISO3', 'length', 'max'=>3),
			array('PAI_NOMBRE', 'length', 'max'=>80),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('PAI_ISONUM, PAI_ISO2, PAI_ISO3, PAI_NOMBRE', 'safe', 'on'=>'search'),
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
                        'provincias' => array(self::HAS_MANY, 'Provincia', 'cod_pais'),
                        'eventos'=>array(self::HAS_MANY,'SportEvent','country'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'PAI_ISONUM' => 'Pai Isonum',
			'PAI_ISO2' => 'Pai Iso2',
			'PAI_ISO3' => 'Pai Iso3',
			'PAI_NOMBRE' => 'Pai Nombre',
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

		$criteria->compare('PAI_ISONUM',$this->PAI_ISONUM);
		$criteria->compare('PAI_ISO2',$this->PAI_ISO2,true);
		$criteria->compare('PAI_ISO3',$this->PAI_ISO3,true);
		$criteria->compare('PAI_NOMBRE',$this->PAI_NOMBRE,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}