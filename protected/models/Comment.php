<?php

/**
 * This is the model class for table "Comment".
 *
 * The followings are the available columns in table 'Comment':
 * @property integer $idComment
 * @property string $author
 * @property string $email
 * @property string $url
 * @property string $ip
 * @property string $date
 * @property string $content
 * @property integer $approved
 * @property integer $karma
 * @property integer $Article_idArticle
 * @property string $Lang_idLang
 * @property integer $parent
 *
 * The followings are the available model relations:
 * @property Comment $parent0
 * @property Comment[] $comments
 * @property Article $articleIdArticle
 * @property Lang $langIdLang
 */
class Comment extends CActiveRecord
{
        const STATUS_PENDING=0;
        const STATUS_APPROVED=1;
        const STATUS_SPAMMED=2;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Comment the static model class
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
		return 'Comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('author, email, Article_idArticle, Lang_idLang', 'required'),
			array('approved, karma, Article_idArticle, parent', 'numerical', 'integerOnly'=>true),
			array('author, email, url, ip', 'length', 'max'=>255),
			array('Lang_idLang', 'length', 'max'=>7),
			array('date, content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idComment, author, email, url, ip, date, content, approved, karma, Article_idArticle, Lang_idLang, parent', 'safe', 'on'=>'search'),
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
			'parent0' => array(self::BELONGS_TO, 'Comment', 'parent'),
			'comments' => array(self::HAS_MANY, 'Comment', 'parent'),
			'article' => array(self::BELONGS_TO, 'Article', 'Article_idArticle'),
			'langIdLang' => array(self::BELONGS_TO, 'Lang', 'Lang_idLang'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idComment' => 'Id Comment',
			'author' => 'Author',
			'email' => 'Email',
			'url' => 'Url',
			'ip' => 'Ip',
			'date' => 'Date',
			'content' => 'Content',
			'approved' => 'Approved',
			'karma' => 'Karma',
			'Article_idArticle' => 'Article Id Article',
			'Lang_idLang' => 'Lang Id Lang',
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

		$criteria->compare('idComment',$this->idComment);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('approved',$this->approved);
		$criteria->compare('karma',$this->karma);
		$criteria->compare('Article_idArticle',$this->Article_idArticle);
		$criteria->compare('Lang_idLang',$this->Lang_idLang,true);
		$criteria->compare('parent',$this->parent);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

        protected function beforeSave()
        {
            if(parent::beforeSave())
            {
                if($this->isNewRecord){
                    $this->date=date('Y-m-d G:i:s:u');
                    $this->ip=$_SERVER['REMOTE_ADDR'];
                    $this->agent=$_SERVER['HTTP_USER_AGENT'];
                }
                return true;
            }
            else
                return false;
        }
}