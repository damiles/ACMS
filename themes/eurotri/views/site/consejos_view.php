<div class="noticia_big <?php if($index==1){echo 'noborder';}?>">
           
            <?php echo "<h1>".ACMS::getTitle($data)."</h1>";?>
    
            <div class="titular3" style="margin-bottom:20px;">
                    <?php
                    $fecha=getDate(strtotime($data->date));
                    $mon=ACMS::getMonthsLabel();
                    ?>
                <?php echo $fecha['mday'].' '.strtoupper($mon[$fecha['mon']]); ?>  | <?php echo ACMS::getTitle($data->myCategory);?> <span>Fuente: <?php if($data->fuente!= null && $data->fuente!=""){ echo $data->fuente;}else{echo "Eurotri";}?></span>
                    
            </div>

            
    <div class="clearfix">
             <?php 
            if(ACMS::getHomeImageSrc($data)!="src='upload/default.png'"){
                
            ?>
            <div class="entrevista_imagen_bk" style="margin-left:25px; margin-right:0px; float:right;">
                <div class="entrevista_imagen" >
                    <img <?php echo ACMS::getHomeImageSrc($data); ?>  width="297" style="margin-bottom:9px; float:left;">
                </div>
            </div>
            <?php } ?>
            <p style="margin-top:0px;"><?php echo ACMS::getText($data); ?></p>
    </div>
        </div>
