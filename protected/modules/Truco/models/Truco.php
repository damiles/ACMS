<?php

/**
 * This is the model class for table "Truco".
 *
 * The followings are the available columns in table 'Truco':
 * @property integer $idTruco
 * @property integer $published
 * @property integer $idTrucoCategoria
 */
class Truco extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Truco the static model class
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
		return 'Truco';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('published', 'required'),
			array('published, idTrucoCategoria', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTruco, published, idTrucoCategoria', 'safe', 'on'=>'search'),
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
			'langs' => array(self::MANY_MANY, 'Lang', 'TrucoContent(lang, idTruco)'),
            		'content' => array(self::HAS_MANY, 'TrucoContent', 'idTruco'),
			'categoria' => array(self::BELONGS_TO, 'TrucoCategoria', 'idTrucoCategoria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTruco' => 'Id Truco',
			'published' => 'Published',
			'idTrucoCategoria' => 'Id Truco Categoria',
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

		$criteria->compare('idTruco',$this->idTruco);
		$criteria->compare('published',$this->published);
		$criteria->compare('idTrucoCategoria',$this->idTrucoCategoria);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}