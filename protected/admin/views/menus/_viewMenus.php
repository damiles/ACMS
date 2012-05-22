<tr class="<?php echo (($index%2)==0)? "even":"odd"; ?>">

   <td class="title_table_link" style="padding-left: 10px;">
	<?php 
        if($data->editable):
            echo CHtml::link(CHtml::encode(ACMS::getTitle($data,ACMS::getDefaultLang()->idLang)), array('update', 'id'=>$data->idMenu)); ?> - <i><?php echo ($data->access_level==0)?"Publico":"Con restricciones"; ?> - <?php echo ($data->editable)?"Editable":"No editable";?></i>
        <?php else:
            echo '<span class="title">'.CHtml::encode(ACMS::getTitle($data,ACMS::getDefaultLang()->idLang))."</span>"?> - <i><?php echo ($data->access_level==0)?"Publico":"Con restricciones"; ?> - <?php echo ($data->editable)?"Editable":"No editable"; ?></i>
        <?php endif
        ?>
    </td><td class="">
        <?php echo ($data->parent!=0)? $data->parent0->title:'--'; ?>
    </td><td class="">
	<?php 
		switch($data->type)
        {
            case ACMS_LINK_SITE:
                echo "Enlace interno";
                break;
            case ACMS_LINK_EXTERNAL:
                echo "Enlace externo";
                break;
        }
	?>
    </td>
    
    <td class="">
	<?php
        $menusCat=ACMS::getMenusCategories();
        echo $menusCat[$data->display_in];
        ?>
    </td>

    <td class="">
	<?php echo ($data->active)?"Activo":"Inactivo"; ?>
    </td>


</tr>