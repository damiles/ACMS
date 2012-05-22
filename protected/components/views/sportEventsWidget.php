


<?php
$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui-1.8.6.custom.min.js', CClientScript::POS_HEAD);
$cs->registerCssFile(Yii::app()->theme->baseUrl.'/css/calendar.css',  'screen, projection');
$cs->registerScript('CalendarioAjaxWidget','

var selectedDateWidget="";
 
$.ajax({
  url: "index.php",
  data: "r=SportsEvents/default/ajaxEvents",
  dataType: "json",
  success: function(calendarEvents){
           $("#calendarioWidget").datepicker({
           numberOfMonths: [1, 1],
           showCurrentAtPos: 0,
           firstDay:1,
           dateFormat:"yy-mm-dd",
           monthNames: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
           showOtherMonths: true,
           onSelect:function(dateText, inst){
               dateText=dateText.split("/").join("_")
               //window.location.href = "'.CHtml::normalizeUrl(array("", 'idm'=>29)).'&q=d&date=" + dateText;
               $("#lista_eventos").html("Cargando prubas");
               $("#lista_eventos").addClass("calendar_ajax_loader");
               jQuery.ajax({
                "type":"POST",
                "url":"'.CHtml::normalizeUrl('index.php?r=SportsEvents/default/ajaxDayEvents').'",
                "cache":false,
                "data":"date="+dateText,
                "success":function(html){
                    $("#lista_eventos").html(html); 
                    $("#lista_eventos").removeClass("calendar_ajax_loader");
                    }
               });
           },
           beforeShowDay: function (date){
                          for (i = 0; i < calendarEvents.length; i++) {
                              if (date.getMonth() == calendarEvents[i][0] - 1
                              && date.getDate() == calendarEvents[i][1]
                              && date.getFullYear() == calendarEvents[i][2]) {
                              //[disable/enable, class for styling appearance, tool tip]
                                  if(selectedDateWidget!=""){
                                    dateArr=selectedDateWidget.split("_");
                                    if (date.getMonth() == dateArr[0] - 1
                                          && date.getDate() == dateArr[1]
                                          && date.getFullYear() == dateArr[2]){
                                            return [true,"ui-state-selected event","Ver pruebas"];
                                          }
                                  }
                                  return [true,"event","Ver pruebas"];
                              }
                           }
                           return [false, ""];//enable all other days
                        }
           });
           $("#calendarioWidget table.ui-datepicker-calendar").append("<caption>Selecciona un día para ver las competiciones.</caption>");
           }
         });

',  CClientScript::POS_HEAD);

?>

 <div class="zona_calen">
    <div class="titular2">
            <span>Calendario</span>Pruebas
            </div><br>
            <div id="calendarioWidget"	></div> 
</div>



<div id="lista_eventos" class="lista_eventos clearfix">
    <ul >
        

<?php 
$meses=ACMS::getMonthsLabel();

$actual_date=null;
$add_fecha_box=false;
foreach($eventos as $item):
    if($actual_date==null){
        $actual_date=$item->date;
        $add_fecha_box=true;
    }
    if($actual_date!=$item->date){
        $actual_date=$item->date;
        $add_fecha_box=true;
    }
?>


    
    
    
<?php if($add_fecha_box):
  $add_fecha_box=false;
    $fecha=getDate(strtotime($actual_date));
?>
    </ul>
<div class="eventos clearfix">
    	<div class="fecha_evento">
    		<span><?php echo $fecha['mday'];?> de <?php echo $meses[$fecha['mon']];?></span>
    	</div>
</div>
    <ul>
<?php
endif;
?>


            <li>
                <?php
                $ico="";
                if(isset($item->brand)){
                    $ico=CHtml::image("upload/organizadores/".$item->brand->ico_file, $item->brand->title, array('class'=>'ico_brand'));
                }
                ?>
                <span class="titulo_evento"><?php echo ACMS::getTitle($item).$ico;?></span>
                
                <?php 
                if(count($item->distances)>0){
                    foreach($item->distances as $distancia){
                    ?>
                        <div class="distancias">
                        <span><?php echo ACMS::getTitle($distancia); ?> :</span><span class="<?php if($distancia->duatlon) echo "run"; else echo "swim";?>"><?php echo round($distancia->swimming); if($distancia->duatlon) echo "km"; else echo "m";?></span>
                        <span class="cicle"><?php echo round($distancia->cycling);?>km</span>
                        <span class="run"><?php echo round($distancia->running);?>km</span>
                        </div>
                    <?php 
                    }
                }else{
                    echo "<span>Distancias a determinar</span>";
                }
                ?>
                

                <?php if(isset($item->web) && $item->web !=null && $item->web!=''):?>
                    <a class="web" href="<?php echo $item->web;?>" target="_blank">Web</a>
                <?php endif;?>
            </li>




<?php

endforeach;
?>

    </ul>
    <a href="index.php?r=SportsEvents/default/index&idm=29" class="arrow">MÁS RESULTADOS</a>
</div>