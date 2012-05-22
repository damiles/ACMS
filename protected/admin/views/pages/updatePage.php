<?php
?>
<div id="mainContent">
<h1><div class="icon32_page"></div>Editar P&aacute;gina "<?php echo ACMS::getTitle($model,ACMS::getDefaultLang()->idLang); ?>"</h1>

<?php echo $this->renderPartial('_formPage', array('model'=>$model)); ?>
</div>