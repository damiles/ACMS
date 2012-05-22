
<?php 
    $clase="";
    if($data->approved==Comment::STATUS_PENDING)
            $clase="unaproved";
    if($data->approved==Comment::STATUS_SPAMMED)
            $clase="spam";
?>
<tr class="commentrow <?php echo $clase ?>">
    <td>
        <?php echo "<div class='comment_foto'>".ACMS::get_gravatar($data->email, 40, 'mm', 'g', true, array('alt'=>$data->author))."</div>"?>
        <div class="comment_userData">
            <b><?php echo CHtml::encode($data->author); ?></b><br/>
            <a href="<?php echo $data->url; ?>" target="_blank">Website</a><br/>
            <?php echo CHtml::encode($data->email); ?><br/>
            <?php echo CHtml::encode($data->ip); ?>
        </div> 
    </td>
    <td>
        <div class="submited">Creado el <?php echo ACMS::getBeautyDate($data); ?></div>
        <div>
            <?php echo CHtml::encode($data->content); ?>
        </div>
        <div class="rowActions" style="visibility: hidden;">
            <?php 
            if($data->approved==Comment::STATUS_PENDING)
                echo CHtml::link("Aprobar ", array("comment/aprove", "id"=>$data->idComment), array('class'=>"aprove"));
            else
                echo CHtml::link("Desaprobar ", array("comment/unaprove", "id"=>$data->idComment), array("class"=>"unaprove"));
            
            echo CHtml::link("Contestar ", array("comment/reply", "id"=>$data->idComment), array("class"=>"reply"));
            
            echo CHtml::link("Eliminar ", array("comment/delete", "id"=>$data->idComment),array("class"=>"delete"));
            
            echo CHtml::link("Marcar como spam", array("comment/spam", "id"=>$data->idComment),array("class"=>"spam"));
            ?>
        </div>
        <div class="respond">
            <?php
            echo CHtml::beginForm("admin.php?r=comment/reply", "post");
            echo CHtml::hiddenField("id", $data->idComment);
            echo CHtml::hiddenField("idArticle", $data->Article_idArticle);
            echo CHtml::textArea("comment",'',array('style'=>'width:100%;height:120px;'));
            echo CHtml::submitButton("contestar",array("class"=>"button"));
            echo CHtml::endForm();
            ?>
        </div>
    </td>
    <td>
        <?php echo ACMS::getTitle($data->article, ACMS::getDefaultLang());?>
    </td>
</tr>
