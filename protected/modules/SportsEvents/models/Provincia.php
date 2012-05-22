<?php

/**
 * This is the model class for table "Provincia".
 *
 * The followings are the available columns in table 'Provincia':
 * @property integer $idProvincia
 * @property string $name
 * @property string $cod_pais
 *
 * The followings are the available model relations:
 * @property Ciudad[] $ciudads
 * @property Pais $codPais0
 */
class Provincia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Provincia the static model class
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
		return 'Provincia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, cod_pais', 'required'),
			array('name', 'length', 'max'=>255),
			array('cod_pais', 'length', 'max'=>2),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idProvincia, name, cod_pais', 'safe', 'on'=>'search'),
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
			'ciudads' => array(self::HAS_MANY, 'Ciudad', 'Provincia_idProvincia'),
			'pais' => array(self::BELONGS_TO, 'Pais', 'cod_pais'),
                        'eventos'=>array(self::HAS_MANY,'SportEvent','province'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProvincia' => 'Id Provincia',
			'name' => 'Name',
			'cod_pais' => 'Cod Pais',
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

		$criteria->compare('idProvincia',$this->idProvincia);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('cod_pais',$this->cod_pais,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}