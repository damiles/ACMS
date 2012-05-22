<?php

class Newsletter extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Newsletter':
	 * @var integer $idNewsletter
	 * @var string $date
	 * @var integer $articuloPrincipal
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
		return 'Newsletter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idNewsletter, articuloPrincipal', 'required'),
			array('idNewsletter, articuloPrincipal', 'numerical', 'integerOnly'=>true),
			array('date', 'safe'),
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
			'articuloPrincipal0' => array(self::BELONGS_TO, 'Article', 'articuloPrincipal'),
			'articles' => array(self::MANY_MANY, 'Article', 'Newsletter_has_Article(Newsletter_idNewsletter, Article_idArticle)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idNewsletter' => 'Id Newsletter',
			'date' => 'Date',
			'articuloPrincipal' => 'Articulo Principal',
		);
	}
}