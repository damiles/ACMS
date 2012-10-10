<?php

/**
 * This is the model class for table "Evento".
 *
 * The followings are the available columns in table 'Evento':
 * @property integer $idEvento
 * @property string $date
 * @property string $location
 * @property string $time
 * @property integer $idAgenda
 * @property string $fechaIniInscripcion
 * @property string $fechaFinInscripcion
 * @property integer $maxInscripciones
 * @property integer $inscritos
 *
 * The followings are the available model relations:
 * @property Agenda $idAgenda0
 * @property EventoContent[] $eventoContents
 * @property Inscripcion[] $inscripcions
 */
class Evento extends CActiveRecord
{
	public $title="";
	/**
	 * Returns the static model of the specified AR class.
	 * @return Evento the static model class
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
		return 'Evento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idAgenda', 'required'),
			array('idAgenda, maxInscripciones, inscritos', 'numerical', 'integerOnly'=>true),
			array('location', 'length', 'max'=>255),
			array('date, time, fechaIniInscripcion, fechaFinInscripcion, destacado, url', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idEvento, date, location, time, idAgenda, fechaIniInscripcion, fechaFinInscripcion', 'safe', 'on'=>'search'),
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
			'agenda' => array(self::BELONGS_TO, 'Agenda', 'idAgenda'),
			'content' => array(self::HAS_MANY, 'EventoContent', 'idEvento'),
			'inscripciones' => array(self::HAS_MANY, 'Inscripcion', 'Evento_idEvento'),
			'tituloContent'=> array(self::HAS_ONE,'EventoContent','idEvento','with'=>array('lang'=>array('alias'=>'l1','scopes'=>array('default'=>1)))),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEvento' => 'Identificador',
			'date' => 'Fecha',
			'location' => 'Lugar',
			'time' => 'Hora',
			'idAgenda' => 'Identificador Agenda',
			'fechaIniInscripcion' => 'Fecha inicio',
			'fechaFinInscripcion' => 'Fecha fin',
			'maxInscripciones' => 'N&uacute;mero M&aacute;ximo de inscritos',
			'url'=>'Archivo o dirección web (debe empezar con http:// ) que enlaza el evento',
			'title'=>'Título',
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

		$criteria->compare('idEvento',$this->idEvento);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('idAgenda',$this->idAgenda);
		$criteria->compare('fechaIniInscripcion',$this->fechaIniInscripcion,true);
		$criteria->compare('fechaFinInscripcion',$this->fechaFinInscripcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}