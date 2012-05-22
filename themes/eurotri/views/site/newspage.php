<?php
$this->pageTitle=Yii::app()->name . ' - '. ACMS::getTitle($model);
$this->layout='main';
$this->portlets[]=array('BannerViewer',array('section'=>2,'customClass'=>'banner_lateral','limit'=>1,'tags'=>$model->tags));
$this->portlets[]=array('BannerViewer',array('section'=>3,'customClass'=>'banner_lateral','limit'=>1,'tags'=>$model->tags));
$this->portlets[]=array('SportEventsWidget', array());
$this->portlets[]=array('SportEventsSearchWidget', array());
$this->portlets[]=array('MailChimp', array());
$this->portlets[]=array('Siguenos',array('urlTwitter'=>'@eurotri','urlFacebook'=>'http://www.facebook.com/pages/Eurotri/168637049863680'));
$this->portlets[]=array('FacebookBox',array());
?>


<div class="clearfix margincontent2">

<div class="titular_news">
	<div class="titular3">
		<?php echo ACMS::getBeautyDate($model);?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php echo ACMS::getTitle($model->myCategory); ?>&nbsp;&nbsp;|&nbsp;&nbsp;<span>Fuente: <?php if($model->fuente!= null && $model->fuente!=""){ echo $model->fuente;}else{echo "Eurotri";}?></span>
	</div> 
	
	<h1><?php echo ACMS::getTitle($model);?></h1>
</div>

    <div class="col_iz">
	
	<div class="content_news clearfix">
		
			<div class="news_iz">
			
			<div class="social_buttons2 clearfix">
				<div class="tweeter_like">
					<!-- Tweeter http://twitter.com/about/resources/tweetbutton-->
					<?php $this->widget('TwitterButton');?>
				</div>
			</div>
			<div class="social_buttons2 clearfix">
				<div class="facebook_like">
					<!-- facebook http://developers.facebook.com/docs/reference/plugins/like/-->
					<?php $this->widget('FacebookButton');?>
				</div>
			</div>
			
			<!-- NOTICIAS RELACIONADAS -->
                        <?php 
                        $this->widget('RelatedNews',array('noticia'=>$model));
                        ?>
			
			
                            
                            
                            
                         <!-- Ultimo articulo destacado    
			<div class="mininoti">
				<img src="images/mininoti1.png">
				<a href="#">Giant nos presenta su trinity</a>
				<span>Material técnico</span><br>
				<span>Bicicletas triatlón</span>
			</div>
			-->
                        
			</div>

		<div class="news_de">
		
        <?php echo ACMS::getText($model);?>
		
		</div>
	</div>
	
        
        
        
        
        
        
		
        
        
        <?php
        
            $this->widget("NoticiasBiCol");
        
            $this->widget("ArticulosEnPortada"); 
            ?>
        
        
        
    </div>


    <div class="col_home_banners">
        <?php 
             foreach($this->portlets as $i=>$dataPortlet){
                    $class=$dataPortlet[0];
                    $properties=$dataPortlet[1];
                    $this->widget($class,$properties); 
            } 
        ?>


    </div>	
</div>

