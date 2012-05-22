<?php

/**
 * This is the model class for table "SearchWord".
 *
 * The followings are the available columns in table 'SearchWord':
 * @property integer $idSearchWord
 * @property string $word
 */
class SearchWord extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SearchWord the static model class
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
		return 'SearchWord';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('word', 'required'),
			array('word', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSearchWord, word', 'safe', 'on'=>'search'),
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
                    'pages' => array(self::MANY_MANY, 'SearchPage', 'SeachOccurrence(idSeachWord, idSearchPage)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSearchWord' => 'Id Search Word',
			'word' => 'Word',
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

		$criteria->compare('idSearchWord',$this->idSearchWord);
		$criteria->compare('word',$this->word,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}