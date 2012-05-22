<?php

/**
 * This is the model class for table "entrenamiento_dia".
 *
 * The followings are the available columns in table 'entrenamiento_dia':
 * @property string $iddia
 * @property string $idsemana
 * @property string $ndia
 *
 * The followings are the available model relations:
 * @property EntrenamientoActividad[] $entrenamientoActividads
 * @property EntrenamientoSemana $idsemana0
 */
class EntrenamientoDia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EntrenamientoDia the static model class
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
		return 'entrenamiento_dia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idsemana, ndia', 'required'),
			array('idsemana, ndia', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('iddia, idsemana, ndia', 'safe', 'on'=>'search'),
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
			'entrenamientoActividads' => array(self::HAS_MANY, 'EntrenamientoActividad', 'iddia'),
			'idsemana0' => array(self::BELONGS_TO, 'EntrenamientoSemana', 'idsemana'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iddia' => 'Iddia',
			'idsemana' => 'Idsemana',
			'ndia' => 'Ndia',
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

		$criteria->compare('iddia',$this->iddia,true);
		$criteria->compare('idsemana',$this->idsemana,true);
		$criteria->compare('ndia',$this->ndia,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}