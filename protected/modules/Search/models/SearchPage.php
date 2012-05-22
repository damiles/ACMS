<?php

/**
 * This is the model class for table "SearchPage".
 *
 * The followings are the available columns in table 'SearchPage':
 * @property integer $idSearchPage
 * @property string $url
 * @property string $title
 * @property string $description
 * @property string $fulltxt
 * @property string $indexdate
 * @property double $size
 * @property string $md5sum
 */
class SearchPage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return SearchPage the static model class
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
		return 'SearchPage';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('url', 'required'),
			array('size', 'numerical'),
			array('url, description', 'length', 'max'=>255),
			array('title', 'length', 'max'=>200),
			array('md5sum', 'length', 'max'=>32),
			array('fulltxt, indexdate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idSearchPage, url, title, description, fulltxt, indexdate, size, md5sum', 'safe', 'on'=>'search'),
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
                    'words' => array(self::MANY_MANY, 'SearchWord', 'SearchOccurrence(idSearchPage, idSearchWord)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSearchPage' => 'Id Search Page',
			'url' => 'Url',
			'title' => 'Title',
			'description' => 'Description',
			'fulltxt' => 'Fulltxt',
			'indexdate' => 'Indexdate',
			'size' => 'Size',
			'md5sum' => 'Md5sum',
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

		$criteria->compare('idSearchPage',$this->idSearchPage);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('fulltxt',$this->fulltxt,true);
		$criteria->compare('indexdate',$this->indexdate,true);
		$criteria->compare('size',$this->size);
		$criteria->compare('md5sum',$this->md5sum,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}