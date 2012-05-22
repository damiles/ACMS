<?php

/*
* To change this template, choose Tools | Templates
* and open the template in the editor.
*/

$this->layout='webroot.themes.'.Yii::app()->theme->name.'.views.layouts.print';

$this->pageTitle=Yii::app()->name." - Entrenamiento";



?>


							  
                               <!--NUEVO-NUEVO-NUEVO-NUEVO-NUEVO-->
                               <div class="clearfix" style="margin-bottom:20px;">
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
                                               <a href="#" class="printplan" target="_blank">Imprimir Plan</a>
                                               
                               </div>
                               <!--FIN BANNER NEGRO-->
                               
                               
                               
                                
				
                 <?php
				
				 $this->widget('zii.widgets.CListView', array(
                            'dataProvider'=>$dataProvider,
                            'itemView'=>'_viewPrint',
                            'summaryText'=>'',
                            'pager'=>array(
                                'header'=>'',
                                'prevPageLabel'=>'',
                                'nextPageLabel'=>'',
                                ),
                            'template'=>'
                                {items}
                                ',
                    ));
					

					?>                   
                               <!--FIN TABLA-->
<?php }?>