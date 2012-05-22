<tr>
	<td style="text-align:center;" class="fecha_evento_tabla"><span class="f_num"><?php echo $data->dia;?></span><br><span class="f_mes"> 
	<?php $meses=ACMS::getMonthsLabel();
	echo $meses[$data->mes];?></span></td>
        <?php
        $ico="";
        $dataB=SportEvent::model()->find('idSportEvent='.$data->idSportEvent);
        if(isset($dataB->brand)){
            $ico=CHtml::image("upload/organizadores/".$dataB->brand->ico_file, $dataB->brand->title);
        }
        ?>
	<td class="prueba_datos_prueba"><span class="prueba"><?php echo $data->title." " .$ico;?></span><span class="datos_prueba"><?php echo $data->citie;?> <?php if($data->citie!=null || $data->citie!='') echo '| '; ?><?php if($data->puntuable == 1) {echo 'Puntuable';} else {echo 'No puntuable';} ?></span></td>
	<td><?php echo $data->name;?></td>
	<td>
	<?php if($data->results!=null || $data->results!='') {?>
	<a class="ok" href="<?php echo $data->results ?>">Resultados disponibles</a>
	<?php }else{
            echo "<span style='font-weight:normal;'>No disponibles</span>";
        }
?>
	</td>
</tr>