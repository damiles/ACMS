<?php
?>

<h1><div class="icon32_news"></div>Noticias</h1>
<div class="clearfix"><?php echo CHtml::linkButton('Nuevo',array('submit'=>array('createNews'),'class'=>'button')); ?></div>
<br/>
<div class="col50">
<?php echo CHtml::form('admin.php?r=news','get'); ?>
Categor&iacute;a:<br/>
<?php echo CHtml::dropDownList('cat',
    isset($_GET['cat'])?(int)$_GET['cat']:0,
    ACMS::getCategorias(),
    array('empty'=>'Todas las categorias', 'submit'=>'')); ?>
<?php echo CHtml::endForm(); ?>
<br/>
</div>

<TABLE width="100%" class="listado" >
    <THEAD>
         <tr>
             <th width="24" class="center">id</th>
            <th style="text-align: left;">Titulo</th>
            <th width="100" >Autor</th>
            <th width="150">Categorias</th>
            <th width="44"><span class="comments_ico">comments</span></th>
            <th width="80" >Fecha</th>
            <th width="50">Visits</th>
          </tr>
    </THEAD>
    <TBODY class="contenido_tabla">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewNews',
)); ?>
    </TBODY>
</TABLE>