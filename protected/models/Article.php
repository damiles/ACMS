<?php
/**
 * This is the model class for table "Article".
 *
 * The followings are the available columns in table 'Article':
 * @property integer $idArticle
 * @property string $type
 * @property string $date
 * @property integer $published
 * @property integer $author
 * @property integer $hits
 * @property integer $category
 * @property string $img_portada
 * @property integer $show_title
 * @property integer $home
 * @property string $template
 * @property string $fuente
 * @property string $bibliografia
 * @property string $banner
 *
 * The followings are the available model relations:
 * @property User $author0
 * @property Lang[] $langs
 * @property Banner[] $banners
 * @property Comment[] $comments
 * @property Components[] $components
 * @property Newsletter[] $newsletters
 */
class Article extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'Article':
	 * @var integer $idArticle
	 * @var string $type
	 * @var string $date
	 * @var integer $published
	 * @var integer $author
	 * @var integer $hits
	 * @var integer $category
	 */
	public $title="";
	public $categoryTitle="";
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
		return 'Article';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author', 'required'),
			array('show_title, published, home, author, hits, category', 'numerical', 'integerOnly'=>true),
			array('type, img_portada, template', 'length', 'max'=>255),
			array('date, template, banner, fuente, bibliografia, Url', 'safe'),
			array('idArticle, type, date, published, author, hits, Url, img_portada, show_title, home, template, fuente, bibliografia, banner, title, categoryTitle', 'safe', 'on'=>'search'),
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
			'author0' => array(self::BELONGS_TO, 'User', 'author'),
			'langs' => array(self::MANY_MANY, 'Lang', 'ArticleContent(lang, idArticle)'),
            		'content' => array(self::HAS_MANY, 'ArticleContent', 'idArticle'),
			'myCategory' => array(self::BELONGS_TO, 'ArticleCategory', 'category'),
			'components'=> array(self::HAS_MANY, 'Components', 'Article_idArticle'),
                        'comments'=> array(self::HAS_MANY, 'Comment', 'Article_idArticle','condition'=>'comments.parent is NULL and comments.approved='.Comment::STATUS_APPROVED,'order'=>'comments.date DESC'),
                        'commentCount' => array(self::STAT, 'Comment', 'Article_idArticle', 'condition'=>'approved='.Comment::STATUS_APPROVED),
                        'commentPendingCount' => array(self::STAT, 'Comment', 'Article_idArticle', 'condition'=>'approved='.Comment::STATUS_PENDING),
                        'commentSpamCount' => array(self::STAT, 'Comment', 'Article_idArticle', 'condition'=>'approved='.Comment::STATUS_SPAMMED),
                        'commentTotalCount' => array(self::STAT, 'Comment', 'Article_idArticle'),
                        'tags' => array(self::MANY_MANY, 'Tag', 'Article_has_Tag(idArticle, idTag)'),
			//Relacion contenido generico
                        'tituloContent'=> array(self::HAS_ONE,'ArticleContent','idArticle','with'=>array('lang'=>array('alias'=>'l1','scopes'=>array('default'=>1)))),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idArticle' => 'Identificador',
			'type' => 'Type',
			'date' => 'Fecha publicación',
			'published' => 'Published',
			'author' => 'Author',
			'hits' => 'Clicks',
                        'home' => 'En portada',
			'category' => 'Categoría',
			'categoryTitle' => 'Categoría',
			'img_portada' => 'Imagen de portada',
			'show_title' => 'Mostrar titular',
			'title'=>'Título',
		);
	}

        /**
	 * Adds a new comment to this post.
	 * This method will set status and post_id of the comment accordingly.
	 * @param Comment the comment to be added
	 * @return boolean whether the comment is saved successfully
	 */
	public function addComment($comment)
	{
		$comment->approved=Comment::STATUS_PENDING;
		$comment->Article_idArticle=$this->idArticle;
                $comment->Lang_idLang=Yii::app()->language;
		return $comment->save();
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
        $criteria->compare('t.idArticle',$this->idArticle);
        $criteria->compare('type',$this->type,true);
        $criteria->compare('date',$this->date,true);
        $criteria->compare('published',$this->published);
        $criteria->compare('author',$this->author);
        $criteria->compare('hits',$this->hits);
      	$criteria->compare('category',$this->category);
        $criteria->compare('img_portada',$this->img_portada,true);
        $criteria->compare('show_title',$this->show_title);
        $criteria->compare('home',$this->home);
        $criteria->compare('template',$this->template,true);
        $criteria->compare('fuente',$this->fuente,true);
        $criteria->compare('bibliografia',$this->bibliografia,true);
        $criteria->compare('banner',$this->banner,true);


	//Busqueda por titulo generico
        $criteria->with= array('tituloContent', 'myCategory.defaultContent');
        $criteria->addSearchCondition('tituloContent.title', $this->title, true);

	//Busqueda por titulo generico
        //$criteria->with= array('myCategory.defaultContent');
        $criteria->addSearchCondition('defaultContent.title', $this->categoryTitle, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria'=>$criteria,
	    'sort'=>array(
		    'defaultOrder'=>'t.idArticle DESC',
		  )
        ));
    }

	protected function afterFind(){
            parent::afterFind();
            $this->title=ACMS::getTitle($this);
            
            return true;
        }
}

