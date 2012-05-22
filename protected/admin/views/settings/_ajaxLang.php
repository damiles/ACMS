Se han habilitado los siguientes idiomas para este sitio:<br/><br/>
<div id="defaultLangs">
 <?php $this->renderPartial('_ajaxLangList', array('lang'=>$lang)); ?>
</div>
<div id="defaultLanguageSettings" style="display:none;">
    <br/><br/>
    Selecciona el idioma predeterminado:<br/>
    <?php
     echo CHtml::beginform();

     echo "<div class='row'>";
     foreach($lang as $item){
        if($item->selected)
            if($item->default)
                echo " <input type='radio' name='default' id='def_$item->idLang' value='$item->idLang' checked /><label for='def_$item->idLang'>$item->title</label> ";
            else
                echo " <input type='radio' name='default' id='def_$item->idLang' value='$item->idLang' /><label for='def_$item->idLang'>$item->title</label> ";
     }
     echo "</div><br/>";
     echo "<div class='row'>";
     echo CHtml::ajaxSubmitButton (
        'Guardar', //label
        CController::createUrl('settings/updateDefaultLang'), // url for request
        array (
        'update'=>"#defaultLangs",
        'beforeSend' => 'function(){

          }',
        'complete' => 'function(){
            $("#defaultLanguageSettings").hide();
            $("#LangActions").show();
          }',
        ),
        array(
            'class'=>'button'
        )
     );
     echo "</div>";
    echo CHtml::endForm();
    ?>
</div>
