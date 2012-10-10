<?php

class SiteController extends Controller
{
	const PAGE_SIZE=9;
	public $breadcrumbs=array();
	public function init(){
		$this->breadcrumbs=array();
		if(isset($_GET['idm'])){
			$selectedMenu=$_GET['idm'];
			$menu=Menu::model()->findByPk(array($selectedMenu));
			if(isset($menu)){
				while($menu->parent!=0){
					//array_push($this->breadcrumbs, ACMS::getTitle($menu));
					$this->breadcrumbs[ACMS::getTitle($menu)]=ACMS::getMenuLink($menu);
					$menu=$menu->parent0;
				}
				//array_push($this->breadcrumbs, ACMS::getTitle($menu));
				$this->breadcrumbs[ACMS::getTitle($menu)]=ACMS::getMenuLink($menu);
			}
		}
		$this->breadcrumbs=array_reverse($this->breadcrumbs);
		parent::init();
	}

	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
				// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
					'class'=>'CCaptchaAction',
					'backColor'=>0xFFFFFF,
                                        'foreColor'=>0xF29B18,
					),
				// page action renders "static" pages stored under 'protected/views/site/pages'
				// They can be accessed via: index.php?r=site/page&view=FileName
				'spage'=>array(
					'class'=>'CViewAction',
					),
			    );
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$st=microtime(true);
		$this->render('index');
		$et=microtime(true);
		$dt=$et-$st;
		Yii::log("Spent time into index: $dt seconds",'warning','application');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				//$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				//mail(Yii::app()->params['adminEmail'],$model->subject,$model->body,$headers);

				$urlImages="http://".$_SERVER['SERVER_NAME'].Yii::app()->theme->baseUrl."/images";
				$mensaje=file_get_contents(Yii::app()->theme->basePath.'/mails/mensaje.html');
				$search=array('[RUTA_IMG]','[APP_NAME]','[USUARIO]','[EMAIL]','[MENSAJE]','[EMPRESA]', '[APELLIDOS]','[CONSULTA]','[ASUNTO]');
				$replace=array($urlImages, Yii::app()->name, $model->name, $model->email, $model->body, $model->empresa, $model->surname, $model->consulta, $model->subject);
				$mensaje= str_replace($search, $replace, $mensaje);
				$asunto=$model->consulta.' | '.$model->subject;
				ACMS::sendMail($model->email, Yii::app()->params['adminEmail'], $asunto, $mensaje);


				Yii::app()->user->setFlash('contact','Gracias por contactar con nosotros. Le responderemos lo mas pronto que nos sea posible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate())
				//$this->refresh();
                            $this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionRegisterNewUser(){
		$newUser=new User;
		$nombre=$_POST['nombre'];
		$email=$_POST['email'];
		$userExist=User::model()->findByAttributes(array("email"=>$email));
		$result='';
		if($userExist==null){
			$newUser->name=$nombre;
			$newUser->surnames='';
			$newUser->email=$email;
			$newUser->user=$email;
			$newUser->MyRol=User::USUARIO_WEB;
			$newUser->perms=0;

			$password=ACMS::generatePassword();
			$newUser->password=md5($password);

			if($newUser->save()){
				//Enviamos email
				$urlImages="http://".$_SERVER['SERVER_NAME'].Yii::app()->theme->baseUrl."/images";
				$mensaje=file_get_contents(Yii::app()->theme->basePath.'/mails/registro.html');
				$search=array('[RUTA_IMG]','[APP_NAME]','[USUARIO]','[PASS]');
				$replace=array($urlImages, Yii::app()->name, $email, CHtml::encode($password));
				$mensaje= str_replace($search, $replace, $mensaje);
				//$mensaje.="<table align='center'  width='445' bgcolor='#434343'><tr><td background='".$urlImages."/mail_top.png' style='text-align:center;padding:10px'>Su usuario es: $email</td></tr><tr><td background='".$urlImages."/mail_bottom.png' style='text-align:center;padding:10px'>Su contraseña es: ".CHtml::encode($password)."</td></tr></table>";
				$asunto="Bienvenido a ".Yii::app()->name." Datos de registro";
				ACMS::sendMail(Yii::app()->params['adminEmail'], $email, $asunto, $mensaje);
				//Enviamos email al administrador
				$mensaje=file_get_contents(Yii::app()->theme->basePath.'/mails/aviso_alta.html');
				$search=array('[RUTA_IMG]','[APP_NAME]','[USUARIO]','[PASS]');
				$replace=array($urlImages, Yii::app()->name, $email, CHtml::encode($password));
				$mensaje= str_replace($search, $replace, $mensaje);
				$asunto="Nuevo usuario dado de alta.";
				ACMS::sendMail($email, Yii::app()->params['adminEmail'], $asunto, $mensaje);

				$result="Gracias por registrarse, le hemos enviado a su email los datos de acceso.";
			}else{
				$result="Disculpe las molestias pero no hemos podido realizar el registro, intentelo m&aacute;s tarde.";
			}

		}else{
			$result="El correo electronico introducido ya existe.";
		}
		$this->renderPartial('_ajaxGenericContent',array('text'=>$result));
	}

        protected function newComment($post){
             $comment=new Comment;

            if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
            {
                echo CActiveForm::validate($comment);
                Yii::app()->end();
            }

            if(isset($_POST['Comment']))
            {
                $comment->attributes=$_POST['Comment'];
                if($post->addComment($comment))
                {
                    //Enviamos correo a administrador
                    $urlImages="http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].Yii::app()->theme->baseUrl."/images";
                    $urlAdmin="http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].Yii::app()->params['path']."admin.php?r=comments&id=".$comment->idComment;
                    $mensaje=file_get_contents(Yii::app()->theme->basePath.'/mails/aviso_newComment.html');
                    $search=array('[RUTA_IMG]','[APP_NAME]','[AUTOR]','[EMAIL]','[URL]','[COMMENT]','[RUTA_ADMIN]','[ARTICULO_TITULO]');
                    $replace=array($urlImages, Yii::app()->name, $comment->author, $comment->email, $comment->url,$comment->content, $urlAdmin ,ACMS::getTitle($post) );
                    $mensaje= str_replace($search, $replace, $mensaje);
                    $asunto="New comment.";
                    ACMS::sendMail($comment->email, Yii::app()->params['adminEmail'], $asunto, $mensaje);

                    

                    if($comment->approved==Comment::STATUS_PENDING)
                        Yii::app()->user->setFlash('commentSubmitted','Comentario pendiente de aprovación.<br>Gracias por su comentario.');
                    $this->refresh();
                }
            }
            return $comment;
        }


	/**
	 * Page Action
	 */
	public function actionPage()
	{
		if(isset($_GET['id']))
		{
                    if(isset($_GET['preview'])){
                        if($_GET['preview']==1 && !Yii::app()->user->isGuest){
                            $user=User::model()->findByPk(Yii::app()->user->id);
                            if($user->checkPerms(User::PERM_NOTICIAS || User::PERM_PAGINAS))
                                $page=Article::model()->findByPk($_GET['id']);
                        }
                    }else{
                            $page=Article::model()->findByPk($_GET['id'],'published=true');
                    }
                    $comment=$this->newComment($page);
		}
		if($page===null)
			throw new CHttpException(404,'The requested page does not exist.');
		//Incrementamos las visitas y guardamos
		$page->hits++;
		$page->save();
                $template='page';
                if(isset($page->template))
                        if($page->template!='')
                                $template=$page->template;
		$this->render($template,array('model'=>$page, 'newcomment'=>$comment));
	}
        
        /**
	 * Documents Action
	 */
	public function actionDocuments()
	{
		if(isset($_GET['id']))
		{
			$category=Category::model()->findByPk($_GET['id']);
                        
		}
		if($category===null)
			throw new CHttpException(404,'The requested page does not exist.');
		//Incrementamos las visitas y guardamos
		$this->render('documents',array('model'=>$category));
	}

	/**
	 * Agenda Events Action
	 */
	public function actionAgendaEvents()
	{
		$fecha=getDate();
		if(isset($_GET['mon']))
			$mon=$_GET['mon'];
		else
			$mon=$fecha['mon']-1;
		$anyo=$fecha['year']+floor(($mon)/12);
		$mon=($mon%12)+1;

		$cond='MONTH(date)='.$mon.' and YEAR(date)='.$anyo;

		if(isset($_POST['id'])){
			if($_POST['id']!='null'){	
				$cond=$cond."  and idAgenda=".$_POST['id'];	

				$dataProvider=new CActiveDataProvider('Evento', array(
							'criteria'=>array(
								'condition'=>$cond,
								'order'=>'date ASC',
								),
							));
				$agenda=Agenda::model()->findByPk($_POST['id']);
				$this->renderPartial('agenda_events',array(
							'dataProvider'=>$dataProvider,
							'agenda'=>$agenda,
							));
			}
		}
	}

        /**
         * Ajax Json Action for Events
         */
        public function actionAjaxEventsDates(){
            $fecha=getDate();
            /*if(isset($_GET['mon']))
                    $mon=$_GET['mon'];
            else
                    $mon=$fecha['mon'];

            $anyo=$fecha['year'];
            */
            //$cond=' MONTH(date)='.$mon.' and YEAR(date)='.$anyo.' order by date ASC';
            

            $eventos=Evento::model()->findAll();
            
            $this->renderPartial("jsonEvents",array('eventos'=>$eventos));

        }

	/**
	 * Agenda Action
	 */
	public function actionAgenda()
	{
		$fecha=getDate();
                $cond="";
                $params=array('order'=>'date ASC');
                if(isset($_GET['date'])){
                    //Existe una fecha fija?
                    $fecha=$_GET['date'];
                    $fechaArr=split("_", $fecha);
                    $cond='MONTH(date)='.$fechaArr[0].' and YEAR(date)='.$fechaArr[2].' and DAY(date)='.$fechaArr[1];
                }else if(isset($_GET['show'])){
                    $cond='idEvento='.$_GET['show'];
                }else{
                    //Si no se selecciona una fecha, miramos si se ha seleccionado un mes
                    if(isset($_GET['mon']))
                            $mon=$_GET['mon'];
                    else //En caso contrario el mes actual
                            $mon=$fecha['mon'];

                    $anyo=$fecha['year'];
                    $cond='MONTH(date)='.$mon.' and YEAR(date)='.$anyo;
                    $params["limit"]=4;
                }
                $eventos=Evento::model()->findAll($cond, $params);
		/*$dataProvider=new CActiveDataProvider('Evento', array(
					'criteria'=>array(
						'condition'=>$cond,
						'order'=>'date ASC',
						),
					'pagination'=>false,
					));

                 */

		$this->render('agenda',array(
					'eventos'=>$eventos,
					));
	}

	public function actionBanner(){
		if(isset($_GET['id'])){
			$idBanner=$_GET['id'];
			$banner=Banner::model()->findByPK($idBanner);
			$banner->visits++;
			$banner->save();
			$this->redirect($banner->link);
		}else{
			throw new CHttpException(404,'The requested page does not exist.');	
		}
	}

	public function actionVideo(){
		$isplaylist=false;
		$playlistID='';
		$playlistName='';
		if(isset($_GET['playlist']))
		{
			$isplaylist=true;
			$playlistID=$_GET['playlist'];
			$playlists=ACMS::listadoPlaylists();
			$playlistName=$playlists[$playlistID];
		}

		$videos=ACMS::getVideoList($playlistID);		

		$this->render('video', array(
					'isplaylist'=>$isplaylist,
					'playlistID'=>$playlistID,
					'playlistName'=>$playlistName,
					'videos'=>$videos,
					));
	}

	/**
	 * News Action
	 */
	public function actionNews()
	{
            
            
            /**
             * Multiples categorias, seleccionar las noticias mas actuales
             * de la categoria seleccionada y las categorias descendientes 
             */
		$cond='type="news" and published=true and date <=NOW()';
                $with=array();
                $join="";
		if(isset($_GET['idCat'])){
			if($_GET['idCat']!='0'){
                            /**
                             * Recogemos todos los identificadores 
                             * de la categoria seleccionada y sus hijos
                             */
                            $categoria=ArticleCategory::model()->findByPk($_GET['idCat']);
                            $categorias=ACMS::getChildCategories($categoria);
                            $catCond=join(' or category=',$categorias);
                            $cond=$cond.' and (category='.$catCond.')';
                        }
                }
                
                if(isset($_GET['idTag'])){
                    $join=$join.' JOIN Article_has_Tag As AT ON AT.idArticle=t.idArticle ';
                    $cond=$cond.' and AT.idTag='.$_GET['idTag'];
                }

		$pag=self::PAGE_SIZE;
		if(isset($_GET['ps']))
			$pag=$_GET['ps'];

                
                $template='news';
                if(isset($categoria))
                    if(isset($categoria->template))
                        if($categoria->template!='')
                                $template=$categoria->template;
                
                
		$dataProvider=new CActiveDataProvider('Article', array(
					'criteria'=>array(
                                                'join'=>$join,
                                                'with'=>$with,
						'condition'=>$cond,
                                		'order'=>'home, date DESC',
                                                ),
					'pagination'=>array(
						'pageSize'=>$pag,
						),
					));
                
                
                
                        
                        
                        
		$this->render($template,array(
					'dataProvider'=>$dataProvider,
					));
	}

	/**
	 * AjaxPlugin Action
	 **/
	public function actionAjaxPlugin(){
		if(isset($_POST['plugin'])){
			$plugin=$_POST['plugin'];
			//Incluimos los archivos necesarios del plugin
			require_once(Yii::app()->basePath.'/../plugins/'.$plugin.'_plugin.php');
			$objectType=$plugin."_ajax";
			$pObject= new $objectType;
			$pObject->init();
			$pObject->render();
		}else{
			throw new CHttpException(404,'The requested page does not exist.');	
		}
	}

        

	/**
	 * RSS
	 *
	 * type:
	 *	0 - All news 
	 *	1 - News
	 *	2 - Agenda
	 * cat: identificador de la categoria de noticia.
	 *
	 * El rss sera de las noticias o una categoria de las noticias o de la agenda del
	 *	
	 **/
	


	public function actionRss(){

		$type=0;
		$cat=0;

		if(isset($_GET['type'])){
			$type= $_GET['type'];
			
		}
		switch($type){
			case 0:
			case 1:
				//$cond='type="news" and published=true';
				$cond='type="news" and published=true and date <=NOW()';
				/*if($cat!=0)
					$cond='type="news" and published=true and category='.$cat;
				*/
				if(isset($_GET['idCat'])){
					$categoria=ArticleCategory::model()->findByPk($_GET['idCat']);
					$categorias=ACMS::getChildCategories($categoria);
					$catCond=join(' or category=',$categorias);
					$cond=$cond.' and (category='.$catCond.')';
				}
				
				$pag=self::PAGE_SIZE;
				if(isset($_GET['ps']))
					$pag=$_GET['ps'];

				$dataProvider=new CActiveDataProvider('Article', array(
							'criteria'=>array(
								'condition'=>$cond,
								'order'=>'date DESC',
								),
							'pagination'=>array(
								'pageSize'=>$pag,
								),
							));
				break;
			case 2:
				$fecha=getDate();
				if(isset($_GET['mon']))
					$mon=$_GET['mon'];
				else
					$mon=$fecha['mon'];
				$mon=$mon%12;
				$anyo=$fecha['year']+(int)($mon/12);

				$cond='MONTH(date)='.$mon.' and YEAR(date)='.$anyo;

				$dataProvider=new CActiveDataProvider('Evento', array(
							'criteria'=>array(
								'condition'=>$cond,
								'order'=>'date ASC',
								),
							'pagination'=>false,
							));

				break;
		}

		$this->render('rss',array('type'=>$type,
					'dataProvider'=>$dataProvider,
					));



	}

	public function actionRss2(){

		$type=0;
		$cat=0;

		if(isset($_GET['type'])){
			$type= $_GET['type'];
			
		}
		switch($type){
			case 0:
			case 1:
				//$cond='type="news" and published=true';
				$cond='type="news" and published=true and date <=NOW()';
				/*if($cat!=0)
					$cond='type="news" and published=true and category='.$cat;
				*/
				if(isset($_GET['idCat'])){
					$categoria=ArticleCategory::model()->findByPk($_GET['idCat']);
					$categorias=ACMS::getChildCategories($categoria);
					$catCond=join(' or category=',$categorias);
					$cond=$cond.' and (category='.$catCond.')';
				}
				
				$pag=self::PAGE_SIZE;
				if(isset($_GET['ps']))
					$pag=$_GET['ps'];

				$dataProvider=new CActiveDataProvider('Article', array(
							'criteria'=>array(
								'condition'=>$cond,
								'order'=>'date DESC',
								),
							'pagination'=>array(
								'pageSize'=>$pag,
								),
							));
				break;
			case 2:
				$fecha=getDate();
				if(isset($_GET['mon']))
					$mon=$_GET['mon'];
				else
					$mon=$fecha['mon'];
				$mon=$mon%12;
				$anyo=$fecha['year']+(int)($mon/12);

				$cond='MONTH(date)='.$mon.' and YEAR(date)='.$anyo;

				$dataProvider=new CActiveDataProvider('Evento', array(
							'criteria'=>array(
								'condition'=>$cond,
								'order'=>'date ASC',
								),
							'pagination'=>false,
							));

				break;
		}

		$this->render('rss2',array('type'=>$type,
					'dataProvider'=>$dataProvider,
					));



	}

	function actionSearch(){
		if(isset($_GET['s'])){
			$search_string=$_GET['s'];
			if(strlen($search_string)>3){	
				//Aqui guardaremos los contenidos con coincidencia
				$match_contents=array();
				//recogemos todos los contenidos del portal
				$contenidos=Article::model()->findAll('published=true');
				//Convertimos la busqueda en minusculas
				$search_string=strtolower($search_string);
				//Buscamos las palabras sueltas
				$search_string_array=explode(" ",$search_string);
				//Para cada contenido buscamos las coincidencias por cada palabra
				foreach($contenidos as $contenido){
					$texto=strtolower(strip_tags(ACMS::getText($contenido)));
					$titular=ACMS::getTitle($contenido);
					$total_words=str_word_count($texto,0);
					$total_match=0;
					foreach($search_string_array as $word){
						$total_word_match=substr_count($texto, $word);
						$total_match+=$total_word_match;
					}
					//si existen coincidencias calculamos su puntuacion y agregamos el enlace a los contenidos encontrados
					//La puntuacion es el numero de coincidencias del texto buscado en el total de palabras
					if($total_match!=0){
						$score=$total_match/$total_words;
						$url='';
						
						//$menu=Menu::model()->find(array('condition'=>"active=true and link='page' and params='$contenido->idArticle'"));
						//if($contenido->type=='page'){
							$menu=Menu::model()->find(array('condition'=>"active=true and link='page' and params='$contenido->idArticle'"));
						/*}else*/ if($contenido->type=='news'){
							$menu=Menu::model()->find(array('condition'=>"active=true and link='news' and params='$contenido->category'"));
						}
						if($menu!=null){	
						$url='index.php?r=site/page&id='.$contenido->idArticle.'&idm='.$menu->idMenu;
						}else{
						$url='index.php?r=site/page&id='.$contenido->idArticle;
						}
						$textoMostrar="...".substr($texto,stripos($texto,$search_string_array[0]-50),100)."...";	
						$textoMostrar=str_replace($search_string_array[0],'<b>'.$search_string_array[0].'</b>',$textoMostrar);
						if($menu!=null){
                                                    if($menu->access_level!=ACMS_PRIVATE){
                                                        $object=array('id'=>$contenido->idArticle,'score'=>$score,'text'=>$textoMostrar,'url'=>$url,'title'=>$titular);
                                                        array_push($match_contents, $object);
                                                    }
                                                }
					}
				}
				$dataProvider=new CArrayDataProvider($match_contents, array(
					'id'=>'searchItems',
					'sort'=>array(
						'attributes'=>array(
							'score',
						),
					),
					'pagination'=>array(
					        'pageSize'=>10,
					),
					
				));
				$this->render('search', array(
					'dataProvider'=>$dataProvider,
				));
			}
		}
		//$this->redirect(Yii::app()->user->returnUrl);

	}
        
        
        function actionImage(){
            if(isset($_GET['w']) && isset($_GET['h']) && isset ($_GET['src']) ){
                $src=$_GET['src'];
                $w=$_GET['w'];
                $h=$_GET['h'];
                
                $image=Yii::app()->image->load($src);
                $image->resize($w,$h);
                $image->render();
            }else{
                throw new CHttpException(404,'The requested page does not exist.');	
            }
            
        }
        

}
