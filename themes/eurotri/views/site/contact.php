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
<div class="center_coliz">
<h1>Contactar</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>Por favor, lea cuidadosamente lo siguiente antes de contactar con Eurotri:<br><br>

1. Si desea enviar noticias, por favor consulte la sección "Enviar Noticias" al final de este formulario de Eurotri donde encontrará más detalles. Si desea enviar sólo un consejo rápido (ya sea anónimo o no), por favor, seleccione "Enviar una sugerencia" a Eurotri".<br><br>
2. Para obtener más información sobre la publicidad, por favor consulte nuestra página de información Eurotri Publicidad. Los paquetes comienzan en 200 euros.<br><br>
3. Si desea utilizar el logotipo de Eurotri o cualquier otro contenido en su sitio, por favor comuníquese con nosotros a través del departamento de prensa, para que podamos atender su solicitud. Por favor sea lo más claro posible.</p>

<div style="border-top:1px solid #D6E0E5; border-bottom:1px solid #D6E0E5; padding:12px 0; margin-top:10px;">
	<span style="font-family:Arial; font-weight:bold; font-size:15px; color:#474747;">Contactar Eurotri</span>
</div>

<div class="contact clearfix" style="width:470px;">

<?php echo CHtml::beginForm(); ?>

        <div class="note transformContact" style="z-index:12;"> 
            <?php echo CHtml::activeDropDownList($model, 'consulta', 
                    array(
                        'Noticia'=>'Enviar noticia',
                        'Sugerencia'=>'Enviar una sugerencia',
                        'Información publicidad'=>'Obtener información publicidad',
                        'Informe de error'=>'Informar sobre un error',
                        'Otros'=>'Otros'), 
                    array(
                        'empty'=>'Seleccione el tipo de consulta', 
                        'onchange'=>'if($("#consultaIds").val()=="Noticia"){$("#ContactForm_subject").val("Titular de la noticia");$("#labelBody").html("Texto de la noticia");}else{$("#ContactForm_subject").val("Asunto");$("#labelBody").html("¿Como puedo ayudarte?*");} return false;', 
                        'style'=>'width: 460px;',
                        'id'=>'consultaIds')
                    ); ?>
            
        </div>

	
	
	<div class="errorsumary">
	<?php echo CHtml::errorSummary($model); ?>
	</div>	
	

	<div class="clearfix" style="margin-bottom:10px;">
	<div style="display:inline; float:left; width:210px; margin-right:30px;">
		<?php echo CHtml::activeTextField($model,'name',array('value'=>'Nombre')); ?>
	</div>
	<div  style="display:inline; float:left; width:210px;">	
		<?php echo CHtml::activeTextField($model,'surname',array('value'=>'Apellidos')); ?>
	</div>
	</div>


	<div class="clearfix" style="margin-bottom:10px;">
	<div style="display:inline; float:left; width:210px; margin-right:30px;">
		<?php echo CHtml::activeTextField($model,'email',array('value'=>'Email')); ?>
	</div>
	<div  style="display:inline; float:left; width:210px;">
		<?php echo CHtml::activeTextField($model,'empresa',array('value'=>'Empresa')); ?>
	</div>
	</div>
	
	<div class="clearfix" style="width:450px; margin-bottom:10px;">
		<?php echo CHtml::activeTextField($model,'subject',array('size'=>60,'maxlength'=>128, 'value'=>'Asunto')); ?>
	</div>

	<div class="clearfix" style="width:450px; margin-bottom:10px;">
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
		<div class="col50"  style="padding:0px;">
		Porfavor, introduce los caracteres de la imagen<br/>
		<?php echo CHtml::activeTextField($model,'verifyCode'); ?>
		</div>

	</div>
	<?php endif; ?>

	<div class="submit">
		<?php echo CHtml::submitButton(''); ?>
	</div>

<?php echo CHtml::endForm(); ?>
<br><br>
<p style="margin-top:30px;">Según el articulo 5 de la Ley 15/1999 de 13 de Diciembre de Protección de Datos de Carácter Personal, en alusión al derecho de información de los afectados, los datos recogidos en el presente formulario de recogida de datos, únicamente serán tratados con la finalidad de facilitarle la información que nos solicita y salvo que usted ejerza su derecho de cancelación al tratamiento de los mismos, mantenerle informado de las novedades, promociones y información que consideramos pueda ser de su interés.</p>

<p>Eurotriatlon S.L con dirección en Calle Conde Salvatierra 13  46004 Valencia como responsable de los ficheros previamente declarados en el Registro general de la Agencia Española de Protección de datos.</p>

<p>Usted podrá ejercer sus derechos de acceso, rectificación o cancelación y oposición adjuntando escrito junto con documento identificativo acreditativo a la dirección del Responsable del Fichero.</p>

</div><!-- form -->

<?php endif; ?>
</div>
