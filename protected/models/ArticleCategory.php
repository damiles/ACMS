<?php

/**
 * This is the model class for table "ArticleCategory".
 *
 * The followings are the available columns in table 'ArticleCategory':
 * @property integer $idArticleCategory
 * @property integer $acceptComments
 * @property integer $parent
 */
class ArticleCategory extends CActiveRecord
{
	public $title="";
	/**
	 * Returns the static model of the specified AR class.
	 * @return ArticleCategory the static model class
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
		return 'ArticleCategory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('acceptComments', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
                        array('template', 'length', 'max'=>255),
			array('idArticleCategory, acceptComments, parent, template', 'safe', 'on'=>'search'),
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
                    'langs' => array(self::MANY_MANY, 'Lang', 'ArticleCategoryContent(lang, idArticleCategory)'),
                    'content' => array(self::HAS_MANY, 'ArticleCategoryContent', 'idArticleCategory'),
                    'parent0' => array(self::BELONGS_TO, 'ArticleCategory', 'parent'),
                    'childs' => array(self::HAS_MANY, 'ArticleCategory', 'parent'),
		    //Relacion contenido generico
		    'defaultContent'=> array(self::HAS_ONE,'ArticleCategoryContent','idArticleCategory','with'=>array('lang'=>array('scopes'=>array('default'=>1)))),
		);	
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idArticleCategory' => 'Id Article Category',
			'acceptComments' => 'Accept Comments',
			'parent' => 'Parent',
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

		$criteria->compare('idArticleCategory',$this->idArticleCategory);
		$criteria->compare('acceptComments',$this->acceptComments);
		$criteria->compare('parent',$this->parent);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	protected function afterFind(){
            parent::afterFind();
            $this->title=ACMS::getTitle($this);
            
            return true;
        }
}
