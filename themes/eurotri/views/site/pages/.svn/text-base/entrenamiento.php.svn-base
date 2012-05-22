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
$this->portlets[]=array('Siguenos',array('urlTwitter'=>'@eurotri','urlFacebook'=>'http://www.facebook.com/pages/Eurotri/168637049863680'));
$this->portlets[]=array('FacebookBox',array());

$this->pageTitle=Yii::app()->name." - Entrenamiento";


 $cs=Yii::app()->clientScript;

 $cs->registerScript('entrenamientoScript',
   '
       $(function() {
            $("div.transformEntre").jqTransform();
   	    $( "#calendarioEntrenamiento" ).datepicker();
       });
       ',
   CClientScript::POS_HEAD);

?>


<div class="banner" style="margin-bottom:32px;">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/banner_planes.png">
			
			
		<div class="planescombo clearfix">
			<form action="#" class="form">			
				<div class="clearfix ">
				<!--combo pais-->
				<div class="plan_entrene transformEntre" style="z-index=12"> 
				<select name="modalidad" style="width:153px;"  >
					<option value="0">Modalidad de Triatlón</option>
					<option value="ES">Sprint</option>
					<option>Olímpico</option>
				</select>
				</div>
				<!--fin_row-->
				
				<!--combo pais-->
				<div class="plan_entrene transformEntre" style="z-index=12"> 
				<select name="plan" style="width:153px;" >
					<option value="0">Plan de entrenamiento</option>
					<option value="ES">12 semanas / 8 h/semana</option>
					<option>12 semanas / 12 h/semana</option>
					<option>6 semanas / 8 h/semana</option>
					<option>6 semanas / 12 h/semana</option>
				</select>
				</div>
				<!--fin_row-->
				
				<div class="select_date clearfix">
					<label for="calendarioEntrenamiento" style="margin-right:5px;">Fecha de competición</label>
					<div class="input_big" style="margin-top:4px;">
						<input class="date_box" id="calendarioEntrenamiento" name="date"/>
					</div>
					<div class="submit">
						<input type="submit" value="Submit" name="yt1">
					</div>
				</div>
			</div>
			</form>
		</div>
		</div>
		
		<!--NUEVO-NUEVO-NUEVO-NUEVO-NUEVO-->
		<div class="clearfix" style="margin-bottom:20px;">
			<div class="entre_iz">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/title1.png">
				<p>Using these training zones will help you train at  the right intensity for each session. This helps you to develop specific aspects of your fitness, as well as making sure you don't overdo it. You can either estimate your intensity, using the training zone descriptions, or use a heart-rate monitor for a more precise measure. If you use a heart-rate monitor, use the percentages provided, and subtract them from your observed maxium heart rate to calculate your zones. Tools like cycle power meter and gps watches will aslo help track your training progress, but they are not essential for these plans.</p>
			</div>
			<div class="entre_de">
				<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/title2.png">
				<div class="clearfix">
					<div class="sub_iz">
						<p>Escribe tu edad, o tu frecuencia cardiaca máxima si la sabes para cacular tus zonas</p>
						<div class="boxi clearfix">
							<label for="edad" style="margin-right:28px;">Edad</label>
							<div class="input_small" style="margin-left:4px;">
                    			<input type="text" value="00" size="3" name="edad" id="edad" id="natacion_horas">
               				</div>
						</div>
						<div class="boxi clearfix">
							<label for="max" style="margin-right:15px;">F. Máx.</label>
							<div class="input_small">
                    			<input type="text" value="00" size="3" name="max" id="max" id="natacion_horas">
               				</div>
						</div>
						<div class="entrene">
						<div class="submit">
							<input type="submit" name="yt1" value="Submit">
						</div>
						</div>
					</div>
					<div class="sub_de">
						<ol class="zs">
							<li class="z1">134-145 <span>Pulsaciones</span></li>
							<li class="z2">145-155 <span>Pulsaciones</span></li>
							<li class="z3">155-165 <span>Pulsaciones</span></li>
							<li class="z4">165-170 <span>Pulsaciones</span></li>
							<li class="z5">170-180 <span>Pulsaciones</span></li>
						</ol>
					</div>
				</div>
			</div>
		
			<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/zona_entrenamiento_eqm.png">
		</div>
		<!--NUEVO-NUEVO-NUEVO-NUEVO-NUEVO-->
		
		<!--BANNER NEGRO-->
		<div class="banner_negro">
			<div class="distancia2">distancia<br><span>olímpico</span></div>
			<div class="plan">Plan <span>12 semanas</span><br>8-10 Horas semanales</div>
			<a href="#" class="printplan" target="_blank">Imprimir Plan</a>
		</div>
		<!--FIN BANNER NEGRO-->
		
		<div class="titular2">
			Semana <span>09</span>
		</div>
		
		<div class="tabla_content">	
		<!--TABLA-->
			<table class="plan_entrenamiento">
				<thead>
					<tr>
						<th width="120">Día</th>
						<th width="72">Tipo</th>
						<th width="438">Entrenamiento</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td cellpadding="5">
							<span class="blueday"><span>LUNES</span></span>
							<span class="fecha_entrenamiento">16 <span>| ABRIL</span></span>
						</td>
						<td><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/big_corr.png"></td>
						<td>
							<p><strong>Correr 40 minutos</strong><br>
							<span>Calentamiento</span> (Z1) 10 min. <span>Principal</span> (Z2) 35 min. + insertar 6x30 seg.<br> 
							<span>Finalización</span> (Z1) 5 min.</p>
						</td>
					</tr>
					<tr>
						<td cellpadding="5">
							<span class="blueday"><span>MARTES</span></span>
							<span class="fecha_entrenamiento">17 <span>| ABRIL</span></span>
						</td>
						<td><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/big_nad.png"></td>
						<td>
							<p><strong>Nadar 2.500 mts.</strong><br>
							<span>Técnica</span> (Z1-Z3) 400 m. batido de pies, alternando 25 m. en Z3, 25 m. en Z1 descanso 30 Seg. 400 m. 25 m. suave, 25 m. fuerte descanso 30 seg. <span>Principal</span> (Z3): 8x50 pull descansando 20 seg. <span>Soltando</span> (Z1): 400 m. alternando crol y espalda.</p>
						</td>
					</tr>
					<tr>
						<td cellpadding="5">
							<span class="blueday"><span>MIÉRCOLES</span></span>
							<span class="fecha_entrenamiento">18 <span>| ABRIL</span></span>
						</td>
						<td><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/big_bic.png"></td>
						<td>
							<p><strong>Ciclismo 40 minutos</strong><br>
							<span>Calentamiento</span> (Z1) 10 min. <span>Principal</span> (Z2) 20 min. + insertar 5x2min. descansando 30 seg. <span>Finalización</span> (Z1) 5 min. manteniendo una cadencia de 90.</p>
						</td>
					</tr>
					<tr>
						<td cellpadding="5">
							<span class="blueday"><span>JUEVES</span></span>
							<span class="fecha_entrenamiento">19 <span>| ABRIL</span></span>
						</td>
						<td><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/big_pes.png"></td>
						<td>
							<p><strong>Sesión de gimnasio</strong><br>
