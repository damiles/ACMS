<?php

class User extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'User':
	 * @var integer $idUser
	 * @var string $user
	 * @var string $password
	 * @var string $name
	 * @var string $surnames
	 * @var string $email
	 * @var integer $MyRol
	 */
	const ADMIN = 1;
	const GESTOR = 2;
	const USUARIO_WEB = 4;
	const USUARIO_NEWS = 8;


	const PERM_NOTICIAS 	= 1;
	const PERM_CATEGORIAS 	= 2;
	const PERM_PAGINAS	= 4;
	const PERM_MENU		= 8;
 	const PERM_AGENDA	= 16;
	const PERM_IMAGENES	= 32;
	const PERM_DOCUMENTOS	= 64;
	const PERM_USUARIOS	= 128;
	const PERM_PREFERENCIAS	= 256;
	const PERM_NEWSLETTER	= 512;
	const PERM_PLUGINS	= 1024;
	const PERM_BANNERS	= 2048;
        const PERM_COMMENTS	= 4096;
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
		return 'User';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('MyRol', 'required'),
				array('MyRol, perms', 'numerical', 'integerOnly'=>true),
				array('user, name, surnames, email', 'length', 'max'=>255),
				array('password', 'safe'),
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
				'articles' => array(self::HAS_MANY, 'Article', 'author'),
			    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'idUser' => 'Id User',
				'user' => 'User',
				'password' => 'Password',
				'name' => 'Name',
				'surnames' => 'Surnames',
				'email' => 'Email',
				'MyRol' => 'My Rol',
				'perms' => 'Permisos',
			    );
	}
	/**
	 * @return array of users with role
	 * $perms es el total de todos los permisos que existen en total 1023 
	 * es la suma de los permisos individuales definidos en la cabecera
	 */
	public static function usernamesByRole($role, $perms=0){
		//$users = User::model()->findAllByAttributes(array('MyRol'=>$role));
		$users = User::model()->findAll();
		$usernames = array();
		foreach ($users as $user)
		{
			if($user->MyRol & $role){
				if($user->MyRol & User::ADMIN){
					$usernames[] = $user->user;
				}else{
					//comprobamos que el usuario tenga los permisos que se piden
					if($perms==0)//Si no se ha especificado que permiso le damos permiso
						$usernames[] = $user->user;
					else if($user->perms & $perms)//en caso de definir el permiso lo comprobamos
						$usernames[] = $user->user;
				}
			}
		}
		return $usernames;
	}

	public function checkPerms($perms){
		if($this->checkRole(User::ADMIN))
			return true;
		if($this->perms & $perms)
			return true;
		else
			return false;
	}

	public function checkRole($role){
		if($this->MyRol & $role)
			return true;
		else
			return false;
	}	

	public function addRole($role){
		$this->MyRol=($this->MyRol | $role);
	}
	public function addPerms($perm){
		$this->perms=($this->perms | $perm);
	}

}
