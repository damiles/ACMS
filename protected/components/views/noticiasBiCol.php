<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="bicol_content">
    <div class="bicolumna clearfix">
            <div class="col50">
                    <div class="titular5">
                            <span>triatlón</span>nacional
                    </div>

                    <ul class="bull2">
                            <?php
                            $mon=ACMS::getMonthsLabel();
                            
                            foreach($nacional as $item){
                                $fecha=getDate(strtotime($item->date));
                            ?>
                            <li>
                                    <?php echo CHtml::link(CHtml::encode(ACMS::getTitle($item)), array('/site/page', 'id'=>$item->idArticle,'idm'=>8,'idCat'=>$item->myCategory->idArticleCategory)); ?>
                                    <div class="titular4">
                                            <?php echo $fecha['mday'].' '.strtoupper($mon[$fecha['mon']]); ?>  | <span>Fuente: <?php if($item->fuente!= null && $item->fuente!=""){ echo $item->fuente;}else{echo "Eurotri";}?></span>
                    
                                    </div>
                            </li>
                            <?php 
                            }
                            ?>
                            
                    </ul>
            </div>
            <div class="col50">
                    <div class="titular5">
                            <span>triatlón</span>internacional
                    </div>

                    <ul class="bull2">
                        <?php
                                    foreach($internacional as $item){
                                $fecha=getDate(strtotime($item->date));
                            ?>
                            <li>
                                    <?php echo CHtml::link(CHtml::encode(ACMS::getTitle($item)), array('/site/page', 'id'=>$item->idArticle,'idm'=>9,'idCat'=>$item->myCategory->idArticleCategory)); ?>
                                    <div class="titular4">
                                            <?php echo $fecha['mday'].' '.strtoupper($mon[$fecha['mon']]); ?>  | <span>Fuente: <?php if($item->fuente!= null && $item->fuente!=""){ echo $item->fuente;}else{echo "Eurotri";}?></span>
                    
                                    </div>
                            </li>
                            <?php 
                            }
                            ?>
                            
                    </ul>
            </div>
    </div>
</div>