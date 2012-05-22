<?php
Yii::import('zii.widgets.CPortlet');
		
class AnalyticsReportWidget extends CPortlet
{
    public $title='Analytics Report';
 
    protected function renderContent()
    {
	 	$idDiv=rand(0,1000);

	 	if(ACMS::getAnalyticsUser()=='' || ACMS::getAnalyticsId()=='')
	 	{
	 		echo "<p>No ha configurado todav&iacute;a su cuenta de Analytics de Google para poder acceder a sus datos. Puede configurarlo desde el men&uacute; Preferencias.</p>";
	 	}else{
		 	
			?>
<div id="my_chart_<?php echo $idDiv;?>"></div>
<script type="text/javascript">
swfobject.embedSWF("utils/open-flash-chart.swf", "my_chart_<?php echo $idDiv;?>", "100%", "300", "9.0.0", "expressInstall.swf", {"data-file":"admin.php?r=analyticsReport/reportDays"});
</script>
<p>Puedes ver las estad&iacute;sticas m&aacute;s detalladas y extraer informes detallados desde su cuenta de google.</p>
<?php 
	 	}
    }
}

?>