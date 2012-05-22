<!-- EN PORTADA -->
<div class="titular2">
        <span>En</span>portada
</div>

<div class="clearfix noticias">
    <div class="anterior" style="display:inline; float:left;">
            <a id="btn_retrocede" style="display:none" onclick="bloqueNoticias.retrocedepaso(); return false;" href="#">anterior</a>
    </div>

    <div class="pasos">

    <ol id="pasos_01" style="padding-top:1px;">
<?php
//Recogemos el ultimo articulo con banner publicado en portada de esta categoria
$cond='type="news" and published=true and date <=NOW() ';


$categoria=ArticleCategory::model()->findByPk(9);
$categorias=ACMS::getChildCategories($categoria);

$categoria=ArticleCategory::model()->findByPk(11);
$categorias=$categorias+ACMS::getChildCategories($categoria);

/*$categoria=ArticleCategory::model()->findByPk(12);
$categorias=$categorias+ACMS::getChildCategories($categoria);*/

$categoria=ArticleCategory::model()->findByPk(8);
$categorias=$categorias+ACMS::getChildCategories($categoria);

$catCond=join(' or category=',$categorias);


$cond=$cond.' and (category='.$catCond.')';

            
            
$condition= new CDbCriteria();
$condition->condition=$cond;
$condition->order="home DESC, date DESC";
$condition->limit=9;
$articulos=Article::model()->findAll($condition);
foreach ($articulos as $data):
    $cat=$data->myCategory;
    $categorias=array();

    while( $cat ){
        array_push($categorias, $cat);

        if($cat->parent0){
            $cat=$cat->parent0;
        }else {
            break;
        }

    }

    //array_pop($categorias);
    $categorias=array_reverse($categorias);
?>
        <li>
            <div class="caja_contenido clearfix">
                    <img width="184" <?php echo ACMS::getHomeImageSrc($data)?> style="margin-bottom:12px;">
                    <div class="titulo_noticia">
                        <?php echo CHtml::link(CHtml::encode(ACMS::getTitle($data)), array('/site/page', 'id'=>$data->idArticle,'idm'=>7,'idCat'=>$data->myCategory->idArticleCategory)); ?>
                    </div>
                    <div class="resumen">
                        <?php 
                        //if(count($categorias)>0){
                        //    $parentCat=$categorias[0];
                        //    echo CHtml::encode(ACMS::getTitle($parentCat));
                        //}
                        if($data->myCategory->parent0)
                            echo CHtml::encode(ACMS::getTitle($data->myCategory->parent0));
                        ?>
                        <br>
                        <?php 
                            echo CHtml::encode(ACMS::getTitle($data->myCategory));
                        ?>
                    </div>
            </div>
        </li>
<?php 
endforeach;
?>
     </ol>

    </div>

    <div class="siguiente" style="display:inline; float:left;">
            <a id="btn_avanza" onclick="bloqueNoticias.avanzapaso(); return false;" href="#">siguiente</a>
    </div>
</div>

<script>
function diapositivas(btnA,btnR, npasos, tam, bloq)
{
        this.pasos=npasos;
        this.pasoactual=0;
        this.size=-tam;
        this.btnAvanza=btnA;
        this.btnRetrocede=btnR;
        this.bloque=bloq;

        //Iniciamos la altura del primer bloque
        var lis=$(this.bloque).children();
        $(this.bloque).parent().height($(lis[this.pasoactual]).height());

        this.iralpaso=function(){
                pos=this.pasoactual*this.size;
                var lis=$(this.bloque).children();

                $(this.bloque).parent().animate({
                        'height':($(lis[this.pasoactual]).height())
                });

                $(this.bloque).animate({
                                left:pos
                        }, 800, function(){
                                //OnComplete
                        });
        };

        this.retrocedepaso=function(){
                if(this.pasoactual>0)
                        this.pasoactual=this.pasoactual-1;

                if(this.pasoactual<=0)
                        $(this.btnRetrocede).hide();
                $(this.btnAvanza).show();
                this.iralpaso();
        };

        this.avanzapaso=function(){
                if(this.pasoactual<this.pasos)
                        this.pasoactual=this.pasoactual+1;
                if(this.pasoactual==this.pasos-1)
                        $(this.btnAvanza).hide();
                $(this.btnRetrocede).show();
                this.iralpaso();
        }
}
var bloqueCurr;
var bloqueNoticias;
$(document).ready(function() {
// put all your jQuery goodness in here.
bloqueNoticias=new diapositivas('#btn_avanza','#btn_retrocede', 3,555, '#pasos_01');
});



</script>