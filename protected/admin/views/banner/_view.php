<tr class="<?php echo (($index%2)==0)? "even":"odd"; ?>">
	
	<td><a href='admin.php?r=banner/update&idcat=<?php echo $_GET['idcat']?>&id=<?php echo $data->idBanner?>'><img alt="Banner <?php echo $index;?>" src="<?php echo CHtml::encode($data->src); ?>" width="150" /></a>
	</td>

	<td>	<?php echo CHtml::encode($data->visits); ?>
	</td>

	<td>	<?php echo CHtml::encode($data->published); ?>
	</td>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('orden')); ?>:</b>
	<?php echo CHtml::encode($data->orden); ?>
	<br />

	*/ ?>

</tr>
