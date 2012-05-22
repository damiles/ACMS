<?php

/**
 * This is the model class for table "SportContact".
 *
 * The followings are the available columns in table 'SportContact':
 * @property integer $idSportContact
 * @property string $address
 * @property string $postal_code
 * @property string $city
 * @property string $province
 * @property string $country
 * @property string $web
 * @property string $phone
 * @property string $organization
 * @property string $mainland
 *
 * The followings are the available model relations:
 * @property SportEvent[] $sportEvents
 */
class SportContact extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SportContact the static model class
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
		return 'SportContact';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('address, city, province, country, web, organization, mainland', 'length', 'max'=>255),
			array('postal_code, phone', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSportContact, address, postal_code, city, province, country, web, phone, organization, mainland', 'safe', 'on'=>'search'),
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
			'sportEvents' => array(self::HAS_MANY, 'SportEvent', 'SportContact_idSportContact'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSportContact' => 'Id Sport Contact',
			'address' => 'Address',
			'postal_code' => 'Postal Code',
			'city' => 'City',
			'province' => 'Province',
			'country' => 'Country',
			'web' => 'Web',
			'phone' => 'Phone',
			'organization' => 'Organization',
			'mainland' => 'Mainland',
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

		$criteria->compare('idSportContact',$this->idSportContact);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('postal_code',$this->postal_code,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('web',$this->web,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('organization',$this->organization,true);
		$criteria->compare('mainland',$this->mainland,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}