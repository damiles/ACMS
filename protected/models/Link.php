<?php

class Link extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Link':
	 * @var integer $idLink
	 * @var string $title
	 * @var string $link
	 * @var string $target
	 * @var string $tags
	 * @var string $css
	 * @var integer $visits
	 * @var integer $published
	 * @var integer $orden
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
		return 'Link';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, link', 'required'),
			array('orden, published, visits', 'numerical', 'integerOnly'=>true),
			array('title, link, target, tags, css', 'length', 'max'=>255),
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
			'idLink' => 'Id Link',
			'title' => 'Title',
			'link' => 'Link',
			'target' => 'Target',
			'tags' => 'Tags',
			'css' => 'Css',
			'visits' => 'Visits',
			'published'=> 'Publicado',
			'orden'=> 'Orden',
		);
	}
}