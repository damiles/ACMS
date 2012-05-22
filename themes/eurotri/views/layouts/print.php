<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo YII::app()->getLanguage()?>" lang="<?php echo YII::app()->getLanguage()?>" xmlns:og="http://ogp.me/ns#" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo YII::app()->getLanguage()?>" />
        
        
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/favicon.ico" />
        

	<?php 
        $cs=Yii::app()->clientScript;
        $cs->registerCoreScript('jquery');//Old Version
        $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/Artres/imageCaption.js', CClientScript::POS_HEAD);
        
        $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/fancybox/jquery.mousewheel-3.0.4.pack.js', CClientScript::POS_HEAD);
        $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/fancybox/jquery.fancybox-1.3.4.pack.js', CClientScript::POS_HEAD);
        
        $cs->registerCssFile(Yii::app()->request->baseUrl.'/js/fancybox/jquery.fancybox-1.3.4.css',  'screen');
        
        $cs->registerCssFile('http://fast.fonts.com/cssapi/d6c4e510-9f9f-43b9-a6d3-0aae33be7fb8.css', 'screen');
        $cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/framework.css',  'screen, projection, print');
        $cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/print.css',  'print,screen');
        
        
        $cs->registerScript('CaptionInit',
                '
                    $(function() {
                        $(".imageCaption").ArtresImageCaption();
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
                                $("#fecha_hora").html(dias[hoy.getDay()]+", "+ hoy.getDate()+" de "+meses[hoy.getMonth()]+" de "+hoy.getFullYear()+" - "+ hoy.getHours()+":"+hoy.getMinutes()+"h");
                                setTimeout("setDateTime()",1000);
                            }
                     $(function(){       
                            setDateTime();
                            
                    });
                '
                ,
                 CClientScript::POS_HEAD);
        
         $cs->registerScript('PrintInit',
                '
                    $(document).ready(function() {
                        window.print();
                    });
                    ',
                CClientScript::POS_HEAD);
        ?> 

        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div id="wrapper">
		
	
		<div id="content">
                    
			<?php echo $content; ?>
                    
		</div><!-- content -->
	
	</div><!-- page -->
	
        
	<?php echo ACMS::getAnalyticsCode(); ?>
	
</body>
</html>
