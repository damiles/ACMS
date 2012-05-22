<?php

/**
 * This is the model class for table "resulevents".
 *
 * The followings are the available columns in table 'resulevents':
 * @property string $title
 * @property integer $mes
 * @property integer $dia
 * @property string $results
 * @property string $name
 * @property string $citie
 * @property integer $puntuable
 */
class Resulevents extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Resulevents the static model class
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
		return 'resulevents';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('puntuable', 'required'),
			array('mes, dia, puntuable', 'numerical', 'integerOnly'=>true),
			array('title, results, name, citie', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('title, mes, dia, results, name, citie, puntuable, fecha, idSportEvent', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'title' => 'Title',
			'mes' => 'Mes',
			'dia' => 'Dia',
			'results' => 'Results',
			'name' => 'Name',
			'citie' => 'Citie',
			'puntuable' => 'Puntuable',
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

		$criteria->compare('title',$this->title,true);
		$criteria->compare('mes',$this->mes);
		$criteria->compare('dia',$this->dia);
		$criteria->compare('results',$this->results,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('citie',$this->citie,true);
		$criteria->compare('puntuable',$this->puntuable);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}