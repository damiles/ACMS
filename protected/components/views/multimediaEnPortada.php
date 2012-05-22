<!-- EN PORTADA -->
<div class="titular2">
        <span>Multimedia</span>triatlón
</div>

<div class="clearfix noticias">
    <div class="anterior" style="display:inline; float:left;">
            <a id="btn_retrocede_mult" style="display:none" onclick="bloqueMultimedia.retrocedepaso(); return false;" href="#">anterior</a>
    </div>

    <div class="pasos">

    <ol id="pasos_01_mult" style="padding-top:1px;">
<?php
//Recogemos el ultimo articulo con banner publicado en portada de esta categoria

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
                        <?php echo CHtml::link(CHtml::encode(ACMS::getTitle($data)), array('/site/page', 'id'=>$data->idArticle,'idm'=>4,'idCat'=>$data->myCategory->idArticleCategory)); ?>
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
            <a id="btn_avanza_mult" onclick="bloqueMultimedia.avanzapaso(); return false;" href="#">siguiente</a>
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
bloqueMultimedia=new diapositivas('#btn_avanza_mult','#btn_retrocede_mult', 3,555, '#pasos_01_mult');
});



</script>