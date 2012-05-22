<?php

?>

<h1><div class="icon32_banners"></div> Banners</h1>
<div style="margin-left:20px;">
<p>Selecciona la situación/categoría de banners a gestionar</p>
</div>
<div class="clearfix">
<?php
$bannersCat=ACMS::getBannersCategories();
foreach($bannersCat as $id=>$value)
{
				echo "<a href='admin.php?r=banner/bannerCat&idcat=$id' class='banner'>".$value."</a>";
}
?>
</div>

