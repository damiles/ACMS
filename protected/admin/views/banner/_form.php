<script type="text/javascript">
$(function() {
        $(".datepicker").datepicker({dateFormat: "yy-mm-dd"});
});
</script>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'banner-form',
	'enableAjaxValidation'=>false,
)); ?>
    
    
    
    <div id="side-infoContent">
        <div class="portlet">
            <div class="top naranja">Publicaci&oacute;n</div>
            <div class="flecha_naranja"></div>
            <div class="content">
                <div class="row">
		<?php echo $form->labelEx($model,'target'); ?>
		<?php echo CHtml::activeDropDownList($model,'target',array("_self"=>'En la misma pagina',"_blank"=>'En otra pagina'));?>
                <?php echo $form->error($model,'target'); ?>
                </div>

                 <div class="row">
		<?php echo CHtml::activeLabelEx($model,'date'); ?>
		<?php echo CHtml::activeTextField($model,'date', array('class'=>'datepicker')); ?>
                
		<?php echo CHtml::error($model,'date'); ?>
                </div>
                <div class="row">
		<?php echo CHtml::activeLabelEx($model,'endDate'); ?>
		<?php echo CHtml::activeTextField($model,'endDate', array('class'=>'datepicker')); ?>
                
		<?php echo CHtml::error($model,'endDate'); ?>
                </div>
                <div class="row">
                        <?php echo $form->labelEx($model,'visits'); ?>
                        <?php echo $form->textField($model,'visits'); ?>
                        <?php echo $form->error($model,'visits'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'published'); ?>
                        <?php echo $form->checkBox($model,'published'); ?>
                        <?php echo $form->error($model,'published'); ?>
                </div>

                <div class="row">
                        <?php echo $form->labelEx($model,'always_present'); ?>
                        <?php echo $form->checkBox($model,'always_present'); ?>
                        <?php echo $form->error($model,'publialways_presentshed'); ?>
                </div>
                
                <div class="row">
                        <?php echo $form->labelEx($model,'orden'); ?>
                        <?php echo $form->textField($model,'orden'); ?>
                        <?php echo $form->error($model,'orden'); ?>
                </div>
                
                <div class="row buttons">
                        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array("class"=>"button")); ?>
                        <?php echo CHtml::linkButton('Delete',array('submit'=>array('delete','id'=>$model->idBanner,'idcat'=>$_GET['idcat']),'confirm'=>'¿Estás seguro de eliminar este banner?','class'=>'buttonDelete')); ?>
                </div>
                
            </div>
        </div>
        
        
        <div class="portlet">
            <div class="top naranja">Banner Tags</div>
            <div class="flecha_naranja"></div>
            <div class="content">
                <div class="row">
                            <?php //echo CHtml::activeLabelEx($model,'tags'); ?>
                            <?php //echo CHtml::activeTextArea($model,'tags',array('style'=>"width:100%;height:50px;")); ?>
                            <?php //echo CHtml::error($model,'tags'); ?>
                    <div id="tags_div">
                    <?php
                    $tags=$model->tags;
                    foreach($tags as $tag)
                    {
                        echo CHtml::ajaxLink($tag->tag, 
                                array('tag/deleteTagBannerLink','idTag'=>$tag->idTag,'idBanner'=>$model->idBanner), 
                                array('success'=>'function(data){
                                        if(data=="1")
                                            $("#tag_'.$tag->idTag.'").hide();
                                    }'),
                                array('class'=>'tagDelButton','id'=>'tag_'.$tag->idTag));
                    }
                    ?>
                        </div>
                            <?php 
                            $this->widget('CAutoComplete',
                              array(
                                             //name of the html field that will be generated
                                 'name'=>'tags', 
                                             //replace controller/action with real ids
                                 'url'=>array('tag/autoCompleteLookup'), 
                                 'max'=>10, //specifies the max number of items to display

                                             //specifies the number of chars that must be entered 
                                             //before autocomplete initiates a lookup
                                 'minChars'=>2,
                                  'multiple'=>true,
                                 'delay'=>500, //number of milliseconds before lookup occurs
                                 'matchCase'=>false, //match case when performing a lookup?

                                             //any additional html attributes that go inside of 
                                             //the input field can be defined here
                                 'htmlOptions'=>array('style'=>'width:95%','id'=>'tags'), 

                                 //'methodChain'=>".result(function(event,item){\$(\"#user_id\").val(item[1]);})",
                                 ));
                            echo CHtml::ajaxButton("Añadir tags", 
                                    array('tag/addTagsToBanner','idBanner'=>$model->idBanner),
                                    array('update'=>'#tags_div','data'=>array('idBanner'=>$model->idBanner,'tags'=>'js:$("#tags").val()'))
                                    );
                            ?>
                    
                    </div>
            </div><!-- End content -->
        </div><!-- End portlet -->
        
        
    </div>
    <div id="infoContent">
    

