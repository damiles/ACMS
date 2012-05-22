<?php

/**
 * This is the model class for table "Banner_linkedTo".
 *
 * The followings are the available columns in table 'Banner_linkedTo':
 * @property string $url
 * @property integer $idBanner_linkedTo
 * @property integer $idBanner
 *
 * The followings are the available model relations:
 * @property Banner $idBanner0
 */
class BannerLinkedTo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return BannerLinkedTo the static model class
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
		return 'Banner_linkedTo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idBanner', 'required'),
			array('idBanner', 'numerical', 'integerOnly'=>true),
			array('url', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('url, idBanner_linkedTo, idBanner', 'safe', 'on'=>'search'),
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
			'idBanner0' => array(self::BELONGS_TO, 'Banner', 'idBanner'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'url' => 'Url',
			'idBanner_linkedTo' => 'Id Banner Linked To',
			'idBanner' => 'Id Banner',
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

		$criteria->compare('url',$this->url,true);
		$criteria->compare('idBanner_linkedTo',$this->idBanner_linkedTo);
		$criteria->compare('idBanner',$this->idBanner);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}