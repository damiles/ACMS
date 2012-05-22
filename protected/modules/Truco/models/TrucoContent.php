<?php

/**
 * This is the model class for table "TrucoContent".
 *
 * The followings are the available columns in table 'TrucoContent':
 * @property string $text
 * @property string $lang
 * @property integer $idTruco
 */
class TrucoContent extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TrucoContent the static model class
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
		return 'TrucoContent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text, lang, idTruco', 'required'),
			array('idTruco', 'numerical', 'integerOnly'=>true),
			array('lang', 'length', 'max'=>7),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('text, lang, idTruco', 'safe', 'on'=>'search'),
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
			'text' => 'Text',
			'lang' => 'Lang',
			'idTruco' => 'Id Truco',
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

		$criteria->compare('text',$this->text,true);
		$criteria->compare('lang',$this->lang,true);
		$criteria->compare('idTruco',$this->idTruco);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}