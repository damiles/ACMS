<?php

/**
 * This is the model class for table "Components".
 *
 * The followings are the available columns in table 'Components':
 * @property integer $idComponents
 * @property string $plugin
 * @property string $params
 * @property integer $Article_idArticle
 *
 * The followings are the available model relations:
 * @property Article $articleIdArticle
 */
class Components extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Components the static model class
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
		return 'Components';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('plugin, Article_idArticle', 'required'),
			array('Article_idArticle', 'numerical', 'integerOnly'=>true),
			array('plugin, params', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idComponents, plugin, params, Article_idArticle', 'safe', 'on'=>'search'),
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
			'articleIdArticle' => array(self::BELONGS_TO, 'Article', 'Article_idArticle'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idComponents' => 'Id Components',
			'plugin' => 'Plugin',
			'params' => 'Params',
			'Article_idArticle' => 'Article Id Article',
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

		$criteria->compare('idComponents',$this->idComponents);
		$criteria->compare('plugin',$this->plugin,true);
		$criteria->compare('params',$this->params,true);
		$criteria->compare('Article_idArticle',$this->Article_idArticle);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}