<?php

?>

<h1><div class="icon32_menu"></div>Menu</h1>
<?php echo CHtml::linkButton('Nuevo',array('submit'=>array('createMenu'),'class'=>'button')); ?>
<br/>

<TABLE width="100%" class="listado" >
    <THEAD>
         <tr>
            <th style="text-align: left; padding-left: 10px;">Titulo</th>
            <th width="140" >Padre</th>
            <th width="80" >Tipo</th>
            <th width="140">Pertenece</th>
            <th width="70">Activo</th>
          </tr>
    </THEAD>
    <TBODY class="contenido_tabla">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewMenus',
)); ?>
    </TBODY>
</TABLE>