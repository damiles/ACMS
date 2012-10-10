<?php
?>

<h1><div class="icon32_news"></div>Noticias</h1>
<div class="clearfix"><?php echo CHtml::linkButton('Crear nueva noticia',array('submit'=>array('createNews'),'class'=>'button buttonGreen')); ?></div>
<br/>
<div class="col50">
<?php echo CHtml::form('admin.php?r=news','get'); ?>
<!--Categor&iacute;a:<br/>--></br/>
<?php /*
	$cat=0;
	if(isset($_GET['Article'])){
		if(isset($_GET['Article']['category']))
			$cat=(int)$_GET['Article']['category'];
	}
		echo CHtml::dropDownList('Article[category]',
    		$cat,
    		ACMS::getCategorias(),
    		array('empty'=>'Todas las categorias', 'submit'=>'')); ?>
	

<?php echo CHtml::endForm(); */?>
<br/>
</div>

<!--<TABLE width="100%" class="listado" >
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
    <TBODY class="contenido_tabla">-->

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'id',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idArticle',
		//'title',
		array(
                    'name'=>'title',
                    'value'=>'$data->tituloContent->title',
                    'type'=>'text',
                    ),
		/*array(
                    'name'=>'categoryTitle',
                    'value'=>'(isset($data->myCategory))?$data->myCategory->defaultContent->title:"Sin categoria"',
                    'type'=>'text',
                    ),*/
		//'comments',
		'date',
		
		'hits',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
		),
	),
)); ?>




