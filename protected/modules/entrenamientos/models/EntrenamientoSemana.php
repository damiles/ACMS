<?php

/**
 * This is the model class for table "entrenamiento_semana".
 *
 * The followings are the available columns in table 'entrenamiento_semana':
 * @property string $idsemana
 * @property string $identrenamiento
 * @property string $nsemana
 *
 * The followings are the available model relations:
 * @property EntrenamientoDia[] $entrenamientoDias
 * @property EntrenamientoEntrenamiento $identrenamiento0
 */
class EntrenamientoSemana extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EntrenamientoSemana the static model class
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
		return 'entrenamiento_semana';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('identrenamiento, nsemana', 'required'),
			array('identrenamiento, nsemana', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idsemana, identrenamiento, nsemana', 'safe', 'on'=>'search'),
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
			'entrenamientoDias' => array(self::HAS_MANY, 'EntrenamientoDia', 'idsemana'),
			'identrenamiento0' => array(self::BELONGS_TO, 'EntrenamientoEntrenamiento', 'identrenamiento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idsemana' => 'Idsemana',
			'identrenamiento' => 'Identrenamiento',
			'nsemana' => 'Nsemana',
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

		$criteria->compare('idsemana',$this->idsemana,true);
		$criteria->compare('identrenamiento',$this->identrenamiento,true);
		$criteria->compare('nsemana',$this->nsemana,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        protected function afterSave() {

            parent::afterSave();
            for ($i=0;$i<7;$i++) {
                $dia = new EntrenamientoDia();
                $dia->idsemana=$this->idsemana;
                $dia->ndia=$i+1;
                $dia->save();
            }
        }
}