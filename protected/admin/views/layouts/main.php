<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
<?php 
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery');//Old Version

//$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-1.8.0.min.js', CClientScript::POS_HEAD);

$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/admin/framework.css', '');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/ui-lightness/jquery-ui-1.8.23.custom.css', '');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/windows/sexylightbox.css', '');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.delay.js', CClientScript::POS_HEAD);

$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui-1.8.23.custom.min.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/sexylightbox.v2.3.jquery.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/i18n/jquery.ui.datepicker-es.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/admin.js', CClientScript::POS_HEAD);

$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/swfobject.js', CClientScript::POS_HEAD);

$user=User::model()->find('idUser=?', array(Yii::app()->user->getId()));


?> 

        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div id="wrapper">
	
	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
                <div id="topmenu">
                <?php
                     $this->widget('zii.widgets.CMenu',array(
                         'items'=>array(
                            array('label'=>'Home', 'url'=>array('/site/index')),
                            array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Cerrar Sesión ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                            )
                         )
                     );
                 ?>
                </div>
	</div><!-- header -->
        <div id="content">
            
        <div id="mainmenu">

		<?php


		if($user->checkPerms((User::PERM_NOTICIAS | User::PERM_CATEGORIAS | User::PERM_PAGINAS | User::PERM_MENU | User::PERM_AGENDA))){
		?>


             <div class="bloque_naranja">
                <span class="titulo">Contenidos</span>

                <?php
                     $this->widget('zii.widgets.CMenu',array(
                         'items'=>array(
                            array('label'=>'Noticias', 		'url'=>array('/news'), 		'visible'=>$user->checkPerms(User::PERM_NOTICIAS),	'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('news'))?'active':'')),
                            array('label'=>'Categorías', 	'url'=>array('/category'), 	'visible'=>$user->checkPerms(User::PERM_CATEGORIAS),	'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('category'))?'active':'')),
                            array('label'=>'Comentarios', 	'url'=>array('/comment'), 	'visible'=>$user->checkPerms(User::PERM_COMMENTS),	'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('comment'))?'active':'')),
                            array('label'=>'Páginas', 		'url'=>array('/pages'), 	'visible'=>$user->checkPerms(User::PERM_PAGINAS),	'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('pages'))?'active':'')),
                            array('label'=>'Menú', 		'url'=>array('/menus'), 	'visible'=>$user->checkPerms(User::PERM_MENU),		'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('menus'))?'active':'')),
                            array('label'=>'Enlaces', 	'url'=>array('/links'), 	'visible'=>$user->checkPerms(User::PERM_NOTICIAS),	'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('links'))?'active':'')),
                            array('label'=>'Banners', 		'url'=>array('/banner'),  	'visible'=>$user->checkPerms(User::PERM_BANNERS),	'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('banners'))?'active':'')),
                           array('label'=>'Agenda', 		'url'=>array('/agenda'),  	'visible'=>$user->checkPerms(User::PERM_AGENDA),	'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('agenda'))?'active':''), 'itemOptions'=>array('class'=>'')),
                            array('label'=>'Eventos', 		'url'=>array('/eventos'),  	'visible'=>$user->checkPerms(User::PERM_AGENDA),	'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('agenda'))?'active':''), 'itemOptions'=>array('class'=>'last')),
                            
                            )
                         )
                     );
                 ?>
             </div>
		<?php
		}//Fin Contenidos


		if($user->checkPerms((User::PERM_IMAGENES | User::PERM_DOCUMENTOS))){
		?>

            <div class="bloque_azul">
                <span class="titulo">Multimedia</span>
                <?php
                     $this->widget('zii.widgets.CMenu',array(
                         'items'=>array(
                            array('label'=>'Imágenes', 		'url'=>array('/media','type'=>'images'),  	'visible'=>$user->checkPerms(User::PERM_IMAGENES),	'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('media')&&$_GET['type']=='images')?'active':'')),
                            //array('label'=>'Videos', 		'url'=>array('/media'),  			'visible'=>$user->checkPerms(User::PERM_NOTICIAS),	'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('media'))?'active':'')),
                            array('label'=>'Documentos', 	'url'=>array('/media','type'=>'documents'), 	'visible'=>$user->checkPerms(User::PERM_DOCUMENTOS),	'itemOptions'=>array('class'=>'last'),  'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('media')&&$_GET['type']=='documents')?'active':'')),
                            )
                         )
                     );
                 ?>
            </div>
		<?php
		}//Fin Multimedia


		if($user->checkPerms((User::PERM_USUARIOS | User::PERM_PREFERENCIAS))){
		?>
            
  	<div class="bloque_verde">
                <span class="titulo">Sistema</span>
                  <?php
                     $this->widget('zii.widgets.CMenu',array(
                         'items'=>array(
                            array('label'=>'Buscador', 		'url'=>array('/searcher'),  	'visible'=>$user->checkPerms(User::PERM_NOTICIAS),	'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('searcher'))?'active':'')),
                            array('label'=>'Usuarios', 		'url'=>array('/users'), 	'visible'=>$user->checkPerms(User::PERM_USUARIOS),	'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('users'))?'active':'')),
                           array('label'=>'Preferencias', 	'url'=>array('/settings'), 	'visible'=>$user->checkPerms(User::PERM_PREFERENCIAS),	'itemOptions'=>array('class'=>'last'),  'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('settings'))?'active':'')),

                            )
                         )
                     );
                 ?>
            </div>
		<?php }//Fin de sistema
		
		//Inicio plugins
		if($user->checkPerms((User::PERM_PLUGINS))){
			global $plugins;
                        global $modules;
		?>
		<div class="bloque_lila">
			<span class="titulo">Componentes</span>
			<?php
                                $menuElemPlugin=array();
                                foreach($plugins as $plugin=>$data){
                                        $item=array('label'=>$data['pluginName'], 'url'=>array('/plugins','p'=>$plugin,), 'visible'=>$user->checkPerms(User::PERM_PLUGINS), 'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('plugins')&&$_GET['p']==$plugin)?'active':''));
                                        $menuElemPlugin[]=$item;
                                }
                                $this->widget('zii.widgets.CMenu',array(
                                 'items'=>$menuElemPlugin
                                 )
                             );
                         ?>
                        
                        <?php
                                $menuElemPlugin=array();
                                foreach($modules as $plugin=>$data){
                                        $item=array('label'=>$data['pluginName'], 'url'=>array($data['url']), 'visible'=>$user->checkPerms(User::PERM_PLUGINS), 'linkOptions'=>array('class'=>(ACMS::isInMenuAdmin('plugins')&&$_GET['p']==$plugin)?'active':''));
                                        $menuElemPlugin[]=$item;
                                }
                                $this->widget('zii.widgets.CMenu',array(
                                 'items'=>$menuElemPlugin
                                 )
                             );
                         ?>
		</div>
		<?php
		}//Fin de Plugins
		
		
	 ?>
        </div><!-- mainmenu -->
	

	<?php if(isset($this->pageTitle))
			//echo "<h1>$this->pageTitle</h1>";
	?>
                    <?php
                    if(isset($this->menu)){
                        echo "<div class='menu_interior clearfix'>";
                         $this->widget('zii.widgets.CMenu',array(
                             'items'=>$this->menu
                             )
                         );
                         echo "</div>";
                    }
                     ?>
	
		<?php echo $content; ?>
	</div><!-- content -->

	<div id="footer">
		Versi&oacute;n 0.1
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
