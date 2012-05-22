<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<ul>
<?php 
$meses=ACMS::getMonthsLabel();

$actual_date=null;
$add_fecha_box=false;
foreach($eventos as $item):
    if($actual_date==null){
        $actual_date=$item->date;
        $add_fecha_box=true;
    }
    if($actual_date!=$item->date){
        $actual_date=$item->date;
        $add_fecha_box=true;
    }
?>


    
    
    
<?php if($add_fecha_box):
  $add_fecha_box=false;
    $fecha=getDate(strtotime($actual_date));
?>
<div class="eventos clearfix">
    	<div class="fecha_evento">
    		<span><?php echo $fecha['mday'];?> de <?php echo $meses[$fecha['mon']];?></span>
    	</div>
</div>
<?php
endif;
?>


            <li>
                <?php
                $ico="";
                if(isset($item->brand)){
                    $ico=CHtml::image("upload/organizadores/".$item->brand->ico_file, $item->brand->title);
                }
                ?>
                <span class="titulo_evento"><?php echo ACMS::getTitle($item).$ico;?></span>
                
                <?php 
                if(count($item->distances)>0){
                    foreach($item->distances as $distancia){?>
                        <div class="distancias">
                        <span><?php echo ACMS::getTitle($distancia); ?> :</span><span class="<?php if($distancia->duatlon) echo "run"; else echo "swim";?>"><?php echo round($distancia->swimming); if($distancia->duatlon) echo "km"; else echo "m";?></span>
                        <span class="cicle"><?php echo round($distancia->cycling);?>km</span>
                        <span class="run"><?php echo round($distancia->running);?>km</span>
                        </div>
                       <?php 
                       }
                }else{
                    echo "<span>Distancias a determinar</span>";
                }?>
                
                    <?php if(isset($item->web) && $item->web !=null && $item->web!=''):?>
                    <a class="web" href="<?php echo $item->web;?>" target="_blank">Web</a>
                    <?php endif;?>
            </li>




<?php

endforeach;
?>
  </ul>
    <a href="index.php?r=SportsEvents/default/index&idm=29&q=d&date=<?php echo $date ?>" class="arrow">MÁS RESULTADOS</a>