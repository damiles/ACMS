/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

(function($) {
    $.fn.ArtresImageCaption= function(){
        return $(this).each(function(){
            var imagen=$(this);
            if(imagen.attr("alt").length > 0){
                imagen.wrap("<div class='image_caption'></div>");
                imagen.parent().append("<div class='caption'>"+imagen.attr("alt")+"</div>");
            }
        })
    }
})(jQuery);


