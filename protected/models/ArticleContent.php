<?php

class ArticleContent extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'ArticleContent':
	 * @var string $content
	 * @var string $lang
	 * @var integer $idArticle
	 * @var string $title
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
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
		return 'ArticleContent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('text, lang, idArticle, title', 'required'),
			array('idArticle', 'numerical', 'integerOnly'=>true),
			array('lang', 'length', 'max'=>7),
			array('title', 'length', 'max'=>255),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array('idArticle0' => array(self::BELONGS_TO, 'Article', 'idArticle'),
				'lang' => array(self::BELONGS_TO, 'Lang', 'lang'),
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
			'idArticle' => 'Id Article',
			'title' => 'Título',
		);
	}
}
