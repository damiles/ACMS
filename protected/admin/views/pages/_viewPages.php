<tr class="<?php echo (($index%2)==0)? "even":"odd"; ?>">

    <td class="center">
	<?php echo CHtml::link(CHtml::encode($data->idArticle), array('updatePage', 'id'=>$data->idArticle)); ?>
    </td><td class="title_table_link">
	<?php echo CHtml::link(CHtml::encode(ACMS::getTitle($data,ACMS::getDefaultLang()->idLang)), array('updatePage', 'id'=>$data->idArticle)); ?> - <i><?php echo ($data->published)?"Publicado":"Sin publicar"; ?></i>
    </td><td class="">
        <?php echo CHtml::encode($data->author0->user); ?>
    </td><td class="">
	<?php echo date("d/m/Y",strtotime($data->date)); ?>
    </td><td class="">
	<?php echo CHtml::encode($data->hits); ?>
    </td>


</tr>