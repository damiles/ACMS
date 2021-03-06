<?php

/**
 * This is the model class for table "EventoContent".
 *
 * The followings are the available columns in table 'EventoContent':
 * @property string $title
 * @property string $lang
 * @property integer $idEvento
 * @property string $text
 *
 * The followings are the available model relations:
 * @property Evento $idEvento0
 */
class EventoContent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EventoContent the static model class
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
		return 'EventoContent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lang, idEvento', 'required'),
			array('idEvento', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('lang', 'length', 'max'=>7),
			array('text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('title, lang, idEvento, text', 'safe', 'on'=>'search'),
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
			'idEvento0' => array(self::BELONGS_TO, 'Evento', 'idEvento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'title' => 'Title',
			'lang' => 'Lang',
			'idEvento' => 'Id Evento',
			'text' => 'Text',
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
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('idEvento',$this->idEvento);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}