<?php
$this->layout='main';
//$this->portlets['UserMenu']=array();
//this->portlets['RecentCommentPortlet']=array('count'=>5);
?>

<div class="hero-unit">

<h1><?php $this->pageTitle=Yii::app()->name; ?></h1>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>
<p>You are using this language: <?php  echo Yii::app()->getLanguage();?></p>
<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <tt><?php echo __FILE__; ?></tt></li>
	<li>Layout file: <tt><?php echo $this->getLayoutFile('main'); ?></tt></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
</div>

		<!-- Main hero unit for a primary marketing message or call to action -->
	      <div class="hero-unit">
		<h1>Base HTML5 de Artres.</h1>
		<p>Esta base, es la inicial para cualquier proyecto de Artres, incluye todo los javascript que necesites, y la estructura base con la que trabajar. Copia este todos los archivos exceptuando la carpeta noCopy a tu carpeta del proyecto para comenzar a trabajar y sobreescribe este archivo (index.html)</p>
		<p><a class="btn btn-primary btn-large" href="noCopy/doc.html">Ir a la documentación &raquo;</a></p>
	      </div>

	      <!-- Example row of columns -->
	      <div class="row">
		<div class="span4">
		  <h2>Bootstrap</h2>
		  <p>Es la librería de estilos principal que vamos a usar, desarrollada por la gente de twitter, y que se basa en un conjunto de css y javascript que permite el diseño basado en 12 columnas, y adaptable a los dispositivos moviles, tablets o pc. Tambien añade distintos componentes como tooltips, Bootones, Ventanas emergentes, pestañas, menus y desplegables</p>
		  <p><a class="btn" href="http://twitter.github.com/bootstrap/index.html">Documentación &raquo;</a></p>
		</div>
		<div class="span4">
		  <h2>JqueryTools</h2>
		  <p>JqueryTools es una colección de componentes de interfaz de usuario como son tabs, tooltips, ventanas emergentes,... aunque podemos hacer uso de algunos de bootstrap, también podemos usar estos indistintamente, el que mejor se adapte a nuestras necesidades. </p>
		  <p><a class="btn" href="http://jquerytools.org/demos/tabs/index.html">Documentación &raquo;</a></p>
	       </div>
		<div class="span4">
		  <h2>ArtresJS</h2>
		  <p>Hemos desarrollado un conjunto de elementos más utilizados para abstraernos de bootstrap y jquerytools, para facilitar el trabajo de diseño y desarrollo. Si no encuentras lo que deseas aquí, entonces vamos a recurrir a Bootstrap o JqueryTools.</p>
		  <p><a class="btn" href="noCopy/doc.html">Documentación &raquo;</a></p>
		</div>
	      </div>




