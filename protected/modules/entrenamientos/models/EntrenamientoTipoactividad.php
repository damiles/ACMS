<?php

/**
 * This is the model class for table "entrenamiento_tipoactividad".
 *
 * The followings are the available columns in table 'entrenamiento_tipoactividad':
 * @property string $idtipo
 * @property string $tipo
 * @property string $png
 *
 * The followings are the available model relations:
 * @property EntrenamientoActividad[] $entrenamientoActividads
 */
class EntrenamientoTipoactividad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EntrenamientoTipoactividad the static model class
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
		return 'entrenamiento_tipoactividad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo, png', 'required'),
			array('tipo', 'length', 'max'=>450),
			array('png', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtipo, tipo, png', 'safe', 'on'=>'search'),
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
			'entrenamientoActividads' => array(self::HAS_MANY, 'EntrenamientoActividad', 'idtipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtipo' => 'Idtipo',
			'tipo' => 'Tipo',
			'png' => 'Png',
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

		$criteria->compare('idtipo',$this->idtipo,true);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('png',$this->png,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}