<?php

/**
 * This is the model class for table "entrenamiento_actividad".
 *
 * The followings are the available columns in table 'entrenamiento_actividad':
 * @property string $idactividad
 * @property string $idtipo
 * @property string $descripcion
 * @property string $orden
 * @property string $iddia
 *
 * The followings are the available model relations:
 * @property EntrenamientoDia $iddia0
 * @property EntrenamientoTipoactividad $idtipo0
 */
class EntrenamientoActividad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return EntrenamientoActividad the static model class
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
		return 'entrenamiento_actividad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idtipo, iddia', 'required'),
			array('idtipo, orden, iddia', 'length', 'max'=>10),
			array('descripcion1,descripcion2,descripcion3,descripcion4,descripcion5', 'length', 'max'=>450),
                        array('titular1,titular2,titular3,titular4,titular5, resumen', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idactividad, idtipo, descripcion1, descripcion2, descripcion3, descripcion4, descripcion5, titular1,titular2,titular3,titular4,titular5, resumen, orden, iddia', 'safe', 'on'=>'search'),
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
			'iddia0' => array(self::BELONGS_TO, 'EntrenamientoDia', 'iddia'),
			'idtipo0' => array(self::BELONGS_TO, 'EntrenamientoTipoactividad', 'idtipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idactividad' => 'Idactividad',
			'idtipo' => 'Idtipo',
			'descripcion1' => 'Descripcion 1',
                        'descripcion2' => 'Descripcion 2',
                        'descripcion3' => 'Descripcion 3',
                        'descripcion4' => 'Descripcion 4',
                        'descripcion5' => 'Descripcion 5',
                        'titular1' => 'Titular 1',
                        'titular2' => 'Titular 2',
                        'titular3' => 'Titular 3',
                        'titular4' => 'Titular 4',
                        'titular5' => 'Titular 5',
                        'resumen' => 'Resumen Actividad',
			'orden' => 'Orden',
			'iddia' => 'Iddia',
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

		$criteria->compare('idactividad',$this->idactividad,true);
		$criteria->compare('idtipo',$this->idtipo,true);
		$criteria->compare('descripcion1',$this->descripcion1,true);
                $criteria->compare('resumen',$this->resumen,true);
		$criteria->compare('orden',$this->orden,true);
		$criteria->compare('iddia',$this->iddia,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}