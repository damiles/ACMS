<?php

class Lang extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Lang':
	 * @var string $idLang
	 * @var string $title
	 * @var integer $selected
	 * @var integer $default
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
		return 'Lang';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idLang, title', 'required'),
			array('selected, default', 'numerical', 'integerOnly'=>true),
			array('idLang', 'length', 'max'=>7),
			array('title', 'length', 'max'=>45),
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
			'articles' => array(self::MANY_MANY, 'Article', 'ArticleContent(lang, idArticle)'),
			'menus' => array(self::MANY_MANY, 'Menu', 'MenuContent(lang, idMenu)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idLang' => 'Id Lang',
			'title' => 'Title',
			'selected' => 'Selected',
			'default' => 'Default',
		);
	}
}