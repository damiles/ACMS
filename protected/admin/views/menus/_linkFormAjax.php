<?php 
	if($model->type==0){
		echo CHtml::activeDropDownList($model,'link',array( 'index'=>'Página principal', "page"=>'Pagina',"news"=>'Listado de noticias','agenda'=>'Agenda','contact'=>'Formulario contacto', 'video'=>'Galeria de videos','documents'=>'Documentos', 'login'=>'Acceso', 'logout'=>'Desconectarse'),array('ajax'=>array(
		'type'=>'POST',
		'url'=>CController::createUrl('menus/pagesForm'),
		'update'=>'#listadoPaginas',
		'beforeSend' => 'function(){
			$("#listadoPaginas").html("Loading");
          }',)));
	    echo "<span id='listadoPaginas' style='margin-left:20px;'> ";
	    $this->renderPartial('_pageFormAjax', array('model'=>$model));
	    echo "</span>";
	}else{
		echo CHtml::activeTextField($model,'link');
	}
	
 ?>
