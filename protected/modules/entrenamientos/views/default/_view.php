<?php
$descripcion='';
$icono='';
$ndia='';
$diasEntrenamiento=$data->identrenamiento0->nsemanas*7;
$diaSemana=0;
$diaMes=0;
$mesActividad=0;
$diaAnterior=''; 	
		   
if (count ($data->entrenamientoDias)>0) {
    foreach ($data->entrenamientoDias as $indice => $valor) {
        $ndia=($valor -> ndia);
        $semana=0;
         if (isset($_GET['EntrenamientoSemana_page'])) {
            $semana=$_GET['EntrenamientoSemana_page'];
            $semana=$semana-1;
        }
        if(isset($_REQUEST['date'])){
//            $fecha = date_create($_REQUEST['date']);
//            $fecha = date_sub($fecha, date_interval_create_from_date_string(((int)$diasEntrenamiento-(int)$ndia).' days'));
//            $diaSemana=date_format($fecha, 'w');
//            $diaMes=date_format($fecha, 'j');
//            $mesActividad=date_format($fecha, 'n');
            $fecha=getDate(strtotime($_REQUEST['date'].' -'.((int)$diasEntrenamiento-(int)$ndia-(7*$semana)).' day '));
            $diaSemana=$fecha["wday"];
            $diaMes=$fecha["mday"];
            $mesActividad=$fecha["mon"];

	}
	$dias=ACMS::getDaysLabel();
        ?>
        <tr>
            <td cellpadding="5">

                    <span class="blueday"><span>
                        <?php $dias=ACMS::getDaysLabel();
                         echo $dias[$diaSemana];
                      ?></span></span>
                    <span class="fecha_entrenamiento">
                         <?php  echo $diaMes; ?>
                        <span>|
                         <?php $meses=ACMS::getMonthsLabel();
                         echo $meses[$mesActividad];
                         ?>
                        </span>
                    </span>

            </td>
             <td>
        <?php
        foreach ($valor->entrenamientoActividads as $indice2 => $valor2) {
             $icono=($valor2 -> idtipo0 -> png);
        ?>
         <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/<?php echo $icono ?>">
        <?php } ?>
            </td>
            <td>
                    <?php
                    foreach ($valor->entrenamientoActividads as $indice2 => $valor2) {
                        
                        if($valor2->idtipo0->idtipo!=3)
                        {
                            echo "<p><strong>".$valor2->resumen."</strong><br>";
                            echo "<span>".$valor2->titular1."</span> ".$valor2->descripcion1." ";
                            echo "<span>".$valor2->titular2."</span> ".$valor2->descripcion2." ";
                            echo "<span>".$valor2->titular3."</span> ".$valor2->descripcion3." ";
                            echo "<span>".$valor2->titular4."</span> ".$valor2->descripcion4." ";
                            echo "<span>".$valor2->titular5."</span> ".$valor2->descripcion5." </p>";
                        }
                        else
                        { ?>
                        <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/descanso.png">
                     <?php
                    }
                    }
                    ?>
            </td>
    </tr>
    <?php
        }
    }
?>
