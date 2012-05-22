<?php
$this->pageTitle=Yii::app()->name . ' - Contacto';
$this->layout="column2";
$this->portlets[]=array('BannerViewer',array('section'=>2,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('BannerViewer',array('section'=>3,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('SportEventsWidget', array());
$this->portlets[]=array('SportEventsSearchWidget', array());
$this->portlets[]=array('MailChimp', array());
$this->portlets[]=array('Siguenos',array('urlTwitter'=>'@eurotri','urlFacebook'=>'http://www.facebook.com/pages/Eurotri/168637049863680'));
$this->portlets[]=array('FacebookBox',array());


 $cs=Yii::app()->clientScript;

 $cs->registerScript('contactarScript',
   '
       $(function() {
            $("div.transformContact").jqTransform();
       });
       ',
   CClientScript::POS_HEAD);
   
?>
<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/banner_protagonista_big.png" style="margin-top:0px;">
<div class="center_coliz" style="width:520px;">

<h1 style="font-size:14px;">Quiero ser protagonista</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="success" style="margin-top:30px;">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p><br/>¿Te gustaría poder compartir tu historia con la comunidad triatleta? ¿Hay algo
de especial en tu vida como triatleta que creas pueda resultar interesante para
compartir? ¿Un reto difícil de conseguir? ¿Una rutina especial? ¿Por qué razón te
sientes un triatleta diferente o especial?<br/><br/> Si te sientes identificado con alguna de
estas preguntas, ponte en contacto con nosotros para ser el protagonista de la
semana en Eurotri.<br/><br/></p>


<div class="contact clearfix" style="width:500px;">

<?php echo CHtml::beginForm(); ?>

        <div class="errorsumary">
	<?php echo CHtml::errorSummary($model); ?>
	</div>	
	

	<div class="clearfix" style="margin-bottom:10px;">
	<div style="display:inline; float:left; width:235px; margin-right:30px;">
		<?php echo CHtml::activeTextField($model,'name',array('value'=>'Nombre')); ?>
	</div>
	<div  style="display:inline; float:left; width:235px;">	
		<?php echo CHtml::activeTextField($model,'surname',array('value'=>'Apellidos')); ?>
	</div>
	</div>

	<div class="clearfix" style="margin-bottom:10px;">
	<div style="display:inline; float:left; width:235px; margin-right:30px;">
		<?php echo CHtml::activeTextField($model,'email',array('value'=>'Email')); ?>
	</div>
	<div  style="display:inline; float:left; width:235px;">	
		<?php echo CHtml::activeTextField($model,'telefono',array('value'=>'Teléfono')); ?>
	</div>
	</div>

	<div class="clearfix" style="width:500px; margin-bottom:10px;">
		<?php echo CHtml::activeLabelEx($model,'body',array('id'=>'labelBody')); ?>
		<?php echo CHtml::activeTextArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<?php if(extension_loaded('gd')): ?>
	<div class="clearfix">
	<?php echo CHtml::activeLabelEx($model,'verifyCode'); ?>
	</div>
	<div class="clearfix" style="margin-bottom:10px;">
		<div class="col50 captcha"  style="padding:0px;">
		<?php $this->widget('CCaptcha'); ?>
		</div>
		<div class="col50"  style="padding:0px; font-size:11px;">
		Por favor, introduce los caracteres de la imagen<br/><br/>
		<?php echo CHtml::activeTextField($model,'verifyCode'); ?>
		</div>

	</div>
	<?php endif; ?>

	<div class="submit">
		<?php echo CHtml::submitButton(''); ?>
	</div>

<?php echo CHtml::endForm(); ?>
<br><br>
<p style="margin-top:30px;font-size:10px;line-height:11px; color:#777;">Según el articulo 5 de la Ley 15/1999 de 13 de Diciembre de Protección de Datos de Carácter Personal, en alusión al derecho de información de los afectados, los datos recogidos en el presente formulario de recogida de datos, únicamente serán tratados con la finalidad de facilitarle la información que nos solicita y salvo que usted ejerza su derecho de cancelación al tratamiento de los mismos, mantenerle informado de las novedades, promociones y información que consideramos pueda ser de su interés.</p>

<p style="font-size:10px;line-height:11px; color:#777;">Eurotriatlon S.L con dirección en Calle Conde Salvatierra 13  46004 Valencia como responsable de los ficheros previamente declarados en el Registro general de la Agencia Española de Protección de datos.</p>

<p style="font-size:10px;line-height:11px; color:#777;">Usted podrá ejercer sus derechos de acceso, rectificación o cancelación y oposición adjuntando escrito junto con documento identificativo acreditativo a la dirección del Responsable del Fichero.</p>

</div><!-- form -->

<?php endif; ?>
</div>
