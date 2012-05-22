<?php

/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/

$this->layout='webroot.themes.'.Yii::app()->theme->name.'.views.layouts.column2';
$this->portlets[]=array('BannerViewer',array('section'=>2,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('BannerViewer',array('section'=>3,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('SportEventsWidget', array());
$this->portlets[]=array('SportEventsSearchWidget', array());
$this->portlets[]=array('MailChimp', array());
$this->portlets[]=array('Siguenos',array('urlTwitter'=>'@eurotri','urlFacebook'=>'http://www.facebook.com/pages/Eurotri/168637049863680'));
$this->portlets[]=array('FacebookBox',array());

$this->pageTitle=Yii::app()->name." - Entrenamiento";


$cs=Yii::app()->clientScript;

$cs->registerScript('entrenamientoScript',
   '
       $(function() {
            $("div.transformEntre").jqTransform();
            
            $( "#calendarioEntrenamiento" ).datepicker({
                 monthNames: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                firstDay: 1,
                dateFormat:"dd-mm-yy"
            });
            
            $("#calcular").click(function(){

                    var fmax=0;

                    if ($("#edad").val()!="00" && $("#edad").val() !="" && $("#edad").val() !="0"  ){
                            fmax=208-0.7*$("#edad").val();
                            $("#max").val(fmax);
                    }else
                            fmax=$("#max").val();

                    var texto=" <span>Pulsaciones</span>";

                    $("#z1").html(Math.round(0.45*fmax)+ "-"+Math.round(0.6*fmax)+texto);
                    $("#z2").html(Math.round(0.6*fmax)+ "-" + Math.round(0.7*fmax)+texto);
                    $("#z3").html(Math.round(0.7*fmax)+ "-" + Math.round(0.8*fmax)+texto);
                    $("#z4").html(Math.round(0.8*fmax)+ "-" + Math.round(0.9*fmax)+texto);
                    $("#z5").html(Math.round(0.9*fmax)+ "-" + Math.round(1*fmax)+texto);

            });

       });
       ',
   CClientScript::POS_HEAD);

?>


<div class="banner" style="margin-bottom:32px;">
                                                               <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/banner_planes.png">
                                               
                                               
                               <div class="planescombo clearfix">
                                               <form action="index.php" method="GET" class="form">
                            <input type="hidden" value="entrenamientos/default/index" name="r"></input>
                                                               <div class="clearfix ">
                                                               <!--combo pais-->
                                                               <div class="plan_entrene transformEntre" style="z-index:12">
                                <?php
                                $crit=new CDbCriteria;                                
                                $crit->order="modalidad";
                                $datos_modalidad=EntrenamientoModalidad::model()->findAll($crit);
                                echo CHtml::dropDownList(
                                        "modalidad",
                                        null,
                                        CHtml::listData($datos_modalidad, "idmodalidad", "modalidad"),
                                        array(
                                            "empty"=>"Selecciona modalidad",
                                            "style"=>"width:153px;",
                                            "onchange"=>"jQuery('#Entrenamientos_plan_box span').html('Cargando Planes de Entrenamiento');jQuery('#Entrenamientos_plan_box .jqTransformSelectOpen').addClass('select_ajax_loader');jQuery.ajax({'type':'POST','url':'".CHtml::normalizeUrl('index.php?r=/entrenamientos/EntrenamientoEntrenamiento/dynamicEntrenesWithModalidad')."','cache':false,'data':jQuery(this).parents('form').serialize(),'success':function(html){jQuery('#Entrenamientos_plan_box').html(html); jQuery('#Entrenamientos_plan_box').removeClass('jqtransformdone'); jQuery('#Entrenamientos_plan_box').jqTransform();}});",
                                            ));

                                ?>
                                                               </div>
                                                               <!--fin_row-->
                                                               
                                                               <!--combo pais-->
                                                               <div class="plan_entrene transformEntre" style="z-index:12" id="Entrenamientos_plan_box">
                                <?php
                                   echo CHtml::dropDownList("planEntrenamiento",'',array(), array('id'=>'Entrenamiento_planes','style'=>'width:167px',"empty"=>"Selecciona Plan de Entrenamiento",));
                                ?>
                                                               
                                                               </div>
                                                               <!--fin_row-->
                                                               
                                                               <div class="select_date clearfix">
                                                                              <label for="calendarioEntrenamiento" style="margin-right:5px;">Fecha de competición</label>
                                                                              <div class="input_big" style="margin-top:4px;">
                                                                                              <input class="date_box" id="calendarioEntrenamiento" name="date"/>
                                                                              </div>
                                                                              <div class="submit">
                                                                                              <input type="submit" value="" name="yt1">
                                                                              </div>
                                                               </div>
                                                               <div style="float: left; width:200px;"><?php echo $error ?></div>
                                                               </div>        
                                                               
                                               </form>
                               </div>
                               </div>
							  
                               <!--NUEVO-NUEVO-NUEVO-NUEVO-NUEVO-->
                               <div class="clearfix" style="margin-bottom:20px;">
                                               <div class="entre_iz">
                                                               <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/title1.png">
                                                               <p>El objetivo de este plan de entrenamiento es que te sirva como guía, para que a partir de él, lo adaptes a tus necesidades y/o posibilidades. Si buscas algo más individualizado, no hay duda de que lo mejor es tener tu propio plan de entrenamiento personalizado.

Las intensidades calculadas son teóricas pero serán una buena referencia para empezar. Para calcularlas de forma exacta deberás realizar un test de campo específico.

Es importante que tengas en cuenta que las zonas 6 y 7 son anaeróbicas, y por lo tanto la FC no se aplica en ellas para medir la intensidad.</p>
                                               </div>
                                               <div class="entre_de">
                                                               <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/title2.png">
                                                               <div class="clearfix">
                                                                   <div class="sub_iz">
                                                                            <p>Escribe tu edad, o tu frecuencia cardiaca máxima si la sabes para cacular tus zonas</p>
                                                                            <div class="boxi clearfix">
                                                                                    <label for="edad" style="margin-right:28px;">Edad</label>
                                                                                    <div class="input_small" style="margin-left:4px;">
                                                                    <input type="text" value="00" size="3" name="edad" id="edad" >
                                                                    </div>
                                                                            </div>
                                                                            <div class="boxi clearfix">
                                                                                    <label for="max" style="margin-right:14px;">F. Máx.</label>
                                                                                    <div class="input_small">
                                                                    <input type="text" value="00" size="3" name="max" id="max" >
                                                                    </div>
                                                                            </div>
                                                                            <div class="entrene">
                                                                            <div class="submit">
                                                                                    <input type="submit" name="yt1" value="" id="calcular">
                                                                            </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="sub_de">
                                                                            <ol class="zs">
                                                                                    <li class="z1" id="z1">90-120 <span>Pulsaciones</span></li>
                                                                                    <li class="z2" id="z2">120-160 <span>Pulsaciones</span></li>
                                                                                    <li class="z3" id="z3">140-160 <span>Pulsaciones</span></li>
                                                                                    <li class="z4" id="z4">160-180 <span>Pulsaciones</span></li>
                                                                                    <li class="z5" id="z5">180-200 <span>Pulsaciones</span></li>
                                                                            </ol>
                                                                    </div>           
                                                                   
                                                               </div>
                                               </div>
                               
                                               <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/zona_entrenamiento_eqm.png">
                               </div>
                               <!--NUEVO-NUEVO-NUEVO-NUEVO-NUEVO-->
<?php 
    if($modalidad){
?>
                               <!--BANNER NEGRO-->
                               <div class="banner_negro">
                                               <div class="distancia2">distancia<br><span><?php echo $modalidad->modalidad ?></span></div>
                                               <div class="plan">Plan <span><?php echo $entrenamiento->nsemanas ?> semanas</span><br><?php echo $entrenamiento->nhorassemana ?> Horas semanales</div>
                                               <a href="<?php echo Yii::app()->request->getUrl().'&print'?>" class="printplan" target="_blank">Imprimir Plan</a>
                               </div>
                               <!--FIN BANNER NEGRO-->
                               
                               
                               
                                
				
                 <?php
				
				 $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$dataProvider,
                            'itemView'=>'_view',
                            'summaryText'=>'Semana<span>{page}</span>',
                            'pager'=>array(
                                'header'=>'',
                                'prevPageLabel'=>'ver semana anterior',
                                'nextPageLabel'=>'ver siguiente semana',
                                ),
                            'template'=>'
                                <div class="titular2 titularEntrenamiento">
                                    {summary}
                                </div>
								<div class="tabla_content">     
                                <table class="plan_entrenamiento">
                                                               <thead>
                                                                              <tr>
                                                                                              <th width="120">Día</th>
                                                                                              <th width="72">Tipo</th>
                                                                                              <th width="438">Entrenamiento</th>
                                                                              </tr>
                                                               </thead>

                                                               <tbody>
                                            {items}                                            
                                        </tbody>
                                    </table>
                                    </div>
                                    <div class="clearfix entrenamientoPager">{pager} </div> ',
                    ));
					

					?>                   
                               <!--FIN TABLA-->
       <div class="abreviaturas clearfix">
       	<ul>
       		<li><span>N:</span> nado normal, crol</li>
       		<li><span>r/3:</span> respirando cada 3 brazadas</li>
       		<li><span>est:</span> estilos</li>
       		<li><span>MnDAxN:</span> manos-dedos-axilas-nado</li>
       		<li><span>pto.mto:</span> punto muerto crol alternando brazos</li>
       		<li><span>d+i 1:</span> punto muerto variante 1</li>
       		<li><span>d+i 2:</span> punto muerto variante 2</li>
       		<li><span>d+i 3:</span> punto muerto variante 3</li>
       		<li><span>12p3br:</span> 12 patadas, 3 brazadas</li>
       		<li><span>3/4 pto. mto</span> tres cuartos de punto muerto</li>
       		<li><span>rem. 1:</span> remadas parabrisa</li>
       		<li><span>rem. 2:</span> remadas "pala humana"</li>
       		<li><span>rem. 3:</span> remadas delante-atrás</li>
       		<li><span>puños:</span> nado puño cerrado</li>
       		<li><span>sub:</span> recobro subacuático</li>
       		<li><span>br.p.cr:</span> braza con pies de crol</li>
       		<li><span>palas:</span> nado con palas</li>
       		<li><span>pull:</span> nado con pull</li>
       		<li><span>pies cruz:</span> nado con pies cruzados</li>
       		<li><span>Nw:</span> nado waterpolo, cabeza fuera</li>
       		<li><span>/10":</span> recuperación 10"</li>
       		<li><span>otro:</span> otro estilo que no sea crol</li>
       		<li><span>prog:</span> progresivo</li>
       	</ul>
       </div>
<?php }?>
