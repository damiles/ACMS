<li>
        <?php echo CHtml::link(ACMS::getTitle($data),array('site/page','idm'=>$_GET['idm'],'idCat'=>$_GET['idCat'], 'id'=>$data->idArticle, 'title'=>ACMS::getTitle($data)));?>
        <div class="titular4">
            <?php
            $fecha=getDate(strtotime($data->date));
            $mon=ACMS::getMonthsLabel();
            ?>
                <?php echo $fecha['mday'].' '.$mon[$fecha['mon']]; ?>  |  <span>Fuente: <?php if($data->fuente!= null && $data->fuente!=""){ echo $data->fuente;}else{echo "Eurotri";}?></span>
        </div>
</li>