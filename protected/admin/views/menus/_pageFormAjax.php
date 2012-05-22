<?php
if($model->link=="page")
		echo CHtml::activeDropDownList($model,'params',ACMS::listadoPaginas());
else if($model->link=="news")
		echo CHtml::activeDropDownList($model,'params',ACMS::listadoCategoriaNews());
else if($model->link=="video")
		echo CHtml::activeDropDownList($model,'params', ACMS::listadoPlaylists());
else if($model->link=="documents")
		echo CHtml::activeDropDownList($model,'params', ACMS::listadoDocumentsCategories());

	