<?php echo $form->hiddenField($model,'display_in'); ?>

        <div class="portlet "> 
			    <div class="top naranja">Enlace</div> 
			    <div class="flecha_naranja"></div> 
			    <div class="content " > 
        
                                <?php echo $form->errorSummary($model); ?>



                                        <?php echo $form->labelEx($model,'src'); ?>
                                        <?php //echo $form->textField($model,'src',array('size'=>60,'maxlength'=>255)); ?>
                                        <?php echo CHtml::activeDropDownList($model,'src',ACMS::getImagenList(true,"Banners"), array('onchange'=>'cambiaImagen();'));?>
                                        <?php echo $form->error($model,'src'); ?>

                                <br/><br/>
                                
                                <img src="<?php echo CHtml::encode($model->src); ?>" id="imagen" />

                                <br/><br/>
                                
                                <?php echo $form->labelEx($model,'miniatura'); ?>
                                        <?php //echo $form->textField($model,'src',array('size'=>60,'maxlength'=>255)); ?>
                                        <?php echo CHtml::activeDropDownList($model,'miniatura',ACMS::getImagenList(true,"Banners"), array('onchange'=>'cambiaImagenMiniatura();'));?>
                                        <?php echo $form->error($model,'miniatura'); ?>

                                <br/><br/>
                                
                                <img src="<?php echo CHtml::encode($model->miniatura); ?>"  id="miniatura" />

                                <br/><br/>
                                
                                        <?php echo $form->labelEx($model,'link'); ?>
                                        <?php echo $form->textField($model,'link',array('size'=>60,'maxlength'=>255)); ?>
                                        <?php echo $form->error($model,'link'); ?>
                                

	
                            </div>
        </div>
	
        
        <div class="portlet "> 
			    <div class="top naranja">Páginas asociadas</div> 
			    <div class="flecha_naranja"></div> 
			    <div class="content " > 
                                <div class="clearfix">
                                    <input value="" id="linkURL"/><a href="#" id="linkURLButton" onClick="addLinkURL();return false;" class="button" >Añadir</a>
                                </div>
                                <br/><br/>
                                <div id="linksURL" class="clearfix">
                                    <?php
                                    $count=1;
                                    foreach($model->linkedTo as $item){
                                        echo CHtml::hiddenField('linkedTo[]',$item->url, array('id'=>'blth_'.$count));
                                        
                                        echo CHtml::link($item->url, 
                                        array('#'), 
                                        array('class'=>'tagDelButton','onclick'=>'removeLinkURL('.$count.');return false;','style'=>'float:none;','id'=>'blt_'.$count));
                                        
                                        $count++;
                                    }
                                    ?>
                                </div>
                            </div>
        </div>

<?php $this->endWidget(); ?>

<script>
function cambiaImagen(){
    $("#imagen").attr("src",$('#Banner_src').val());
}
function cambiaImagenMiniatura(){
    $("#miniatura").attr("src",$('#Banner_miniatura').val());
}
var count=<?php echo $count; ?>;

function addLinkURL(){
    var valor=$('#linkURL').val();
    $("#linksURL").append("<input type='hidden' id='blth_"+count+"' name='linkedTo[]', value='"+valor+"' />");
    $('#linksURL').append("<a class='tagDelButton' style='float:none;' onclick='removeLinkURL("+count+"); return false;' id='blt_"+count+"'  href='#'>"+valor+"</a>");
    count++;
}
function removeLinkURL(id){
    $('#blth_'+id).remove();
    $('#blt_'+id).remove();
}
</script>


</div>