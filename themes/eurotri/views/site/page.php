<?php
$this->pageTitle=Yii::app()->name . ' - '. ACMS::getTitle($model);
$this->layout='column2';
$this->portlets[]=array('BannerViewer',array('section'=>2,'customClass'=>'banner_lateral','limit'=>1,'tags'=>$model->tags));
$this->portlets[]=array('BannerViewer',array('section'=>3,'customClass'=>'banner_lateral','limit'=>1,'tags'=>$model->tags));
$this->portlets[]=array('SportEventsWidget', array());
$this->portlets[]=array('SportEventsSearchWidget', array());
$this->portlets[]=array('MailChimp', array());
$this->portlets[]=array('Siguenos',array('urlTwitter'=>'@eurotri','urlFacebook'=>'http://www.facebook.com/pages/Eurotri/168637049863680'));
$this->portlets[]=array('FacebookBox',array());
?>






<div class="articulo">
<?php if($model->myCategory): ?>		
<div class="submenu clearfix">
	<ul>
		<li><a href="#" class="on"><?php echo ACMS::getTitle($model->myCategory->parent0); ?></a></li>
		<li><a href="#"><?php echo ACMS::getTitle($model->myCategory); ?> </a></li>
	</ul>
</div>
<?php endif; ?>

<h1><?php echo ACMS::getTitle($model);?></h1><br><br>




<?php echo ACMS::getText($model);?>

</div>
<!--
<div class="paginacion clearfix">
    <ul><li><a href="#">Ver articulo completo</a></li></ul>
</div>
-->
<?php if($model->bibliografia || $model->bibliografia!=''): ?>
<div class="bibliografia">
    <strong>Bibliografia</strong><br/>
    <?php echo $model->bibliografia;?>
</div>
<?php endif; ?>

<!-- Social -->
<div class="social_buttons clearfix">
        <div class="tweeter_like">
              <!-- Tweeter http://twitter.com/about/resources/tweetbutton-->
              <?php $this->widget('TwitterButton');?>
        </div>
        <div class="facebook_like">
            <!-- facebook http://developers.facebook.com/docs/reference/plugins/like/-->
            <?php $this->widget('FacebookButton');?>
        </div>
</div>


<!-- TAGS -->
<div class="tags clearfix">
    <span class="tags_ico">Tags:</span>
    <ul>
        <?php
        foreach($model->tags as $tag){
            echo "<li>";
            echo CHtml::link($tag->tag, array("news","idTag"=>$tag->idTag,'idCat'=>$_GET['idCat'],'idm'=>$_GET['idm']));
            echo "</li>";
        }
        ?>
    </ul>	
</div>









<?php
if(isset($_GET['idCat']))
    if($_GET['idCat']=='12' || $_GET['idCat']=='18' || $_GET['idCat']=='19' || $_GET['idCat']=='20' || $_GET['idCat']=='21')
        $this->widget("MultimediaEnPortada"); 

$this->widget("ArticulosEnPortada"); 
?>
