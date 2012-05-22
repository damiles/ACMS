<?php

/**
 * This is the model class for table "SearchOccurrence".
 *
 * The followings are the available columns in table 'SearchOccurrence':
 * @property integer $idSearchOccurrence
 * @property integer $idSearchPage
 * @property integer $idSearchWord
 * @property integer $weight
 */
class SearchOccurrence extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SearchOccurrence the static model class
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
		return 'SearchOccurrence';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idSearchPage', 'required'),
			array('idSearchPage, idSearchWord, weight', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSearchOccurrence, idSearchPage, idSearchWord, weight', 'safe', 'on'=>'search'),
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
			'idSearchOccurrence' => 'Id Search Occurrence',
			'idSearchPage' => 'Id Search Page',
			'idSearchWord' => 'Id Search Word',
			'weight' => 'Weight',
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

		$criteria->compare('idSearchOccurrence',$this->idSearchOccurrence);
		$criteria->compare('idSearchPage',$this->idSearchPage);
		$criteria->compare('idSearchWord',$this->idSearchWord);
		$criteria->compare('weight',$this->weight);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}