<?php
//Necesitamos textarea y datapicker (ui jquery)
$cs=Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
$cs->registerCssFile(Yii::app()->request->baseUrl.'/css/ui-lightness/jquery-ui-1.7.2.custom.css', '');
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery-ui-1.7.2.custom.min.js', CClientScript::POS_HEAD);
$cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/tiny_mce/tiny_mce.js', CClientScript::POS_HEAD);
?>

<div id="infoContentWrapper" class="form clearfix">

<?php echo CHtml::beginForm(); ?>
	<?php echo CHtml::activeHiddenField($model,'idArticleCategory'); ?>
    <div id="side-infoContent">
        <div class="portlet">
            <div class="top naranja">Publicaci&oacute;n</div>
            <div class="flecha_naranja"></div>
            <div class="content">
                <div class="row">
                    <?php echo CHtml::activeLabelEx($model,'template'); ?>
                    <?php echo CHtml::activeDropDownList($model,'template',ACMS::getTemplates_Categories()); ?>
                    <?php echo CHtml::error($model,'template'); ?>
                </div>
                <div class="row buttons">
                    <?php echo CHtml::activeCheckBox($model,'acceptComments'); ?>
                    <?php echo CHtml::activeLabelEx($model,'acceptComments', array("style"=>"display:inline")); ?>
                    <?php echo CHtml::error($model,'acceptComments'); ?>
                </div>
                <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button')); ?>
                        <?php echo CHtml::linkButton('Delete',array('submit'=>array('delete','id'=>$model->idArticleCategory),'confirm'=>'¿Estás seguro de eliminar esta categoria?','class'=>'buttonDelete')); ?>
                </div>

                <p class="note">Fields with <span class="required">*</span> are required.</p>

            </div><!-- End content -->
        </div><!-- End portlet -->
        
   
    </div>


   <div id="infoContent">
            <?php echo CHtml::errorSummary($model); ?>
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
                    echo CHtml::activeHiddenField($item,"[$i]idArticleCategory");

                    echo CHtml::activeLabelEx($item,"title");
                    echo CHtml::activeTextField($item,"[$i]title",array('class'=>'titular','maxlength'=>255));
                    
                    echo "</div>";
               }
               ?>
               
           </div>
           <br/>
           <!-- Childs -->
           <div class="portlet ">
                <div class="top naranja">Sub-categorias</div>
                <div class="flecha_naranja"></div>
                <div class="content clearfix" >
                   <TABLE width="100%" class="listado" >
                        <THEAD>
                             <tr>
                                 <th width="24" class="center">id</th>
                                <th style="text-align: left;">Titulo</th>
                              </tr>
                        </THEAD>
                        <TBODY class="contenido_tabla">
                            <?php
                            foreach($model->childs as $i=>$data){
                                $this->renderPartial('_view',array('index'=>$i,'data'=>$data));
                            }
                            ?>
                        </TBODY>
                    </TABLE>
                    <?php echo CHtml::linkButton('A&ntilde;adir',array('submit'=>array('create','idparent'=>$model->idArticleCategory),'class'=>'button')); ?>
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