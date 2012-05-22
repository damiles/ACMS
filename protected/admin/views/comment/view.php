

<h1>View Comment #<?php echo $model->idComment; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idComment',
		'author',
		'email',
		'url',
		'ip',
		'date',
		'content',
		'approved',
		'karma',
		'Article_idArticle',
		'Lang_idLang',
		'parent',
		'agent',
	),
)); ?>
