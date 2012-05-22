<div class="noticia_big <?php if($index==1){echo 'noborder';}?>">
           
            <?php echo CHtml::link(ACMS::getTitle($data),array('site/page','idm'=>$_GET['idm'],'idCat'=>$_GET['idCat'], 'id'=>$data->idArticle, 'title'=>ACMS::getTitle($data)));?>
    
            <div class="titular3" style="margin-bottom:20px;">
                    <?php
                    $fecha=getDate(strtotime($data->date));
                    $mon=ACMS::getMonthsLabel();
                    ?>
                <?php echo $fecha['mday'].' '.strtoupper($mon[$fecha['mon']]); ?>  | <?php echo ACMS::getTitle($data->myCategory);?> <span>Fuente: <?php if($data->fuente!= null && $data->fuente!=""){ echo $data->fuente;}else{echo "Eurotri";}?></span>
                    
            </div>

            
    <div class="clearfix">
             <?php 
            if(ACMS::getFirstTextImageSrc($data)!="src='upload/default.png'"){
                
            ?>
            <div class="entrevista_imagen_bk">
                <div class="entrevista_imagen" >
                    <img <?php echo ACMS::getFirstTextImageSrc($data); ?> height="197" style="margin-bottom:9px; float:left;">
                </div>
            </div>
            <?php } ?>
            <p style="margin-top:0px;"><?php echo ACMS::getMinimalText($data, 700); ?>...</p>
    </div>
        </div>