<?php
?>

<h1><div class="icon32_page"></div>P&aacute;ginas</h1>
<?php echo CHtml::linkButton('Nuevo',array('submit'=>array('createPage'),'class'=>'button')); ?>
<br/>

<TABLE width="100%" class="listado" >
    <THEAD>
         <tr>
             <th width="24" class="center">id</th>
            <th style="text-align: left;">Titulo</th>
            <th width="140" >Autor</th>
            <th width="80" >Fecha</th>
            <th width="70">Visitas</th>
          </tr>
    </THEAD>
    <TBODY class="contenido_tabla">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewPages',
)); ?>
    </TBODY>
</TABLE>