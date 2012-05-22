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
$this->portlets[]=array('Siguenos',array('urlTwitter'=>'@eurotri','urlFacebook'=>'http://www.facebook.com/pages/Eurotri/168637049863680'));
$this->portlets[]=array('FacebookBox',array());

$this->pageTitle=Yii::app()->name." - Resultados de triatlón";



 $cs=Yii::app()->clientScript;

 $cs->registerScript('resultadosScript',
   '
       $(function() {
            $("div.transformRes").jqTransform();
       });
       ',
   CClientScript::POS_HEAD);

?>

<div class="articulo">
			
			<!--<div class="submenu clearfix">
				<ul>
					<li><a href="#" class="on">EVENTOS</a></li>
					<li><a href="#">Calendario</a></li>
				</ul>
			</div>-->
			
			<div class="banner_result">
                            <form action="#">
				<div class="result_input">
					<input type="text" name="desde" id="desde" value="Prueba"/>
				</div>
				<div action="#" class="form result_box">			
				<div class="clearfix ">
					<!--combo pais-->
					<div class="options_result transformRes" style="z-index:12;"> 
					<select name="modalidad" style="width:301px !important;"  >
						<option value="0">Selecciona mes (opcional)</option>
						<option value="1">Enero</option>
						<option value="2">Febrero</option>
						<option value="3">Marzo</option>
						<option value="4">Abril</option>
						<option value="5">Mayo</option>
						<option value="6">Junio</option>
						<option value="7">Julio</option>
                                                <option value="8">Agosto</option>
                                                <option value="9">Septiembre</option>
                                                <option value="10">Octubre</option>
                                                <option value="11">Noviembre</option>
                                                <option value="12">Diciembre</option>
					</select>
					</div>
					<!--fin_row-->
				</div>
				</div>
                                
				<div class="obtener_result">
					<div class="submit">
						<input type="submit" name="yt1" value="Submit">
					</div>
				</div>
                            </form>
			</div>
			
			<table class="tabla">
					<thead>
						<tr>
							<th width="57" style="text-align:center;">Fecha</th>
							<th width="301"><a href="#" class="order">Prueba</a></th>
							<th><a href="#" class="order">Ubicación</a></th>
							<th>Web</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td style="text-align:center;" class="fecha_evento_tabla"><span class="f_num">16</span><br><span class="f_mes">ABRIL</span></td>
							<td clsas="prueba_datos_prueba"><span class="prueba">Triatlón Fuente Álamo<img src="upload/organizadores/20110527084501.png" alt="IronMan 70.3" /></span><span class="datos_prueba">Madrid | Puntuable</span></td>
							<td>Madrid</td>
							<td><a class="web2" href="#">Web</a></td>
						</tr>
						<tr>
							<td style="text-align:center;" class="fecha_evento_tabla"><span class="f_num">16</span><br><span class="f_mes">ABRIL</span></td>
							<td clsas="prueba_datos_prueba"><span class="prueba">Triatlón de Zaraut</span><span class="datos_prueba">Vitoria </span></td>
							<td>Pais Vasco</td>
							<td><a class="web2" href="#">Web</a></td>
						</tr>
                                                <tr>
							<td style="text-align:center;" class="fecha_evento_tabla"><span class="f_num">16</span><br><span class="f_mes">ABRIL</span></td>
							<td clsas="prueba_datos_prueba"><span class="prueba">I Tríatlon Concello De Poio</span><span class="datos_prueba"></span></td>
							<td></td>
							<td><a class="web2" href="#">Web</a></td>
						</tr>
					</tbody>
				</table>
				<div class="paginacion clearfix">
				<ul>
					<li class="on"><a href="#" class="number">1</a></li>
					<li><a href="#" class="number">2</a></li>
					<li><a href="#">Ver artículo completo</a></li>
				</ul>
			</div>
		</div>
			





			
                <?php
                $this->widget("ArticulosEnPortada"); 
                ?>




                <!-- CREAR WIDGET / COMPONENTE AL IGUAL QUE EL ANTERIOR 
                    SE PUEDE ENCONTRAR EN /protected/componentes/ArticulosEnPortada.php 
                    con vista en misma ruta mas view/articulosEnPortada
                
                    PD. ArticulosEnPortada no esta depurado, pero puede servir de referencia
                
                Estas dos columanas pertenecen a la categoria: 6 (e hijos) con id menu 8 y 
                categoria 7(e hijos) con idm 9 respectivamente
                
                Para recoger las noticias/articulos de una categoria y sus hijos :
                
                //Condicion de coger todas las noticias
                $cond='type="news" and published=true';
                //Condicion de que perteneczan a una categoria en concreta e hijos
                $categorias=ACMS::getChildCategories($categoria);
                $catCond=join(' or category=',$categorias);
                //Condicion completada para query.
                $cond=$cond.' and (category='.$catCond.')';
                
                -->
		
		<div class="bicol_content">
		<div class="bicolumna clearfix">
			<div class="col50">
				<div class="titular5">
					<span>triatlon</span> nacional
				</div>
				
				<ul class="bull2">
					<li>
						<a href="#">Convocatoria curso de entrenador de triatlón en La Coruña</a>
						<div class="titular4">
							8 ABRIL  |  <span>Fuente: Fetri</span>
						</div>
					</li>
					<li>
						<a href="#">Espectacular el I Duatlón Contrarreloj Leciñena - Campeonato de Aragón de Duatlón</a>
						<div class="titular4">
							8 ABRIL  |  <span>Fuente: Fetri</span>
						</div>
					</li>
					<li>
						<a href="#">Celebrada la presentación oficial del Campeonato de España de Triatlón Cros que tendrá lugar en Caspe el 11 y 12 de junio</a>
						<div class="titular4">
							8 ABRIL  |  <span>Fuente: Fetri</span>
						</div>
					</li>
					<li>
						<a href="#">Excelente actuación española en Ishigaki. Iván Raña acaba en un reñido cuarto puesto</a>
						<div class="titular4">
							8 ABRIL  |  <span>Fuente: Fetri</span>
						</div>
					</li>
				</ul>
			</div>
			<div class="col50">
				<div class="titular5">
					<span>triatlon</span> internacional
				</div>
				
				<ul class="bull2">
					<li>
						<a href="#">Convocatoria curso de entrenador de triatlón en La Coruña</a>
						<div class="titular4">
							8 ABRIL  |  <span>Fuente: Fetri</span>
						</div>
					</li>
					<li>
						<a href="#">Espectacular el I Duatlón Contrarreloj Leciñena - Campeonato de Aragón de Duatlón</a>
						<div class="titular4">
							8 ABRIL  |  <span>Fuente: Fetri</span>
						</div>
					</li>
					<li>
						<a href="#">Celebrada la presentación oficial del Campeonato de España de Triatlón Cros que tendrá lugar en Caspe el 11 y 12 de junio</a>
						<div class="titular4">
							8 ABRIL  |  <span>Fuente: Fetri</span>
						</div>
					</li>
					<li>
						<a href="#">Excelente actuación española en Ishigaki. Iván Raña acaba en un reñido cuarto puesto</a>
						<div class="titular4">
							8 ABRIL  |  <span>Fuente: Fetri</span>
						</div>
					</li>
				</ul>
			</div>
		</div>
		</div>
		
                
                
                
                 <!-- CREAR WIDGET / COMPONENTE AL IGUAL QUE 
                 /protected/componentes/ArticulosEnPortada.php 
                 con vista en misma ruta mas view/articulosEnPortada
                
                 
                Es suficiente con recoger los últimos 3 de la categoria 9 e hijos.
                
                
                -->
                
		<div class="titular2">
			<span>artículos</span> triatlón
		</div>
		
		<div class="modul_articulo clearfix">
			<div class="img_iz">
				<img src="images/foto_art_1.png">
			</div>
			<div class="text_de">
				<div class="submenu clearfix" style="margin-bottom:15px;">
					<ul>
						<li><a class="on" href="#">ENTRENAMIENTO</a></li>
						<li><a href="#">NIVEL INICIACIÓN</a></li>
					</ul>
				</div>
				<a href="#" class="enlace_tit">Natación en aguas abiertas</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam feugiat vehicula metus, sit amet semper enim venenatis et. Nam vitae neque id enim ullamcorper adipiscing quis quis nulla. Ut nec odio eros, quis egestas libero. <a href="#" class="leer">Leer más</a></p>
			</div>
		</div>
		
		<div class="modul_articulo clearfix">
			<div class="img_iz">
				<img src="images/foto_art_2.png">
			</div>
			<div class="text_de">
				<div class="submenu clearfix" style="margin-bottom:15px;">
					<ul>
						<li><a class="on" href="#">ENTRENAMIENTO</a></li>
						<li><a href="#">NIVEL INICIACIÓN</a></li>
					</ul>
				</div>
				<a href="#" class="enlace_tit">Natación en aguas abiertas</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam feugiat vehicula metus, sit amet semper enim venenatis et. Nam vitae neque id enim ullamcorper adipiscing quis quis nulla. Ut nec odio eros, quis egestas libero. <a href="#" class="leer">Leer más</a></p>
			</div>
		</div>
		
		<div class="modul_articulo clearfix">
			<div class="img_iz">
				<img src="images/foto_art_3.png">
			</div>
			<div class="text_de">
				<div class="submenu clearfix" style="margin-bottom:15px;">
					<ul>
						<li><a class="on" href="#">ENTRENAMIENTO</a></li>
						<li><a href="#">NIVEL INICIACIÓN</a></li>
					</ul>
				</div>
				<a href="#" class="enlace_tit">Natación en aguas abiertas</a>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam feugiat vehicula metus, sit amet semper enim venenatis et. Nam vitae neque id enim ullamcorper adipiscing quis quis nulla. Ut nec odio eros, quis egestas libero. <a href="#" class="leer">Leer más</a></p>
			</div>
		</div>
