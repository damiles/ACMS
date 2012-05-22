<?php

/**
 * This is the model class for table "SportBrand".
 *
 * The followings are the available columns in table 'SportBrand':
 * @property integer $idSportBrand
 * @property string $title
 * @property string $ico_file
 *
 * The followings are the available model relations:
 * @property SportEvent[] $sportEvents
 */
class SportBrand extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SportBrand the static model class
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
		return 'SportBrand';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, ico_file', 'required'),
			array('title, ico_file', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSportBrand, title, ico_file', 'safe', 'on'=>'search'),
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
			'sportEvents' => array(self::HAS_MANY, 'SportEvent', 'SportBrand_idSportBrand'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSportBrand' => 'Id Sport Brand',
			'title' => 'Title',
			'ico_file' => 'Ico File',
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

		$criteria->compare('idSportBrand',$this->idSportBrand);
		$criteria->compare('title',$this->title,true);
		//$criteria->compare('ico_file',$this->ico_file,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}