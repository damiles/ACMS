<?php
$this->layout='main_home';
//$this->portlets['UserMenu']=array();
$this->portlets[]=array('BannerViewer',array('section'=>2,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('BannerViewer',array('section'=>3,'customClass'=>'banner_lateral','limit'=>1));
$this->portlets[]=array('SportEventsWidget', array());
$this->portlets[]=array('SportEventsSearchWidget', array());
$this->portlets[]=array('MailChimp', array());
$this->portlets[]=array('Siguenos',array('urlTwitter'=>'@eurotri','urlFacebook'=>'http://www.facebook.com/pages/Eurotri/168637049863680'));
$this->portlets[]=array('FacebookBox',array());

        $cs=Yii::app()->clientScript;
        
        $cs->registerScript('ColSize',
        '    $(window).load(
                function() {
		    var altura=$("#col_home_1").height();
		    var a=680;
	            altura=a+Math.ceil((altura-a)/15)*15;
                    $("#col_home_2").height(altura);
                    $("#eventos_content").show();
                    $("#cierre_content_col2").show();
                }
                
            );
            var x1=0;
            var x2=0;
            var x3=0;
            var s=80;
            var w=0;
            var totalW=0;
            var t;
            function startAnimation(){
                x1--;
                x2--;
                x3--;
                if(x1<-w)
                    x1=$("#truco3").position().left+w+s;
                if(x2<-w)
                    x2=$("#truco1").position().left+w+s;
                if(x3<-w)
                    x3=$("#truco2").position().left+w+s;
                $("#truco1").css("left",x1+"px");
                $("#truco2").css("left",x2+"px");
                $("#truco3").css("left",x3+"px");
                t=setTimeout("startAnimation()",10);
            }
            $(function() {
                
                w=$("#truco1").width();
                totalW=980-$("#truco_cat").width();
                $("#wrapper_truco").css("width",totalW+"px");
                x1=0;
                x2=w+s;
                x3=x2+w+s;
                $("#truco1").css("left",x1+"px");
                $("#truco2").css("left",x2+"px");
                $("#truco3").css("left",x3+"px");
                startAnimation();
            });
            ',
        CClientScript::POS_HEAD);


?>
<style>
    .truco{
        
    }
    #truco_cat{
        font-weight:bold;
    }
    #wrapper_truco{overflow:hidden;float:left;width:500px;height:20px;margin-left:10px;}
    #content_truco{
        
        width:5000px;
        position:relative;
        height:20px;
    }
    .ltruco{
        position:absolute;
        font-weight:normal !important;
        text-transform:none !important;
    }
</style>
<div id="banner_principal">
	<?php $this->widget('BannerViewer', array('section'=>0, 'type'=>1, 'limit'=>4)); ?>
</div>


<div class="truco clearfix">
    <div id="truco_cat" style="float:left">
	<span>Truco de la semana:</span>
	<?php
			 $criterio=new CDbCriteria;
                        $criterio->condition=" published=1";
                        $criterio->limit="1";
                        $criterio->order="idTruco DESC";
                        $trucos=Truco::model()->findAll($criterio);
                        foreach ($trucos as $e):
                            echo ACMS::getTitle($e->categoria)."</div>";
                            echo "<div id='wrapper_truco'>";
                            echo "<div id='content_truco'>";
                            echo "<a class='ltruco' id='truco1' href='index.php?r=Truco&title=Trucos&idm=82&idSel=".$e->idTruco."'>".ACMS::getText($e)."</a>";
                            echo "<a class='ltruco' id='truco2' href='index.php?r=Truco&title=Trucos&idm=82&idSel=".$e->idTruco."'>".ACMS::getText($e)."</a>";
                            echo "<a class='ltruco' id='truco3' href='index.php?r=Truco&title=Trucos&idm=82&idSel=".$e->idTruco."'>".ACMS::getText($e)."</a>";
                            echo "</div></div>";
                        endforeach;
                        
	?>	
</div>

