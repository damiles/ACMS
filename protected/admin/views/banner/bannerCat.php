<?php

?>

<h1><div class="icon32_banners"></div> Banners</h1>

<?php echo CHtml::linkButton('Nuevo',array('submit'=>array('create','idcat'=>$cat),'class'=>'button')); ?>
<br/>

<TABLE width="100%" class="listado" >
    <THEAD>
         <tr>
            <th style="text-align: left;">Image</th>
						<th>Visits</th>
						<th>Published</th>
          </tr>
    </THEAD>
    <TBODY class="contenido_tabla">

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

</TBODY>
</TABLE>
