<tr class="<?php echo (($index%2)==0)? "even":"odd"; ?>">
    <td class="center">
	<?php echo CHtml::link(CHtml::encode($data->idUser), array('update', 'id'=>$data->idUser)); ?>
    </td> <td class="title_table_link">
	<?php echo CHtml::link(CHtml::encode($data->user), array('update', 'id'=>$data->idUser)); ?>
   	<br><i>
	<?php if($data->checkRole(User::GESTOR)) echo "Usuario Gestor<br/>" ?>
	<?php if($data->checkRole(User::USUARIO_WEB)) echo "Usuario Registrado<br/>" ?>
	<?php if($data->checkRole(User::USUARIO_NEWS)) echo "Acepta NEWSLETTER<br/>" ?>
	</i>
    </td><td class="">
        <?php echo CHtml::encode($data->name." ".$data->surnames); ?>
    </td><td class="">
        <?php echo CHtml::encode($data->email); ?>
    </td>
</tr>
