<tr class="<?php echo (($index%2)==0)? "even":"odd"; ?>">
    <td class="center">
	<?php echo CHtml::link(CHtml::encode($data->idArticleCategory), array('update', 'id'=>$data->idArticleCategory,'idparent'=>$data->parent)); ?>
    </td><td class="title_table_link">
	<?php echo CHtml::link(CHtml::encode(ACMS::getTitle($data,ACMS::getDefaultLang()->idLang)), array('update', 'id'=>$data->idArticleCategory,'idparent'=>$data->parent)); ?>
    </td>
</tr>
