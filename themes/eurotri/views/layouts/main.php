<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo YII::app()->getLanguage()?>" lang="<?php echo YII::app()->getLanguage()?>" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo YII::app()->getLanguage()?>" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<meta name="description" content="<?php echo CHtml::encode($this->pageTitle); ?>" />
        <?php $this->widget('OpenGraphFacebook', 
                array('email'=>'prensa@eurotri.com',
                    'phone'=>'963354723',
                    'image'=>Yii::app()->request->hostInfo.'/facebook.png', 
                    'type'=>'sport', 
                    'titular'=>CHtml::encode($this->pageTitle), 
                    'site_name'=>Yii::app()->name, 
                    'app_id'=>'108289235933467'));?>
        
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" />
        

	<?php 
        $cs=Yii::app()->clientScript;
	Yii::app()->minScript->generateScriptMap();
        
	$cs->registerCoreScript('jquery');//Old Version
        $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/Artres/imageCaption.js', CClientScript::POS_HEAD);
        
        $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/fancybox/jquery.mousewheel-3.0.4.pack.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/fancybox/jquery.fancybox-1.3.4.pack.js', CClientScript::POS_HEAD);
        
        $cs->registerCssFile(Yii::app()->request->baseUrl.'/js/fancybox/jquery.fancybox-1.3.4.css',  'screen');
        
        $cs->registerCssFile('http://fast.fonts.com/cssapi/d6c4e510-9f9f-43b9-a6d3-0aae33be7fb8.css', 'screen');
        $cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/reset.css',  'screen, projection');
        $cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/layout.css',  'screen, projection');
        
        
        $cs->registerScript('CaptionInit',
                '
                    $(function() {
                        $(".imageCaption").ArtresImageCaption();
                        $(".imagecaption").ArtresImageCaption();
                    });
                    ',
                CClientScript::POS_HEAD);
        
        $cs->registerScript('InputInit',
                '
                    $(function() {
                        $("input").each(function(index){
                            var defaultVal=$(this).val();
                            $(this).focusin(function(){
                                if($(this).val()==defaultVal)
                                    $(this).val("");
                            });
                            $(this).focusout(function(){
                                if($(this).val()=="")
                                    $(this).val(defaultVal);
                            });
                        });
                    });
                    ',
                CClientScript::POS_HEAD);
        
        $cs->registerScript('PopupInit',
                '
                    $(function() {
                        $(".popup").fancybox();
                    });
                    ',
                CClientScript::POS_HEAD);
        
        $cs->registerScript('DateInit',
                '
                    
                    
                            function setDateTime(){
                                var meses=new Array("Enero", "Febrero", "Marzo", "Abril","Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
                                var dias=new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
                                var hoy=new Date();
                                //$("#fecha_hora").html(dias[hoy.getDay()]+", "+ hoy.getDate()+" de "+meses[hoy.getMonth()]+" de "+hoy.getFullYear()+" - "+ hoy.getHours()+":"+hoy.getMinutes()+"h");
                                $("#fecha_hora").html( hoy.getDate()+" de "+meses[hoy.getMonth()]+" de "+hoy.getFullYear()+" - "+ hoy.getHours()+":"+hoy.getMinutes()+"h");
                                setTimeout("setDateTime()",1000);
                            }
                     $(function(){       
                            setDateTime();
                            
                    });
                '
                ,
                 CClientScript::POS_HEAD)
        ?> 

        
</head>

<body>
<!-- Acceso comunidad -->
<div class="fondo_naranja">
		<div class="wrapper_encabezado">
		<a href="http://comunidad.eurotri.com" target="_blank" class="imagen_encabezado">Comunidad de triatlón</a>
		<form id="formulario_encabezado" enctype="aplication/x-www-form-urlencoded" name="formulario_enc" method="post" action="http://comunidad.eurotri.com/login">
			<input type="text" class="caja_encabezado" name="email" value="Nombre de usuario" onFocus="javascript:this.value=''"/>
			<input type="password" class="caja_encabezado2" name="password" value="Contraseña" onFocus="javascript:this.value=''"/>
			<button class="boton_acceso" type="submit">Acceder</button>
			<div class="bloque_elecciones">
				<div class="clearfix">
				<input type="checkbox" class="elecciones_encabezado" name="sesion" value="remember" id="sesion"/>
				<label for="sesion" class="texto_elecciones">No cerrar sesión</label>
				</div>
				<div class="margen_elecciones clearfix">
				<a class="enlace_contrasena" href="http://comunidad.eurotri.com/user/auth/forgot">Recordar la contraseña</a>
				</div> 
			</div> 
			<a href="http://comunidad.eurotri.com/signup" class="boton_registro">Regístrate</a>
		 
		</div>
	</div>
<!-- Fin acceso comunidad -->
	<div id="wrapper">
		<div id="header">
			<h3><a href="index.php" id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></a></h3>
	        	<div id="topmenu">
	        		<?php //$this->widget("UserMenu",array('display_in'=>'1')); ?>
	            		<?php //$this->widget("LangSel");?> 
	        	</div>
                        <div id="banner_top">
                            <?php 
				$r=rand(0,1);
				//if($r==0):
				if(true):
					$this->widget('BannerViewer', array('section'=>1, 'type'=>0,'customClass'=>'')); 
				else:
				?>
<script type="text/javascript">
var uri = 'http://impes.tradedoubler.com/imp?type(img)g(20166842)a(2040737)' + new String (Math.random()).substring (2, 11);
document.write('<a href="http://clk.tradedoubler.com/click?p=62099&a=2040737&g=20166842" target="_BLANK"><img src="'+uri+'" border=0></a>');
</script>
				<?php endif; ?>
                     			</div>
		</div><!-- header -->
	        
		<div id="mainmenu">
	             <?php $this->widget("UserMenu",array('display_in'=>'0','style'=>'','style_sub'=>'dir','recursive'=>true, 'defaultMenu'=>'7')); ?>
                    <div class="buscador">
		        	<div id="lay_buscador">
			            <label class="hidde" for="buscar">Busca en eurotri</label>
			            <form method="GET" id="formSearch" action="index.php" style="margin-top:0px;">
					<input type="hidden" name="r" value="search" />		
                                        <input type="text" id="buscar" name="q"  value="Buscar en Eurotri"></input>
					<button type="submit"><span class="hidde">Buscar</span></button>
			            </form>
		        	</div>
		  	</div>
                    <div id="fecha_hora">
                        
                    </div>
	        </div><!-- mainmenu -->
	
		<div id="content">
                    
			<?php echo $content; ?>
                    
		</div><!-- content -->
	
	</div><!-- page -->
	
        <div id="footer">
           
            
            <div id="footer_img">
                <div id="footer_content">
                    <a href="index.php" class="minilogo">Eurotri</a>
                    <div id="footermenu">
                        <?php $this->widget("UserMenu",array('display_in'=>'1')); ?>
                    </div><!-- mainmenu -->
                    <div class="clearfix">
				<div class="col1">
					<div class="top_submenu">
						<a href="index.php?r=site/index&id=5&title=Lo_más_destacado_de_la_semana&idm=7">Home</a>
					</div>
					<ul class="menu_list">
						<li><a href="index.php?r=site/index&id=5&title=Lo_más_destacado_de_la_semana&idm=7">Lo más destacado de la semana</a></li>
						<li><a href="index.php?r=site/news&idCat=6&title=Actualidad_Nacional&idm=8">Actualidad Nacional</a></li>
						<li><a href="index.php?r=site/news&idCat=7&title=Actualidad_Internacional&idm=9">Actualidad Internacional</a></li>
						<li><a href="index.php?r=site/news&idCat=8&title=Entrevistas&idm=10">Entrevistas</a></li>
					</ul>
				</div>
				<div class="col2">
					<div class="top_submenu">
						<a href="index.php?r=site/news&idCat=9&title=Artículos&idm=2">Artículos</a>
					</div>
					<ul class="menu_list">
						<li><a href="index.php?r=site/news&idCat=14&title=Nutrición&idm=11">Nutrición</a></li>
						<li><a href="index.php?r=site/news&idCat=15&title=Entrenamiento&idm=12">Entrenamiento</a></li>
						<li><a href="index.php?r=site/news&idCat=16&title=Medicina_deportiva&idm=13">Medicina deportiva</a></li>
						<li><a href="index.php?r=site/news&idCat=17&title=Psicología_deportiva&idm=14">Psicología deportiva</a></li>
                                                <li><a href="index.php?r=site/news&idCat=35&title=Paratriatlón&idm=69">Paratriatlón</a></li>
					</ul>
				</div>
				<div class="col3">
					<div class="top_submenu">
						<a href="index.php?r=site/news&idCat=12&title=Multimedia&idm=4">Multimedia</a>
					</div>
					<ul class="menu_list">
						<li><a href="index.php?r=site/news&idCat=18&title=Técnica_de_natación&idm=25">Técnica de natación</a></li>
						<!--<li><a href="index.php?r=site/news&idCat=19&title=Técnica_de_carrera&idm=26">Técnica de carrera</a></li>
						<li><a href="index.php?r=site/news&idCat=20&title=Ciclismo&idm=27">Ciclismo</a></li>
						<li><a href="index.php?r=site/news&idCat=21&title=Mecánica&idm=28">Mecánica</a></li>-->
					</ul>
				</div>
				<div class="col4">
					<div class="top_submenu">
						<a href="index.php?r=site/news&idCat=11&title=Material&idm=3">Material técnico</a>
					</div>
					<ul class="menu_list">
						<li><a href="index.php?r=site/news&idCat=4&title=Natación&idm=21">Natación</a></li>
						<li><a href="index.php?r=site/news&idCat=22&title=Ciclismo&idm=22">Ciclismo</a></li>
						<li><a href="index.php?r=site/news&idCat=23&title=Carrera&idm=23">Carrera</a></li>
						<li><a href="index.php?r=site/news&idCat=24&title=Otros&idm=24">Otros</a></li>
					</ul>
				</div>
				<div class="col5">
					<div class="top_submenu">
						<a href="index.php?r=SportsEvents&idm=29">Eventos</a>
					</div>
					<ul class="menu_list">
						<li><a href="index.php?r=SportsEvents&idm=29">Buscador de pruebas</a></li>
						<li><a href="index.php?r=SportsEvents/sportEvent/searchEvents&idm=30">Resultados</a></li>
						<li><a href="index.php?r=site/spage&view=federaciones&idm=34">Federaciones de triatlón</a></li>
						<li><a href="index.php?r=site/spage&view=calculadora&idm=35">Calculadora de tiempos</a></li>
                                                <li><a href="index.php?r=entrenamientos&idm=73">Entrenamiento</a></li>
					</ul>
				</div>
				<!--<div class="col6">
					<div class="top_submenu">
						<a href="#">Comunidad</a>
					</div>
					<ul class="menu_list">
						<li><a href="#">Primeros pasos</a></li>
						<li><a href="#">Alta / Registro</a></li>
						<li><a href="#">Preguntas frecuentes</a></li>
						<li><a href="#">Solicitar ayuda</a></li>
						<li><a href="#">Clubs de triatlón</a></li>
					</ul>
				</div>
                                -->
			</div>
                </div>
            </div>
        </div><!-- footer -->
	<?php echo ACMS::getAnalyticsCode(); ?>
	
</body>
</html>