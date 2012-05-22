<?php
?>

<h1><div class="icon32_agenda"></div>Agenda.- Eventos.</h1>
<?php echo CHtml::linkButton('Nuevo',array('submit'=>array('createAgenda'),'class'=>'button')); ?>
<br/>

<TABLE width="100%" class="listado" >
    <THEAD>
         <tr>
             <th width="24" class="center">id</th>
            <th style="text-align: left;">Titulo</th>
          </tr>
    </THEAD>
    <TBODY class="contenido_tabla">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewAgenda',
)); ?>
    </TBODY>
</TABLE>
