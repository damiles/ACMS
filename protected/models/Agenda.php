<?php

/**
 * This is the model class for table "Agenda".
 *
 * The followings are the available columns in table 'Agenda':
 * @property integer $idAgenda
 * @property integer $published
 *
 * The followings are the available model relations:
 * @property Lang[] $langs
 * @property Evento[] $eventos
 */
class Agenda extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Agenda the static model class
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
		return 'Agenda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('published', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idAgenda, published', 'safe', 'on'=>'search'),
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
			'langs' => array(self::MANY_MANY, 'Lang', 'AgendaContent(idAgenda, lang)'),
			'content' => array(self::HAS_MANY, 'AgendaContent', 'idAgenda'),			
			'eventos' => array(self::HAS_MANY, 'Evento', 'idAgenda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idAgenda' => 'Id Agenda',
			'published' => 'Published',
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

		$criteria->compare('idAgenda',$this->idAgenda);
		$criteria->compare('published',$this->published);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
