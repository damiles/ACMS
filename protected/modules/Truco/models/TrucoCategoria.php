<?php

/**
 * This is the model class for table "TrucoCategoria".
 *
 * The followings are the available columns in table 'TrucoCategoria':
 * @property integer $idTrucoCategoria
 * @property string $imagen
 */
class TrucoCategoria extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TrucoCategoria the static model class
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
		return 'TrucoCategoria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('imagen', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idTrucoCategoria, imagen', 'safe', 'on'=>'search'),
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
			'langs' => array(self::MANY_MANY, 'Lang', 'TrucoCategoriaContent(lang, idTrucoCategoria)'),
            		'content' => array(self::HAS_MANY, 'TrucoCategoriaContent', 'idTrucoCategoria'),
                        'trucos'=>array(self::HAS_MANY, 'Truco', 'idTrucoCategoria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTrucoCategoria' => 'Id Truco Categoria',
                        'imagen' => 'Imagen',
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

		$criteria->compare('idTrucoCategoria',$this->idTrucoCategoria);
                $criteria->compare('imagen',$this->imagen,true);
                
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
