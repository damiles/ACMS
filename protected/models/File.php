<?php

class File extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'File':
	 * @var integer $idFile
	 * @var string $name
	 * @var string $description
	 * @var string $url
	 * @var string $date
	 * @var integer $MyType
	 * @var integer $MyCategory
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
		return 'File';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('MyType, MyCategory', 'required'),
			array('MyType, MyCategory', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>55),
			array('url', 'length', 'max'=>255),
			array('description, date', 'safe'),
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
			'myCategory' => array(self::BELONGS_TO, 'Category', 'MyCategory'),
			'myType' => array(self::BELONGS_TO, 'Type', 'MyType'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idFile' => 'Id File',
			'name' => 'Nombre',
			'description' => 'Descripcion',
			'url' => 'Archivo',
			'date' => 'Fecha',
			'MyType' => 'Tipo',
			'MyCategory' => 'Categoria',
		);
	}


	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search($ps=50)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('MyCategory',$this->MyCategory);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->order='idFile desc';
		
                return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
			'pagination'=>array(
					'pageSize'=>$ps,
				    )
		));
	}


	public function gridLinkName($data, $row){
		$fileinfo=pathinfo(Yii::app()->params['upload'].$data->url);
		return "<a href=\"javascript:setData('".$data->MyCategory."','".$fileinfo['filename']."','".$data->name."','".$fileinfo['extension']."','".Utiles::formatBytes(filesize(Yii::app()->params['upload'].$data->url))."', '".$data->description."');\">$data->name</a>";
	}
	
	public function gridLinkDocName($data, $row){
		$fileinfo=pathinfo(Yii::app()->params['upload'].$data->url);
		
		if(isset($_GET['popup']) || isset($_GET['tinyMCE'])){
				return "<a class='descarga_g".$data->MyCategory."' id='descarga_g".$data->MyCategory."_".$data->idFile."' href='upload/$data->url'>$data->description</a>";
		}else{
			return "<a href='upload/$data->url' target='_blank'>$data->description</a>";
		}
	}
	
	

}
