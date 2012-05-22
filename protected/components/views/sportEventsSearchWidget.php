<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui-1.8.6.custom.min.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jqtransform/jquery.jqtransform.js', CClientScript::POS_HEAD);

$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/calendar.css',  'screen, projection');
$cs->registerCssFile(Yii::app()->theme->baseUrl.'/js/jqtransform/jqtransform.css',  'screen, projection');


$cs->registerScript('CalendarWidget',
                '
                    $(function() {
                        var dates_lateral = $( "#from_lateral, #to_lateral" ).datepicker({
                                defaultDate: "+1w",
                                changeMonth: true,
                                numberOfMonths: 1,
                                dateFormat:"dd-mm-yy",
                                onSelect: function( selectedDate ) {
                                        var option = this.id == "from_lateral" ? "minDate" : "maxDate",
                                                instance = $( this ).data( "datepicker" ),
                                                date = $.datepicker.parseDate(
                                                        instance.settings.dateFormat ||
                                                        $.datepicker._defaults.dateFormat,
                                                        selectedDate, instance.settings );
                                        dates_lateral.not( this ).datepicker( "option", option, date );
                                }
                        });
                    });
                    ',
                CClientScript::POS_HEAD);


$cs->registerScript('SelectTransformsWidget',
                '
                    $(function() {
                       $("span.transform_widget_sc").jqTransform();
                    });
                    ',
                CClientScript::POS_HEAD);
?>
<div class="zona_buscador">
    <div class="titular2" style="margin-bottom:10px;">
            <span>Buscador</span>Pruebas
    </div>
    
<?php
    echo CHtml::beginForm("index.php", 'get', array('class'=>'form sadow clearfix'));
    echo CHtml::hiddenField("r","SportsEvents/default/index");
    echo CHtml::hiddenField("idm", '29');
    echo CHtml::hiddenField("q",'s');
?>
            <div class="clearfix">		
                    <div class="busca_pruebas clearfix">

                    <label for="from_lateral">Desde</label>
                    <div class="select_date clearfix">
                        <div class="input_big" style="margin-top:4px;">
                            <input class="date_box" id="from_lateral" name="from"/>
                        </div>
                    </div>
                    <span class="transform_widget_sc">
                    <!--combo pais-->
                    <div class="pais "  style=""> 
                        <?php
                            $crit=new CDbCriteria;
                            $crit->order="PAI_NOMBRE";
                            /*$datos_paises=Pais::model()->with(array('eventos'=>array(
                                'joinType'=>'INNER JOIN',
                            )))->findAll($crit);*/
                            $datos_paises=Pais::model()->findAll($crit);
                            echo CHtml::dropDownList(
                                    "country", 
                                    null, 
                                    CHtml::listData($datos_paises, "PAI_ISO2", "PAI_NOMBRE"),
                                    array(
                                        "id"=>"ws_country",
                                        "empty"=>"País",
                                        "style"=>"width:102px;",
                                        "onchange"=>"jQuery('#WidgetSportEvent_province_box span').html('Cargando');jQuery('#WidgetSportEvent_province_box .jqTransformSelectOpen').addClass('select_ajax_loader');jQuery.ajax({'type':'POST','url':'".CHtml::normalizeUrl('index.php?r=SportsEvents/SportEvent/dynamicProvincesWithEventsWidget')."','cache':false,'data':'country='+$('#ws_country').val(),'success':function(html){jQuery('#WidgetSportEvent_province_box').html(html); jQuery('#WidgetSportEvent_province_box').removeClass('jqtransformdone'); jQuery('#WidgetSportEvent_province_box').jqTransform();}});",
                                        ));

                            ?>
                        
                    </div>
                    <!--fin_row-->

                    <!--combo pais-->
                    
                    <div class="pais " style=""> 
                     <?php
                        $distancias=Distance::model()->findAll();
                        echo CHtml::dropDownList("distance", null, CHtml::listData($distancias, "idDistance", "title"),array("empty"=>"Distancia","style"=>"width:102px;"));
                       ?>
                    </div>
                    </span>
                    <!--fin_row-->
                    </div>

                    <div class="busca_pruebas clearfix ">

                    <label for="to_lateral">Hasta</label>
                    <div class="select_date clearfix">
                        <div class="input_big" style="margin-top:4px;">
                            <input class="date_box" id="to_lateral" name="to" />
                        </div>
                    </div>
                    <span class="transform_widget_sc">
                    <!--combo pais-->
                    <div class="pais " id="WidgetSportEvent_province_box"  style=""> 
                        <?php
                        echo CHtml::dropDownList("province",'',array(), array('id'=>'SportEvent_province','style'=>'width:102px',"empty"=>"Provincia",));
                        ?>
                    </div>
                    <!--fin_row-->

                    <!--combo pais-->
                    <div class="provincia "   style=""> 
                     <?php
                        $organizador=SportBrand::model()->findAll();
                        echo CHtml::dropDownList("brand", null, CHtml::listData($organizador, "idSportBrand", "title"),array("empty"=>"Organizador","style"=>"width:102px;"));
                       ?>
                    </div>
                    </span>
                    <!--fin_row-->
                            <div class="submit">
                                    <input type="submit" value="Submit" name="yt1">
                            </div>
                </div>
            </div>
            <?php 
            echo CHtml::endForm();
            ?>

</div>
