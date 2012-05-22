<?php
//Necesitamos textarea y datapicker (ui jquery)
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/ui-lightness/jquery-ui-1.7.2.custom.css', '');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui-1.7.2.custom.min.js', CClientScript::POS_HEAD);
?>
<script type="text/javascript">
$(function() {
        $(".datepicker").datepicker({dateFormat: "yy-mm-dd"});
});
</script>

<div id="infoContentWrapper" class="form clearfix">

<?php echo CHtml::beginForm(); ?>

    <div id="side-infoContent">
        <div class="portlet">
            <div class="top naranja">Publicaci&oacute;n</div>
            <div class="flecha_naranja"></div>
            <div class="content">

                <div class="row" style="height:22px;">
                        <?php echo CHtml::activeCheckBox($model,'active',array("style"=>"float:left;margin:0px 4px;")); ?>
                        <?php echo CHtml::activeLabelEx($model,'active',array("style"=>"float:left;")); ?>
                </div>
                
                <div class="row">
                        <?php echo CHtml::activeLabelEx($model,'display_in'); ?>
                        <?php echo CHtml::activeDropDownList($model,'display_in',ACMS::getMenusCategories()); ?>
                </div>
                
                
                <div class="row">
                        <?php echo CHtml::activeLabelEx($model,'access_level'); ?>
                        <?php echo CHtml::activeDropDownList($model,'access_level',array(
                        	ACMS_PUBLIC=>'Publico',
                        	ACMS_PRIVATE=>'Privado',
                        	ACMS_ONLYPUBLIC=>'Solo publico',
                        )); ?>
                </div>
                
                <div class="row">
                        <?php echo CHtml::activeLabelEx($model,'orden'); ?>
                        <?php echo CHtml::activeTextField($model,'orden'); ?>
                </div>
                
                <div class="row">
                        <?php echo CHtml::activeLabelEx($model,'css'); ?>
                        <?php echo CHtml::activeTextField($model,'css'); ?>
                </div>
                
                <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button')); ?>
                        <?php echo CHtml::linkButton('Delete',array('submit'=>array('deleteMenu','id'=>$model->idMenu),'confirm'=>'�Est�s seguro de eliminar esta noticia?','class'=>'buttonDelete')); ?>
                </div>

                <p class="note">Fields with <span class="required">*</span> are required.</p>

            </div><!-- End content -->
        </div><!-- End portlet -->
        
    </div><!-- End side-infoContent -->


   <div id="infoContent">
		   <?php echo CHtml::errorSummary($model); ?>
		   <!--  Start Lang -->
           <div id="tabs_langs">
                   
               <ul>
                   <?php
                   $sel=1;
                   $langs=Lang::model()->findAllByAttributes(array("selected"=>1));
                   foreach($langs as $i=>$item){
                        echo "<li><a href='#lang_$item->idLang'><span>$item->title</span></a></li>";
                        if($item->default)
                             $sel=$i;
                   }
                   ?>
               </ul>
               <?php
               foreach($model->content as $i=>$item){
                    echo "<div id='lang_$item->lang'>";
                    
					echo CHtml::activeHiddenField($item,"[$i]lang");
                    echo CHtml::activeHiddenField($item,"[$i]idMenu");
                    echo CHtml::activeLabelEx($item,"title");
                    echo CHtml::activeTextField($item,"[$i]title",array('class'=>'titular','maxlength'=>255));
                    
                    echo "</div>";
               }
               ?>
               
           </div>
           <!--  End Langs/Title -->
			
			<!-- Start Link Options -->
			<div class="portlet ">
			    <div class="top naranja">Enlace</div>
			    <div class="flecha_naranja"></div>
			    <div class="content " >
			    	<table>
			    		<tr>
				    		<th><?php echo CHtml::activeLabelEx($model,'type');?></th>
				    		<td><?php echo CHtml::activeDropDownList($model,'type',array(ACMS_LINK_SITE=>'Interno',ACMS_LINK_EXTERNAL=>'Externo',),array('ajax'=>array('type'=>'POST','url'=>CController::createUrl('menus/linkForm'),'update'=>'#link')));?></td>
			    		</tr>
			    		
			    		<tr>
			    			<th><?php echo CHtml::activeLabelEx($model,'target');?></th>
			    			<td><?php echo CHtml::activeDropDownList($model,'target',array("_self"=>'En la misma pagina',"_blank"=>'En otra pagina',));?></td>
			    		</tr>
			    		
			    		<tr>
			    			<th><?php echo CHtml::activeLabelEx($model,'link');?></th>
			    			<td>
			    			<div id="link">
               				<?php $this->renderPartial('_linkFormAjax', array('model'=>$model)); ?>
			    			</div>
			    			</td>
			    		</tr>
			    	</table>
			       
			       
			      
               		
			       
			      
			      
			    </div>
			</div>
			
			<!-- Start Submenus Options -->
			<div class="portlet ">
			    <div class="top naranja">Submenus</div>
			    <div class="flecha_naranja"></div>
			    <div class="content clearfix" >
			        
			        <TABLE width="100%" class="listado" style="margin-bottom:15px;" >
				    <THEAD>
				         <tr>
				            <th style="text-align: left; padding-left: 10px;">Titulo</th>
				            <th width="80" >Tipo</th>
				            <th width="70">Activo</th>
				          </tr>
				    </THEAD>
				    <TBODY class="contenido_tabla">
				
					<?php foreach($model->menus as $index=>$data){?>
					<tr class="<?php echo (($index%2)==0)? "even":"odd"; ?>">
	
					   <td class="title_table_link" style="padding-left: 10px;">
						<?php 
					        if($data->editable):
					            echo CHtml::link(CHtml::encode(ACMS::getTitle($data,ACMS::getDefaultLang()->idLang)), array('update', 'id'=>$data->idMenu)); ?> - <i><?php echo ($data->access_level==0)?"Publico":"Con restricciones"; ?> - <?php echo ($data->editable)?"Editable":"No editable";?></i>
					        <?php else:
					            echo '<span class="title">'.CHtml::encode(ACMS::getTitle($data,ACMS::getDefaultLang()->idLang))."</span>"?> - <i><?php echo ($data->access_level==0)?"Publico":"Con restricciones"; ?> - <?php echo ($data->editable)?"Editable":"No editable"; ?></i>
					        <?php endif
					        ?>
					    </td><td class="">
						<?php 
							switch($data->type)
					        {
					            case ACMS_LINK_SITE:
					                echo "Enlace interno";
					                break;
					            case ACMS_LINK_EXTERNAL:
					                echo "Enlace externo";
					                break;
					        }
						?>
					    </td>
					    
					    <td class="">
						<?php echo ($data->active)?"Activo":"Inactivo"; ?>
					    </td>
					
					
					</tr>
					<?php }//end foreach?>
				
				    </TBODY>
				</TABLE>
			        <?php echo CHtml::linkButton('A&ntilde;adir',array('submit'=>array('createMenu','idparent'=>$model->idMenu),'class'=>'button')); ?>
			    </div>
			</div>
     
    </div>
    
<?php echo CHtml::endForm(); ?>
</div><!-- form -->
<script type="text/javascript">
$(document).ready(function(){
$("#tabs_langs").tabs({selected:<?php echo $sel; ?>});
});
</script>
