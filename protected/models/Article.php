<?php

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
			array('date, template, banner, fuente, bibliografia', 'safe'),
			
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idArticle' => 'Id Article',
			'type' => 'Type',
			'date' => 'Date',
			'published' => 'Published',
			'author' => 'Author',
			'hits' => 'Hits',
                        'home' => 'En portada',
			'category' => 'Category',
			'img_portada' => 'Imagen de portada',
			'show_title' => 'Mostrar titular',
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
}

