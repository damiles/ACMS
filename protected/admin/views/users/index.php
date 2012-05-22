<?php
?>

<h1><div class="icon32_users"></div>Gestión de usuarios.</h1>
<?php echo CHtml::linkButton('Nuevo',array('submit'=>array('create'),'class'=>'button')); ?>
<br/>

<TABLE width="100%" class="listado" >
    <THEAD>
         <tr>
             <th width="24" class="center">id</th>
            <th style="text-align: left;">Usuario</th>
            <th style="text-align: left;">Nombre y apellidos</th>
            <th width="140" >Email</th>
          </tr>
    </THEAD>
    <TBODY class="contenido_tabla">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewUsers',
)); ?>
    </TBODY>
</TABLE>
