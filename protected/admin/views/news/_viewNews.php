<tr class="<?php echo (($index%2)==0)? "even":"odd"; ?>">
    <td class="center">
	<?php echo CHtml::link(CHtml::encode($data->idArticle), array('updateNews', 'id'=>$data->idArticle)); ?>
    </td><td class="title_table_link">
	<?php echo CHtml::link(CHtml::encode(ACMS::getTitle($data,ACMS::getDefaultLang()->idLang)), array('updateNews', 'id'=>$data->idArticle)); ?> - <i><?php echo ($data->published)?"Publicado":"Sin publicar"; ?></i>
    </td><td class="">
        <?php echo CHtml::encode($data->author0->user); ?>
    </td>
    <td>
        <?php 
        if(!empty ($data->myCategory))
            echo CHtml::encode(ACMS::getTitle($data->myCategory, ACMS::getDefaultLang()->idLang)); 
        else
            echo "Sin categoria asignada.";
        ?>
        
    </td>
    <td>
        <?php
        if($data->commentPendingCount>0)
                echo "<strong>";
        ?>
        <a href="#" title="<?php echo $data->commentPendingCount;?> Pendientes" class="post-com-count">
            <span class="comment-count"><?php echo $data->commentTotalCount;?></span>
        </a>
        <?php
        if($data->commentPendingCount>0)
                echo "</strong>";
        ?>
    </td>
    <td class="">
	<?php echo date("d/m/Y",strtotime($data->date)); ?>
    </td><td class="">
	<?php echo CHtml::encode($data->hits); ?>
    </td>
</tr>