<span>Técnica</span> (Z1-Z3) 400 m. batido de pies, alternando 25 m. en Z3, 25 m. en Z1 descanso 30 Seg. 400 m. 25 m. suave, 25 m. fuerte descanso 30 seg. <span>Principal</span> (Z3): 8x50 pull descansando 20 seg. <span>Soltando</span> (Z1): 400 m. alternando crol y espalda.</p>
						</td>
					</tr>
					<tr>
						<td cellpadding="5">
							<span class="blueday"><span>VIERNES</span></span>
							<span class="fecha_entrenamiento">20 <span>| ABRIL</span></span>
						</td>
						<td><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/big_des.png"></td>
						<td>
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/descanso.png">
						</td>
					</tr>
					<tr>
						<td cellpadding="5">
							<span class="blueday"><span>SÁBADO</span></span>
							<span class="fecha_entrenamiento">21 <span>| ABRIL</span></span>
						</td>
						<td><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/big_bic.png"></td>
						<td>
							<p><strong>Ciclismo 40 minutos</strong><br>
<span>Calentamiento</span> (Z1) 10 min. <span>Principal</span> (Z2) 20 min. + insertar 5x2min. descansando 30 seg. <span>Finalización</span> (Z1) 5 min. manteniendo una cadencia de 90.</p>
						</td>
					</tr>
					<tr>
						<td cellpadding="5">
							<span class="blueday"><span>DOMINGO</span></span>
							<span class="fecha_entrenamiento">22 <span>| ABRIL</span></span>
						</td>
						<td>
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/big_bic.png" style="margin-bottom:20px;">
							<img src="<?php echo Yii::app()->theme->baseUrl;?>/images/big_corr.png">
						</td>
						<td>
							<p><strong>Ciclismo 40 minutos</strong><br>
<span>Calentamiento</span> (Z1) 10 min. <span>Principal</span> (Z2) 20 min. + insertar 5x2min. descansando 30 seg. <span>Finalización</span> (Z1) 5 min. manteniendo una cadencia de 90.</p>
							<p><strong>Correr 40 minutos</strong><br>
<span>Calentamiento</span> (Z1) 10 min. <span>Principal</span> (Z2) 35 min. + insertar 6x30 seg. <br>
<span>Finalización</span> (Z1) 5 min.</p>
						</td>
					</tr>
				</tbody>
			</table>
		<!--FIN TABLA-->
		</div>	
			
			
			<div class="paginacion clearfix" style="border-top:none;">
				<ul>
					<li class="on"><a href="#" class="number">1</a></li>
					<li><a href="#" class="number">2</a></li>
					<li><a href="#">Ver siguiente semana</a></li>
				</ul>
			</div>
			