<?php

class Menu extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Menu':
	 * @var integer $idMenu
	 * @var string $type
	 * @var integer $active
	 * @var string $link
	 * @var string $target
	 * @var integer $access_level
	 * @var integer $orden
	 * @var string $display_in
	 * @var integer $parent
	 * @var integer $editable
         * @var string $params
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
		return 'Menu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, target', 'required'),
			array('active, access_level, orden, parent, editable', 'numerical', 'integerOnly'=>true),
			array('type, link, target, display_in, params, css', 'length', 'max'=>255),
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
			'parent0' => array(self::BELONGS_TO, 'Menu', 'parent'),
			'menus' => array(self::HAS_MANY, 'Menu', 'parent'),
			'langs' => array(self::MANY_MANY, 'Lang', 'MenuContent(lang, idMenu)'),
                        'content' => array(self::HAS_MANY, 'MenuContent', 'idMenu'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idMenu' => 'Id Menu',
			'type' => 'Tipo',
			'active' => 'Activo',
			'link' => 'Enlace',
			'target' => 'Abrir en',
			'access_level' => 'Privacidad',
			'orden' => 'Orden',
			'display_in' => 'Mostrar en',
			'parent' => 'Padre',
			'editable' => 'Editable',
            'params'=> 'Parametros',
			'css'=> 'Estilo',
		);
	}
}