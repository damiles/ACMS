<?php
$this->pageTitle=Yii::app()->name . ' - Buscador de pruebas';
$this->layout='webroot.themes.'.Yii::app()->theme->name.'.views.layouts.column2';
$this->portlets[]=array('BannerViewer',array('section'=>2,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('BannerViewer',array('section'=>3,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('SportEventsWidget', array());
$this->portlets[]=array('SportEventsSearchWidget', array());
$this->portlets[]=array('MailChimp', array());
$this->portlets[]=array('Siguenos',array('urlTwitter'=>'@eurotri','urlFacebook'=>'http://www.facebook.com/pages/Eurotri/168637049863680'));
$this->portlets[]=array('FacebookBox',array());

$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui-1.8.6.custom.min.js', CClientScript::POS_HEAD);

$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jqtransform/jquery.jqtransform.js', CClientScript::POS_HEAD);

$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/calendar.css',  'screen, projection');
$cs->registerCssFile(Yii::app()->theme->baseUrl.'/js/jqtransform/jqtransform.css',  'screen, projection');

$cs->registerScript('Calendar',
                '
                    $(function() {
                        /*$(".calendario").datepicker(
                        { 
                            monthNames: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                            firstDay: 1,
                            showOtherMonths: true,
                            dateFormat:"dd-mm-yy",
                            selectOtherMonths: true
                        }
                        );*/
                        

                        var dates = $( "#from, #to" ).datepicker({
                                defaultDate: "+1w",
                                changeMonth: true,
                                numberOfMonths: 1,
                                dateFormat:"dd-mm-yy",
                                onSelect: function( selectedDate ) {
                                        var option = this.id == "from" ? "minDate" : "maxDate",
                                                instance = $( this ).data( "datepicker" ),
                                                date = $.datepicker.parseDate(
                                                        instance.settings.dateFormat ||
                                                        $.datepicker._defaults.dateFormat,
                                                        selectedDate, instance.settings );
                                        dates.not( this ).datepicker( "option", option, date );
                                }
                        });
                    });
                    ',
                CClientScript::POS_HEAD);

$selectedDate="";
if(isset($_GET['date'])){
    $selectedDate=$_GET['date'];    
}

$cs->registerScript('CalendarioAjax','

var selectedDate="'.$selectedDate.'";
 
$.ajax({
  url: "index.php",
  data: "r=SportsEvents/default/ajaxEvents",
  dataType: "json",
  success: function(calendarEvents){
           $(".calendario").datepicker({
           numberOfMonths: [1, 1],
           showCurrentAtPos: 0,
           firstDay:1,
           dateFormat:"yy-mm-dd",
           monthNames: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
           showOtherMonths: true,
           onSelect:function(dateText, inst){
               dateText=dateText.split("/").join("_")
               window.location.href = "'.CHtml::normalizeUrl(array("", 'idm'=>29)).'&q=d&date=" + dateText;

           },
           beforeShowDay: function (date){
                          for (i = 0; i < calendarEvents.length; i++) {
                              if (date.getMonth() == calendarEvents[i][0] - 1
                              && date.getDate() == calendarEvents[i][1]
                              && date.getFullYear() == calendarEvents[i][2]) {
                              //[disable/enable, class for styling appearance, tool tip]
                                  if(selectedDate!=""){
                                    dateArr=selectedDate.split("_");
                                    if (date.getMonth() == dateArr[0] - 1
                                          && date.getDate() == dateArr[1]
                                          && date.getFullYear() == dateArr[2]){
                                            return [true,"ui-state-selected event","Existen pruebas en este día"];
                                          }
                                  }
                                  return [true,"event","Event Name"];
                              }
                           }
                           return [false, ""];//enable all other days
                        }
           });
           $(".calendario table.ui-datepicker-calendar").append("<caption>Selecciona un día para ver las competiciones.</caption>");
           }
         });

',  CClientScript::POS_HEAD);

$cs->registerScript('SelectTransforms',
                '
                    $(function() {
                       $("span.transform").jqTransform();
                    });
                    ',
                CClientScript::POS_HEAD);

?>


<script>
    
</script>



<div class="calen_bloq">
        <!-- Buscador -->
        <form action="index.php" method="GET" class="form">			
            <input type="hidden" value="SportsEvents/default/index" name="r"></input>
            <input type="hidden" value="29" name="idm"></input>
            <input type="hidden" value="s" name="q"></input>
        <div class="combos clearfix ">
        <!--combo pais-->
        <span class="transform">
        <div class="pais " > 
            <?php
            
            
            
            $crit=new CDbCriteria;
            //$crit->with="eventos";
            //$crit->join="INNER JOIN";
            $crit->order="PAI_NOMBRE";
            $datos_paises=Pais::model()->with(array('eventos'=>array(
                'joinType'=>'INNER JOIN',
            )))->findAll($crit);
            echo CHtml::dropDownList(
                    "country", 
                    null, 
                    CHtml::listData($datos_paises, "PAI_ISO2", "PAI_NOMBRE"),
                    array(
                        "empty"=>"Todos los Países",
                        "style"=>"width:114px;",
                        "onchange"=>"jQuery('#SportEvent_province_box span').html('Cargando provincias');jQuery('#SportEvent_province_box .jqTransformSelectOpen').addClass('select_ajax_loader');jQuery.ajax({'type':'POST','url':'".CHtml::normalizeUrl('index.php?r=SportsEvents/SportEvent/dynamicProvincesWithEvents')."','cache':false,'data':jQuery(this).parents('form').serialize(),'success':function(html){jQuery('#SportEvent_province_box').html(html); jQuery('#SportEvent_province_box').removeClass('jqtransformdone'); jQuery('#SportEvent_province_box').jqTransform();}});",
                        ));
          
            ?>
        
        </div>
        <!--fin_row-->

        <!--combo pais-->
        <div class="provincia " id="SportEvent_province_box" > 
            <?php
            echo CHtml::dropDownList("province",'',array(), array('id'=>'SportEvent_province','style'=>'width:167px',"empty"=>"Selecciona Provincia",));
            ?>
        </div>
        <!--fin_row-->

        <!--combo pais-->
        <div class="pais " > 
        <?php
            $distancias=Distance::model()->findAll();
            echo CHtml::dropDownList("distance", null, CHtml::listData($distancias, "idDistance", "title"),array("empty"=>"Distancia","style"=>"width:114px;"));
           ?>
        </div>
        <!--fin_row-->

        <!--combo pais-->
        <div class="provincia " > 
        <?php
            $organizador=SportBrand::model()->findAll();
            echo CHtml::dropDownList("brand", null, CHtml::listData($organizador, "idSportBrand", "title"),array("empty"=>"Organizador","style"=>"width:167px;"));
           ?>
        </div>
        </span>
        <!--fin_row-->
        <div class="select_date clearfix">
                <label for="from">Desde</label>
                <div class="input_big" style="margin-top:4px">
                <input class="date_box" id="from" name="from"/>
                </div>
                <label for="to">Hasta</label>
                <div class="input_big" style="margin-top:4px">
                <input class="date_box" id="to" name="to" />
                </div>
                <div class="submit">
                        <input type="submit" value="Submit">
                </div>
        </div>
</div>
</form>
    
    
    
        <!--Calendario-->
        <div class="calendario">

        </div>
</div>   
        
<div class="titular2">
        <span>Resultado</span>Obtenido
</div>

<div class="resultados">

        
                    <?php $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$dataProvider,
                            'itemView'=>'_view',
                            'summaryText'=>'Mostrando {start}-{end} de {count} evento(s)',
                            'pager'=>array(
                                'header'=>'',
                                'prevPageLabel'=>'<',
                                'nextPageLabel'=>'>',
                                ),
                            'template'=>'<table class="tabla">
                                        <thead>
                                                <tr>
                                                        <th width="57" style="text-align:center;">Fecha</th>
                                                        <th width="301">Prueba | Ubicación</th>
                                                        <th >Distancia</th>
                                                        <th>Web</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            {items}
                                        </tbody>
                                    </table>
                                    
                                    <div class="clearfix">{pager} {summary}</div>',
                    )); ?>
                

</div>
<br/><br/>
<!-- Social -->
<div class="social_buttons clearfix">
        <div class="tweeter_like">
              <!-- Tweeter http://twitter.com/about/resources/tweetbutton-->
              <?php $this->widget('TwitterButton');?>
        </div>
        <div class="facebook_like">
            <!-- facebook http://developers.facebook.com/docs/reference/plugins/like/-->
            <?php $this->widget('FacebookButton');?>
        </div>
</div>



<?php
$this->widget("ArticulosEnPortada"); 
?>
