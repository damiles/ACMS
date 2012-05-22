<?php

/**
 * This is the model class for table "entrenamiento_modalidad".
 *
 * The followings are the available columns in table 'entrenamiento_modalidad':
 * @property string $idmodalidad
 * @property string $modalidad
 *
 * The followings are the available model relations:
 * @property EntrenamientoEntrenamiento[] $entrenamientoEntrenamientos
 */
class EntrenamientoModalidad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EntrenamientoModalidad the static model class
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
		return 'entrenamiento_modalidad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('modalidad', 'required'),
			array('modalidad', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idmodalidad, modalidad', 'safe', 'on'=>'search'),
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
			'entrenamientoEntrenamientos' => array(self::HAS_MANY, 'EntrenamientoEntrenamiento', 'idmodalidad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idmodalidad' => 'Idmodalidad',
			'modalidad' => 'Modalidad',
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

		$criteria->compare('idmodalidad',$this->idmodalidad,true);
		$criteria->compare('modalidad',$this->modalidad,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}