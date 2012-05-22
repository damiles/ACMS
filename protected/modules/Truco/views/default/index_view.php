<div class="noticia_big <?php if($index==1){echo 'noborder';}?>">
           
            <?php echo "<h1>".ACMS::getTitle($data)."</h1>";?>
    
<?php
$idSel=0;
if(isset($_GET["idSel"]))
    $idSel=$_GET["idSel"];
?>
    <div class="clearfix">
            
            <div class="entrevista_imagen_bk" style="margin-left:25px; margin-right:0px; float:right;">
                <div class="entrevista_imagen" >
                    <img src="<?php echo $data->imagen ?>"  width="297" style="margin-bottom:9px; float:left;">
                </div>
            </div>
            <p style="margin-top:0px;">
                <ul class="bull3">
                <?php foreach($data->trucos as $truco):
                    if($truco->published){
                        if($truco->idTruco!=$idSel)
                            echo "<li>".ACMS::getText($truco)."</li>";
                        else
                            echo "<li><span style='background-color:#F29B18; color:#fff;'>".ACMS::getText($truco)."</span></li>";
                    }
                endforeach;
                ?>
                </ul>
            </p>
    </div>
        </div>
