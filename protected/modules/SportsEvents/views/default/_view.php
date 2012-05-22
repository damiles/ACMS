<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$meses=ACMS::getMonthsLabel();
$fecha=getDate(strtotime($data->date));

$lugar="";

if($data->citie!='')
    $lugar=$data->citie.', ';
if(isset($data->provincia))
        $lugar=$lugar.$data->provincia->name." (".$data->provincia->pais->PAI_NOMBRE.")";

?>
<tr>
        <td style="text-align:center;" class="fecha_evento_tabla">
            <span class="f_num"><?php echo $fecha['mday'];?></span><br><span class="f_mes"><?php echo $meses[$fecha['mon']];?></span>
        </td>
        <td class="prueba_datos_prueba">
            <?php
            $ico="";
            if(isset($data->brand)){
                $ico=CHtml::image("upload/organizadores/".$data->brand->ico_file, $data->brand->title);
            }
            ?>
            <span class="prueba"><? echo ACMS::getTitle($data)." ".$ico;?></span>
            <span class="datos_prueba"><?php echo $lugar?> <?php if($data->puntuable==1){ echo '| Puntuable';}else{echo '';} ?></span>
        </td>
        <td>
        <table>
            <?php 
            foreach($data->distances as $distancia){
            ?>
                <tr class="pruf_result">
                    <td width="50" class="detalle"><?php echo ACMS::getTitle($distancia);?>:</td>
                        <td width="24"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/<?php if($distancia->duatlon) echo "run"; else echo "swim";?>.png"></td>
                        <td width="42" class="detalle"><?php echo round($distancia->swimming); if($distancia->duatlon) echo "km"; else echo "m";?></td>
                        <td width="24"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/cicle.png"></td>
                        <td width="26" class="detalle"><?php echo round($distancia->cycling);?>km</td>
                        <td width="24"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/run.png"></td>
                        <td width="40" class="detalle"><?php echo round($distancia->running);?>km</td>
                </tr>
                <?php }?>
                </table>
        <td>
            <?php if(isset($data->web) && $data->web !=null && $data->web!=''):?>
            <a class="web2" href="<?php echo $data->web;?>" target="_blank">Web</a>
            <?php endif;?>
        
        </td>
</tr>