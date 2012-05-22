<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$this->layout='column2';
$this->portlets[]=array('BannerViewer',array('section'=>2,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('BannerViewer',array('section'=>3,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('SportEventsWidget', array());
$this->portlets[]=array('SportEventsSearchWidget', array());
$this->portlets[]=array('MailChimp', array());
$this->portlets[]=array('Siguenos',array('urlTwitter'=>'@eurotri','urlFacebook'=>'http://www.facebook.com/pages/Eurotri/168637049863680'));
$this->portlets[]=array('FacebookBox',array());

$this->pageTitle=Yii::app()->name." - Calculadora";


$cs=Yii::app()->clientScript;
$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jqtransform/jquery.jqtransform.js', CClientScript::POS_HEAD);
$cs->registerCssFile(Yii::app()->theme->baseUrl.'/js/jqtransform/jqtransform.css',  'screen');


$cs->registerScript('formTransform',
        '
        $(function(){
                $(".form").jqTransform({imgPath:"'.Yii::app()->theme->baseUrl.'/js/jqtransform/img/"});
        });
	
            ',
        CClientScript::POS_HEAD);


?>



<div class="banner2">
			<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/banner_calc.png">
</div>


<div class="">
    <form action="#" id="natacion">
        <table class="tabla_calc">
                <caption>
                        <div class="titular2">
                                <span>Natación</span> Ritmos
                        </div>
                </caption>
                <tr>
                <th cellpadding="0 0 0 20" width="225"><label for="distancia_natacion" id="label_distancia_natacion">Distancia a nadar</label></th>
                <td>
                	<div class="input_big">
    	            	<input type="text" id="distancia_natacion" name="distancia"  size="10">
	                </div>
	                <span class="form">
		                <input type="radio" name="unidades"   id="unidad_natacion_1" value="m" checked>
		                <label for="unidad_n_1">Metros</label>
		                <input type="radio" name="unidades"   id="unidad_natacion_2" value="km">
		                <label for="unidad_n_2">Kilometros</label>
                	</span>
                </td>
                
                </tr>
                  <tr>
                    <th><label id="label_tiempo_natacion">Tiempo nadando</label></th>
                    <td>
                    <div class="input_small">
                    	<input type="text" id="natacion_horas" name="horas"  size="3" value="00">
               		</div> 
                <label for="natacion_horas">Horas</label>
                	<div class="input_small">
                		<input type="text" id="natacion_minutos" name="minutos"  size="3" value="00">
                	</div>
                <label for="natacion_minutos">Minutos</label>
                	<div class="input_small">
                		<input type="text" id="natacion_segundos" name="segundos"  size="3" value="00">
                	</div>
                <label for="natacion_segundos">Segundos</label></td>
                  </tr>
        </table>
    </form>
<a href="#" id="calcular_natacion" class="calc">Calcular</a>

<table class="result" id="natacion_resultados" style="display:none">
            <tr>
            <th cellpadding="0 0 0 20" width="225">
                <label for="natacion_ritmo">Ritmo medio</label>
            </th>
            <td>
            		<div class="input_big" style="margin-top:4px;">
		                <input type="text" id="natacion_ritmo" name="natacion_ritmo"  size="10">
		            </div>
                <span class="form">
	                <input type="radio" name="unidades_n_2" id="result_n_1" value="m" checked>
	                <label for="result_n_1">100 Metros</label></td>
            	</span>
            </tr>
          <tr>
            <th>Velocidad media</th>
            <td>
                	<div class="input_big" style="margin-top:4px;">
                		<input type="text" id="natacion_vel_media" name="natacion_vel_media"  size="10">
                	</div>
                <span class="form">
	                <input type="radio" name="unidades_n_3" id="result_n_2" value="km" checked>
	                <label for="result_n_2">Kilómetros hora</label>
                </span>
            </td>
          </tr>
</table>
</div>












<div class="" style="margin-top:30px;">
    <form action="#" id="ciclismo">
        <table class="tabla_calc">
                <caption>
                        <div class="titular2">
                                <span>Ciclismo</span> Velocidad
                        </div>
                </caption>
                <tr>
                <th cellpadding="0 0 0 20" width="225"><label for="distancia_bici" id="label_distancia_bici">Distancia en bici</label></th>
                <td>
                	<div class="input_big">
                		<input type="text" id="distancia_bici" name="distancia"  size="10"  style="width:108px;"/>
	                </div>
	                <span class="form">
		                <input type="radio" name="unidades" id="unidad_b_1" value="km" checked />
		                <label for="unidad_b_1">Kilometros</label>
		                <input type="radio" name="unidades" id="unidad_b_2" value="m" />
		                <label for="unidad_b_2">Metros</label>
	                </span>
                </td>
                </tr>
                  <tr>
                    <th><label id="label_tiempo_bici">Tiempo en bici</label></th>
                    <td>
                    <div class="input_small">
                    	<input type="text" id="horas_bici" name="horas"  size="3"  value="00"  style="width:48px;"/>
                	</div>
                <label for="horas_bici">Horas</label>
                	<div class="input_small">
                		<input type="text" id="minutos_bici" name="minutos"  size="3"  value="00"  style="width:48px;"/>
                	</div>
                <label for="minutos_bici">Minutos</label>
                	<div class="input_small">
                		<input type="text" id="segundos_bici" name="segundos"  size="3"  value="00"  style="width:48px;"/>
                	</div>
                <label for="segundos_bici">Segundos</label></td>
                  </tr>
        </table>
    </form>
    
<a href="#" id="calcular_ciclismo" class="calc">Calcular</a>

<table class="result"  id="ciclismo_resultados"  style="display:none">
          <tr>
            <th width="225">Velocidad media</th>
            <td>
            	<div class="input_big" style="margin-top:4px;">
            		<input type="text" id="ciclismo_vel_media" name="ciclismo_vel_media"  size="10" style="width:108px">
            	</div>
                <span class="form">
	                <input type="radio" name="unidades_b_1" id="result_b_2" value="km" checked>
	                <label for="result_b_2">Kilómetros hora</label>
            	</span>	
            </td>
          </tr>
</table>
</div>













<div class="" style="margin-top:30px; padding-bottom:80px;border-bottom: 1px solid #D6E0E5; margin-bottom: 10px;">
     <form action="#" id="carrera">
        <table class="tabla_calc">
                <caption>
                        <div class="titular2">
                                <span>Carrera</span> Ritmos
                        </div>
                </caption>
                <tr>
                <th cellpadding="0 0 0 20" width="225"><label for="distancia_carrera" id="label_distancia_carrera">Distancia recorrida</label></th>
                <td>
                	<div class="input_big" style="margin-top:4px;">
                		<input type="text" id="distancia_carrera" name="distancia"  size="10"  style="width:108px;"/>
                	</div>
	                <span class="form checmeters">
		                <input  style="margin-top:7px !important;" type="radio" name="unidades" id="unidad_c_2" value="m" checked />
		                <label for="unidad_c_2">Metros</label>
	                </span>
                
		             <span class="form">   
		                <!--combo pais-->
						<div class="distancia transform" style="z-index:12"> 
						<select name="distancias" id="selectDistancias" style="width:167px;" style="border-left:2px solid #fff;" onchange="$('#distancia_carrera').val($('#selectDistancias').val());">
							<option value="0">Selecciona distancia</option>
							<option value="800">800</option>
							<option value="1000">1000</option>
							<option value="1500">1500</option>
							<option value="1600">1 milla</option>
							<option value="21097">Medio maratón</option>
							<option value="42195">Maratón</option>
						</select>
						</div>
						<!--fin_row-->
					</span>
                </td>
                </tr>
                <tr>
                    <th><label id="label_tiempo_carrera">Tiempo corriendo</label></th>
                    <td>
                        <div class="input_small">
	                        <input type="text" id="horas_carrera" name="horas"  size="3" value="00" style="width:48px">
    					</div>
                        <label for="horas_carrera">Horas</label>
                        <div class="input_small">
                        	<input type="text" id="minutos_carrera" name="minutos"  size="3" value="00" style="width:48px">
                        </div>
                        <label for="minutos_carrera">Minutos</label>
                        <div class="input_small">
	                        <input type="text" id="segundos_carrera" name="segundos"  size="3" value="00" style="width:48px">
    					</div>                    
                        <label for="segundos_carrera">Segundos</label>
                    </td>
                 </tr>
                 <tr>
                    <th><label id="label_minutos_carrera">Minutos por kilómetro</label></th>
                    <td>
                <div class="input_small">
	                <input type="text" id="mkm_carrera" name="mkm_minutos"  size="3"  value="00" style="width:48px">
    			</div>
                <label for="mkm_carrera">Minutos</label>
				<div class="input_small">
	                <input type="text" id="skm_carrera" name="mkm_segundos"  size="3" value="00" style="width:48px">
    			</div>
                <label for="skm_carrera">Segundos</label></td>
                 </tr>
        </table>
     </form>

<a href="#" id="calcular_carrera" class="calc">Calcular</a>

<table class="result"  id="carrera_resultados"   style="display:none">
        <tr>
        <th cellpadding="0 0 0 20" width="225"><label for="distance_ritmo_carrera">Ritmo medio</label></th>
        <td>
        	<div class="input_big" style="margin-top:4px;">
        		<input type="text" id="carrera_ritmo" name="carrera_ritmo"  size="10">
	        </div>
	        <span class="form">
		        <input type="radio" name="unidades_c_1" id="result_c_1" value="m" checked>
		        <label for="result_c_1">min/Km</label>
	        </span>
        </td>
        </tr>
          <tr>
            <th>Velocidad media</th>
            <td>
            	<div class="input_big" style="margin-top:4px;">
            		<input type="text" id="carrera_vel_media" name="carrera_vel_media"  size="10">
		        </div>
		        <span class="form">
			        <input type="radio" name="unidades_carrera_vel_media" id="result_c_2" value="km" checked>
			        <label for="unidades_carrera_vel_media">Kilómetros hora</label>
		        </span>
	        </td>
          </tr>
</table>
</div>

<script>
    function parseInt2char(num){
        return (num<10)?'0'+num:num;
    }
    $(function(){
    	/*
    	$('#selectDistancias').change(function(){
    		$('#distance_c').val($('#selectDistancias').val());
    	});
    	*/
        $('#calcular_natacion').click(function(){
            var error=false;
            if($("#distancia_natacion").val()=='')
            {
                $('#label_distancia_natacion').addClass("error");
                error=true;
            }else
            	$('#label_distancia_natacion').removeClass("error");
            
            if(parseFloat($("#natacion_horas").val())==0 && parseFloat($("#natacion_minutos").val())==0 && parseFloat($("#natacion_segundos").val())==0){
                $('#label_tiempo_natacion').addClass("error");
                error=true;
            }else
            	$('#label_tiempo_natacion').removeClass("error");
   			if(error)
   				return false;
            
            if($("#natacion_horas").val()=='')
	           	$("#natacion_horas").val("00");
            
           	if($("#natacion_minutos").val()=='')
	           	$("#natacion_minutos").val("00");
           
           	if($("#natacion_segundos").val()=='')
	           	$("#natacion_segundos").val("00");
            
            //Calculamos resultado
            var dataArray=$('#natacion').serializeArray();
            var data=[];
            for(var i=0; i< dataArray.length; i++){
                var item=dataArray[i];
                data[item['name']]=item['value'];
            }
            
            var distancia=parseFloat(data['distancia']);
            if(data['unidades']=='km'){
                distancia=parseFloat(distancia)*1000;
            }
            
            var tiempo=parseFloat(data['horas'])*3600+parseFloat(data['minutos'])*60+parseFloat(data['segundos']);
            
            var ritmo=100*(tiempo/distancia);
            var rh=Math.floor(ritmo/3600);
            var aux=ritmo-(rh*3600);
            var rm=Math.floor(aux/60);
            aux=rh*3600+rm*60;
            var rs=Math.round(ritmo-aux);
            
            
            
            var ritmo_txt=parseInt2char(rh)+":"+parseInt2char(rm)+":"+parseInt2char(rs);
            
            var vel_media=3.6*distancia/tiempo;
            
            $('#natacion_ritmo').val(ritmo_txt);
            $('#natacion_vel_media').val(vel_media.toFixed(4));
            
            $('#natacion_resultados').slideDown('slow');  
            
            return false;
        });
        
        
        $('#calcular_ciclismo').click(function(){
        var error=false;    
            if($("#distancia_bici").val()=='')
            {
                $('#label_distancia_bici').addClass("error");
                error=true;
            }else
            	$('#label_distancia_bici').removeClass("error");
            
            if(parseFloat($("#horas_bici").val())==0 && parseFloat($("#minutos_bici").val())==0 && parseFloat($("#segundos_bici").val())==0){
                $('#label_tiempo_bici').addClass("error");
                error=true;
            }else
            	$('#label_tiempo_bici').removeClass("error");
   			if(error)
   				return false;
   				
           
           if($("#horas_bici").val()=='')
	           	$("#horas_bici").val("00");
            
           if($("#minutos_bici").val()=='')
	           	$("#minutos_bici").val("00");
           
           if($("#segundos_bici").val()=='')
	           	$("#segundos_bici").val("00");
            
            
            //
            var dataArray=$('#ciclismo').serializeArray();
            var data=[];
            for(var i=0; i< dataArray.length; i++){
                var item=dataArray[i];
                data[item['name']]=item['value'];
            }
            
            var distancia=parseFloat(data['distancia']);
            if(data['unidades']=='km'){
                distancia=parseFloat(distancia)*1000;
            }
            
            var tiempo=parseFloat(data['horas'])*3600+parseFloat(data['minutos'])*60+parseFloat(data['segundos']);
            
            var vel_media=3.6*distancia/tiempo;
            
            
            $('#ciclismo_vel_media').val(vel_media);
            
            $('#ciclismo_resultados').slideDown('slow');  
            
             return false;
             
        });
        
        
         $('#calcular_carrera').click(function(){
        var error=false;    
            if($("#distancia_carrera").val()=='')
            {
                $('#label_distancia_carrera').addClass("error");
                error=true;
            }else
            	$('#label_distancia_carrera').removeClass("error");
            
            if(parseFloat($("#horas_carrera").val())==0 && parseFloat($("#minutos_carrera").val())==0 && parseFloat($("#segundos_carrera").val())==0 && parseFloat($("#mkm_carrera").val())==0 && parseFloat($("#skm_carrera").val())==0){
                $('#label_tiempo_carrera').addClass("error");
                $('#label_minutos_carrera').addClass("error");
                error=true;
            }else{
            	$('#label_tiempo_carrera').removeClass("error");
                $('#label_minutos_carrera').removeClass("error");
            }
            /*if(parseFloat($("#mkm_carrera").val())==0 && parseFloat($("#skm_carrera").val())==0 ){
                $('#label_minutos_carrera').addClass("error");
                error=true;
            }else
            	$('#label_minutos_carrera').removeClass("error");
            */	
            if(error)
                return false;
            
            if($("#horas_carrera").val()=='')
	           	$("#horas_carrera").val("00");
            
           	if($("#minutos_carrera").val()=='')
	           	$("#minutos_carrera").val("00");
           
           	if($("#segundos_carrera").val()=='')
	           	$("#segundos_carrera").val("00");
            
            
            //
            var dataArray=$('#carrera').serializeArray();
            var data=[];
            for(var i=0; i< dataArray.length; i++){
                var item=dataArray[i];
                data[item['name']]=item['value'];
            }
            
            var distancia=parseFloat(data['distancia']);
            if(data['unidades']=='km'){
                distancia=parseFloat(distancia)*1000;
            }
            
            var tiempo=0;
            var rm=0;
            var rs=0;
            var rh=0;
            
            var horas=parseFloat(data['horas']);
            var minutos=parseFloat(data['minutos']);
            var segundos=parseFloat(data['segundos']);
            
            if((isNaN(horas) || isNaN(minutos) || isNaN(segundos) ) ||
                (horas==0 && minutos==0 && segundos==0)
            ){
                 rh=0;
                 rm=parseFloat(data['mkm_minutos']);
                 rs=parseFloat(data['mkm_segundos']);
                 tiempo=((rs+rm*60)/1000)*distancia;
                 
                 $('#horas_carrera').val(Math.floor(tiempo/3600));
                 var aux=tiempo-Math.floor(tiempo/3600)*3600;
                 $('#minutos_carrera').val(Math.floor(aux/60));
                 aux=aux-Math.floor(aux/60)*60;
                 $('#segundos_carrera').val(Math.floor(aux));
                 
            }else{
            
                tiempo=horas*3600+minutos*60+segundos;

                var ritmo=1000*(tiempo/distancia);
                rh=Math.floor(ritmo/3600);
                var aux=ritmo-(rh*3600);
                rm=Math.floor(aux/60);
                aux=rh*3600+rm*60;
                rs=Math.round(ritmo-aux);
                
                
            }
            
            var ritmo_txt=parseInt2char(rm)+":"+parseInt2char(rs);//parseInt2char(rh)+":"+parseInt2char(rm)+":"+parseInt2char(rs);
            var vel_media=3.6*distancia/tiempo;
            
            $('#carrera_ritmo').val(ritmo_txt);
            $('#carrera_vel_media').val(vel_media.toFixed(4));
            
            $('#carrera_resultados').slideDown('slow');  
            
            return false;
        });
        
    });
    
    
</script>

<?php
    $this->widget("NoticiasBiCol");

    $this->widget("ArticulosEnPortada"); 
?>