<div class="clearfix margincontent" >
	<div class="col_home_news clearfix">
		<div class="clearfix col_home_news_content">
			<div id="col_home_1" class="col_home_1">
				<?php
                                
                                $noticias=Article::model()->findAll('type="news" and published=true and date <=NOW() and (category=5 or category=6 or category=7 or category=8 or category=51) order by home desc, date desc limit 3');
				foreach($noticias as $i=>$item):
				?>
				<div class="news_home<?php echo ($i==2)?'last':''; ?>">
                                    <h3><?php echo CHtml::link(ACMS::getTitle($item), array('site/page', 'idm'=>7,'id'=>$item->idArticle, 'idCat'=>$item->myCategory->idArticleCategory, 'title'=>ACMS::getTitle($item)));?></h3>
					<div class="metadata"><?php echo ACMS::getBeautyDate($item); ?> | <?php echo ACMS::getTitle($item->myCategory);?></div>
                                        <div class="text"><p><?php echo ACMS::getMinimalText($item, 500);?>...</p></div>
                                        <?php 
                                        if($i<2){
                                            if(ACMS::getFirstTextImageSrc($item)!="src='upload/default.png'"){
                                                echo "<img ".ACMS::getFirstTextImageSrc($item)." width='423' />";  
                                            }
                                        }
                                        ?>
                                        
                                        
				</div>	
				<?php
				endforeach;	
				?>
			</div>
		<div id="col_home_2" class="col_home_2">
                    <div class="title"><h2>Actualidad</h2></div>
                    <div class="content_col2">
                        <ul class="linkList">
                            <?php
                                $noticias=Article::model()->findAll('type="news" and published=true and date <=NOW() and (category=5 or category=6 or category=7 or category=8 or category=51) order by home desc, date desc limit 3,6');
                                foreach($noticias as $i=>$item):
                            ?>
                            <li><?php echo CHtml::link(ACMS::getTitle($item), array('site/page', 'idm'=>7,'id'=>$item->idArticle, 'idCat'=>$item->myCategory->idArticleCategory, 'title'=>ACMS::getTitle($item)));?></li>
                            <?php
                                endforeach;
                            ?>
                        </ul>
                        <?php echo CHtml::link("<span>VER MÁS</span>",array('site/news','idCat'=>6,'idm'=>8,'title'=>'Actualidad_Nacional'), array('class'=>'ampliar2')); ?>
                        
                    </div>
                    <div class="title"><h2>Próximos eventos</h2></div>
                    <img src="<?php echo Yii::app()->theme->baseUrl;?>/images/proximos_eventos_<?php echo rand(1,2); ?>.jpg" style="margin-bottom:12px;">
                    <!-- EVENTOS -->
                    
                    <div id="eventos_content" style="display:none" class="content_col2">
                        
                        <?php
                        
                        
                        $criterio=new CDbCriteria;
                        $criterio->condition=" date > NOW()";
                        $criterio->limit="20";
                        $criterio->order="date ASC";
                        $eventos=SportEvent::model()->findAll($criterio);
                        $meses=ACMS::getMonthsLabel();
                        foreach ($eventos as $e):
                            $fecha=getDate(strtotime($e->date));
                            $province="";
                            if(isset($e->province)&& $e->province!=0)
                                    $province=$e->provincia->name;
                            echo "<span class='fecha_col2'>".$fecha['mday']." ".$meses[$fecha['mon']]."<span> | </span>".$province."</span>";
                            echo "<p>".ACMS::getTitle($e)."</p>";
                        endforeach;
                        ?>
                         
                    </div>
                     
                    <div id="cierre_content_col2" style="display:none; padding-left:0px;padding-bottom:0px;width:200px;" class="cierre_content_col2">
                        <?php echo CHtml::link("<span>VER MÁS</span>",array('SportsEvents/default/index','idm'=>29), array('class'=>'ampliar2','style'=>'margin-left:20px;')); ?>
			<a href="index.php?r=site/news&idCat=54&title=Consejos&idm=82"><img src="<?php echo Yii::app()->theme->baseUrl;?>/images/banner_protagonista.png" style="margin-top:10px;"></a>
                    </div>  
		    
		    
		</div>
		</div>
	
            
            
                <div class="clearfix seccion_noticias">
                    <div class="titular">
                        <h2>Artículos<span>triatlón</span></h2>
                        <a href="index.php?r=site/news&idCat=9&title=Artículos&idm=2" class="arrow right">Ver todos los artículos</a>
                    </div>
		

                    <div class="consejos clearfix">
                        <ul>
                            <?php

                            $cond='type="news" and published=true and date <=NOW()';
                            $with=array();
                            $join="";

                            $categoria=ArticleCategory::model()->findByPk(9);
                            $categorias=ACMS::getChildCategories($categoria);
                            $catCond=join(' or category=',$categorias);
                            $cond=$cond.' and (category='.$catCond.')';


                            $dataProvider=new CActiveDataProvider('Article', array(
                                                    'criteria'=>array(
                                                            'join'=>$join,
                                                            'with'=>$with,
                                                            'condition'=>$cond,
                                                            'order'=>'home desc, date DESC',
                                                            ),
                                                    'pagination'=>array(
                                                            'pageSize'=>6,
                                                            ),
                                                    ));

                            $this->widget('zii.widgets.CListView', array(
                                'dataProvider'=>$dataProvider,
                                'itemView'=>'article_view_home',
                                'template'=>'{items}',
                            )); ?>
                        </ul>
                    </div>
                </div>
                <div class="clearfix seccion_noticias" style="margin-top:10px;">
                    <div class="titular">
                        <h2>Multimedia<span>triatlón</span></h2>
                        <a href="index.php?r=site/news&idCat=12&title=Multimedia&idm=4" class="arrow right">Ver todos los artículos</a>
                    </div>
                    
                    <!-- Multimedia -->
                    <div class="consejos clearfix">
                        <ul>
                            <?php

                            $cond='type="news" and published=true and date <=NOW()';
                            $with=array();
                            $join="";

                            $categoria=ArticleCategory::model()->findByPk(12);
                            $categorias=ACMS::getChildCategories($categoria);
                            $catCond=join(' or category=',$categorias);
                            $cond=$cond.' and (category='.$catCond.')';


                            $dataProvider=new CActiveDataProvider('Article', array(
                                                    'criteria'=>array(
                                                            'join'=>$join,
                                                            'with'=>$with,
                                                            'condition'=>$cond,
                                                            'order'=>'home desc, date DESC',
                                                            ),
                                                    'pagination'=>array(
                                                            'pageSize'=>3,
                                                            ),
                                                    ));

                            $this->widget('zii.widgets.CListView', array(
                                'dataProvider'=>$dataProvider,
                                'itemView'=>'article_multimedia_view_home',
                                'template'=>'{items}',
                            )); ?>
                        </ul>
                    </div>
                    
                    
		</div>
            
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
