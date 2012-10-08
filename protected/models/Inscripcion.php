<?php

/**
 * This is the model class for table "Inscripcion".
 *
 * The followings are the available columns in table 'Inscripcion':
 * @property integer $idInscripcion
 * @property string $dni
 * @property string $nombre
 * @property integer $cod
 * @property integer $Evento_idEvento
 *
 * The followings are the available model relations:
 * @property Evento $eventoIdEvento
 */
class Inscripcion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Inscripcion the static model class
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
		return 'Inscripcion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dni, Evento_idEvento, nombre, telefono', 'required'),
			array('cod, Evento_idEvento', 'numerical', 'integerOnly'=>true),
			array('dni', 'length', 'max'=>9),
			array('nombre, email', 'length', 'max'=>255),
                        array('telefono', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idInscripcion, dni, nombre, cod, Evento_idEvento, email, telefono', 'safe', 'on'=>'search'),
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
			'eventoIdEvento' => array(self::BELONGS_TO, 'Evento', 'Evento_idEvento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idInscripcion' => 'Id Inscripcion',
			'dni' => 'Dni',
			'nombre' => 'Nombre y apellidos',
			'cod' => 'Código colegiado',
			'Evento_idEvento' => 'Evento Id Evento',
                        'email'=>'Email',
                        'telefono'=>'N. Telefono',
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

		$criteria->compare('idInscripcion',$this->idInscripcion);
		$criteria->compare('dni',$this->dni,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('cod',$this->cod);
		$criteria->compare('Evento_idEvento',$this->Evento_idEvento);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
