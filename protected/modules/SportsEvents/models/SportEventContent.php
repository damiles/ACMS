<?php

/**
 * This is the model class for table "SportEventContent".
 *
 * The followings are the available columns in table 'SportEventContent':
 * @property integer $idSportEvent
 * @property string $lang
 * @property string $title
 * @property string $text
 */
class SportEventContent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SportEventContent the static model class
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
		return 'SportEventContent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idSportEvent, lang, title', 'required'),
			array('idSportEvent', 'numerical', 'integerOnly'=>true),
			array('lang', 'length', 'max'=>7),
			array('title', 'length', 'max'=>255),
			array('text', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSportEvent, lang, title, text', 'safe', 'on'=>'search'),
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
                    'idSportEvent0' => array(self::BELONGS_TO, 'SportEvent', 'idSportEvent'),
                    'lang' => array(self::BELONGS_TO, 'Lang', 'lang'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSportEvent' => 'Id Sport Event',
			'lang' => 'Lang',
			'title' => 'Title',
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

		$criteria->compare('idSportEvent',$this->idSportEvent);
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}