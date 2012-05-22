<?php

class MenuContent extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'MenuContent':
	 * @var string $content
	 * @var string $lang
	 * @var integer $idMenu
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
		return 'MenuContent';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, lang, idMenu', 'required'),
			array('idMenu', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>255),
			array('lang', 'length', 'max'=>7),
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
			'title' => 'Titulo',
			'lang' => 'Idioma',
			'idMenu' => 'Id Menu',
		);
	}
}
