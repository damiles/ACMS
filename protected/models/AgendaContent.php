<?php

/**
 * This is the model class for table "AgendaContent".
 *
 * The followings are the available columns in table 'AgendaContent':
 * @property integer $idAgenda
 * @property string $lang
 * @property string $title
 *
 * The followings are the available model relations:
 */
class AgendaContent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AgendaContent the static model class
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
		return 'AgendaContent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idAgenda, lang', 'required'),
			array('idAgenda', 'numerical', 'integerOnly'=>true),
			array('lang', 'length', 'max'=>7),
			array('title', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idAgenda, lang, title', 'safe', 'on'=>'search'),
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
			'idAgenda' => 'Id Agenda',
			'lang' => 'Lang',
			'title' => 'Title',
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
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('title',$this->title,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
