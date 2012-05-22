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
<form action="index.php" method="GET" >
                               <input type="hidden" value="SportsEvents/sportEvent/searchEvents" name="r"></input>
                               <input type="hidden" value="29" name="idm"></input>
 
                                                               
                                                               <div class="result_input">
                                                                              <input type="text" name="texto" id="texto" value="Nombre de la prueba"/>
                                                               </div>
                                                    <div class="form result_box">

                                                               <div class="clearfix ">
                                                                              <!--combo pais-->
                                                                              <div class="options_result transformRes" style="z-index:12;"> 
                                                                              <select name="mes" style="width:223px !important;" id="mes">
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

				
				
			
			
			 <?php
				
				 $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$dataProvider,
                            'itemView'=>'_viewR',
                            'summaryText'=>'Mostrando {start}-{end} de {count} resultado(s)',
                            'pager'=>array(
                                'header'=>'',
                                'prevPageLabel'=>'<',
                                'nextPageLabel'=>'>',
                                ),
                            'template'=>'
                               <table class="tabla">
								<thead>
						<tr>
							<th width="57" style="text-align:center;">Fecha</th>
							<th width="301">Prueba</th>
							<th>Ubicación</th>
							<th>Resultados</th>
						</tr>
					</thead>
							<tbody>
							
                                            {items} 
						
                                        </tbody>
                                    </table>

                                    <div class="clearfix">{pager} {summary}</div>',
                    ));
				?>      
			
			
</div>
			





			
                <?php
                $this->widget("NoticiasBiCol");
                
                $this->widget("ArticulosEnPortada"); 
                
                
                
                ?>




                