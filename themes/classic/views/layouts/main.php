<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="language" content="es" />

	<title><?php echo $this->pageTitle; ?></title>
	<meta name="description" content="">

	<!-- Mobile viewport optimized: h5bp.com/viewport -->
	<meta name="viewport" content="width=device-width">

	<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/framework.css">

 	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/modernizr.basic.js"></script>	
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.7.2.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.tools.min.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/Artres/bannerTransitions.js"></script>
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.min.js"></script>
	<!--para los formularios-->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/Artres/autoinput.js"></script>


	<!--para las imagenes con enlace-->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/Artres/fadeImage.js"></script>

	<!--para las diapositivas-->
	<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/Artres/diapositivas.js"></script>
	<!--[if IE]>
	<script type="text/javascript">
	var e = ("abbr,article,aside,audio,canvas,datalist,details,figure,footer,header,hgroup,mark,menu,meter,nav,output,progress,section,time,video").split(',');
	for (var i=0; i<e.length; i++) {
	document.createElement(e[i]);
	}
	</script>
	<![endif]-->

</head>
<body>
	<header>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
			    <div class="container">
			 
			      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
			      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			      </a>
			 
			      <!-- Be sure to leave the brand out there if you want it shown -->
			      <a class="brand" href="#"><?php echo CHtml::encode(Yii::app()->name); ?></a>
			 
			      <!-- Everything you want hidden at 940px or less, place within here -->
			      <div class="nav-collapse">
				<!-- .nav, .navbar-search, .navbar-form, etc -->
				<?php $this->widget("UserMenu",array('display_in'=>'0','style'=>'nav','recursive'=>true)); ?>
			      </div>
			 
			    </div>
			  </div>
		</nav>
	</header>
	<div id="wrapper" class="container" role="main">
		<?php echo $content; ?>
	</div><!-- page -->
	<footer>
		<div class="container">
	        @copyright Artres. Based on <a href="http://twitter.github.com/bootstrap/index.html" target="_blank">Bootstrap </a> and <a href="http://jquerytools.org/" target="_blank">jquery tools</a>
		</div>
	</footer><!-- footer -->

<?php echo ACMS::getAnalyticsCode(); ?>
</body>
</html>
