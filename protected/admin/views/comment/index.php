<h1><div class="icon32_agenda"></div>Cometarios.</h1>
<?php 
if(isset($message)){
	echo "<span style='display:none' id='messageOk'>$message</span>";
?>
<script>
$(document).ready(function(){
        $('#messageOk').delay(200).slideDown(300).delay(5000).slideUp(200);
        });
</script>
<?php }?>   
        
        
<TABLE width="100%" class="listado" >
    <THEAD>
         <tr>
             <th width="24" class="">Autor</th>
            <th style="text-align: left;">Comentario</th>
            <th>Articulo</th>
          </tr>
    </THEAD>
    <TBODY class="contenido_tabla">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
    </TBODY>
</TABLE>

<script>
$(document).ready(function() {
    $(".commentrow").hover(
    function(){
        $(this).find(".rowActions").css('visibility','visible');
    },
    function(){
        $(this).find(".rowActions").css('visibility','hidden');
    });
    
    
    
    $('a.delete').live('click',function(ev) {
        ev.preventDefault();
	if(!confirm('Seguro de eliminar el comentario')) return false;
        var $form=$('<form action="'+$(this).attr('href')+'" method="post"></form').appendTo('body');
        $form.submit();
        return false;
	});
        
     $('a.reply').click(function(ev) {
            ev.preventDefault();
            $(this).parent().parent().find(".respond").show();
            return false;
	});
    
});
</script>