<tr class="<?php echo (($index%2)==0)? "even":"odd"; ?>">
    <td class="center">
	<?php echo CHtml::link(CHtml::encode($data->idAgenda), array('updateAgenda', 'id'=>$data->idAgenda)); ?>
    </td><td class="title_table_link">
	<?php echo CHtml::link(CHtml::encode(ACMS::getTitle($data,ACMS::getDefaultLang()->idLang)), array('updateAgenda', 'id'=>$data->idAgenda)); ?>
    </td>
</tr>
