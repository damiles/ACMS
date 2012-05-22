<?php
//$this->layout='admin';

$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery');

?>

<h1><div class="icon32_settings"></div>Preferencias</h1>
<br/>
<div>

<div class="portlet ">
    <div class="top verde">Tema y autor</div>
    <div class="flecha_verde"></div>
    <div class="content clearfix" >
    		<strong>Tema: </strong> <?php echo ACMS::getThemeName(); ?>
		<br/>
    		<strong>Autor: </strong><?php echo ACMS::getThemeAuthor(); ?>
	</div>
</div>

<div class="portlet">
    <div class="top verde">Idiomas</div>
    <div class="flecha_verde"></div>
    <div class="content clearfix" >
        <div id="optionLang">
            <?php $this->renderPartial('_ajaxLang', array('lang'=>$lang)); ?>
        </div>
        <div id="LangActions"  style="margin-top: 20px;">
            <a href="#" id="showDefault" class="button">Cambiar idioma predeterminado</a> <a href="#" id="showLang" class="button">Seleccionar idiomas</a>
        </div>
     


        <!-- Listado de idiomas -->
        <div style="display:none" class="listado_idiomas" id="ListLang">
            
            <?php
            echo CHtml::beginform();
            foreach($lang as $item){
                $checked="";
                if($item->selected)
                        $checked="Checked";
                echo "<span class='fixed_width_item'><input type='checkbox' $checked  name='lang[]' value='$item->idLang' id='lang_$item->idLang' /><label for='lang_$item->idLang'>$item->title</label></span>";
            }
            echo CHtml::ajaxSubmitButton (
                'Guardar', //label
                CController::createUrl('settings/updateLang'), // url for request
                array (
                'update'=>"#optionLang",
                'beforeSend' => 'function(){

                  }',
                'complete' => 'function(){
                  $("#ListLang").hide();
                  $("#LangActions").show();
                  $("#optionLang").show();
                  }',
                ),
                array(
                    'class'=>'button'
                )
             );
            echo CHtml::endForm();
            ?>
            
        </div>
    </div>
</div>

<?php 
$titulo="";
$email="";
$analytics="";
$analyticsTableid=ACMS::getAnalyticsId();
$analyticsUser="";
$analyticsPass="";

foreach($settings as $item){
	
	if($item->id==ACMS_SETTINGS_TITLE){
			$titulo=$item->value;
	}else if($item->id==ACMS_SETTINGS_ADMINMAIL){
			$email=$item->value;
	}else if($item->id== ACMS_SETTINGS_ANALYTICS){
			$analytics=$item->value;
	}else if($item->id==ACMS_SETTINGS_ANALYTICS_TABLEID){
			$analyticsTableid=$item->value;
	}else if($item->id==ACMS_SETTINGS_ANALYTICS_USER){
			$analyticsUser=$item->value;
	}else if($item->id==ACMS_SETTINGS_ANALYTICS_PASS){
			$analyticsPass=$item->value;
	}
}
?>

<div class="portlet ">
    <div class="top verde">General</div>
    <div class="flecha_verde"></div>
    <div class="content clearfix" >
        <?php echo CHtml::beginForm();?>
        <label>Directorio de subida de documentos</label><input class="basic" />
        <br/><br/>
        <label>Direcci&oacute;n de correo</label><input class="basic" />
        <br/><br/>
        <label>Palabras clave</label><input class="basic" />
        <br/><br/>
        <label>Descripci&oacute;n del portal</label><input class="basic" />
        
        
        <?php echo CHtml::endForm();?>
    </div>
</div>


<div class="portlet ">
    <div class="top verde">Google Analytics</div>
    <div class="flecha_verde"></div>
    <div class="content clearfix" >
        <?php echo CHtml::beginForm();?>
        <label>Google code:</label>
        <br/>
        <textarea cols="60" rows="8"><?php echo $analytics?></textarea>
        <br/><br/>
        <table>
        	<tr>
        		<td><label>Google User:</label></td>
        		<td><input  value="<?php echo $analyticsUser?>"> </input></td>
        	</tr>
        	<tr>
        		<td><label>Google Pass:</label></td>
        		<td><input type="password"   value="<?php echo $analyticsPass?>"></input></td>
        	</tr>
        	<tr>
        		<td><label>Google Id:</label></td>
        		<td><input value="<?php echo $analyticsTableid?>"></input></td>
        	</tr>
        </table>
       	
        <?php echo CHtml::endForm();?>
    </div>
</div>



</div>

<script>
    $(document).ready(function() {
        $("#showLang").click(function(event){
                $("#ListLang").slideDown();
                $("#optionLang").hide();
                $("#LangActions").hide();
        });
        $("#showDefault").click(function(event){
                $("#defaultLanguageSettings").slideDown();
                $("#LangActions").hide();
        });
    });
</script>
