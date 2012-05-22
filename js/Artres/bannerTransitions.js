if(typeof(Artres)=="undefined"){Artres={};}

Artres.bannerTransitions={
	numBanners:2,
	delaytime:6,
	tiempo:'slow',
	bannerActual:0,
	timer:0,
	quita: function(){
		Artres.bannerTransitions.timer=window.setTimeout('Artres.bannerTransitions.quita1()',Artres.bannerTransitions.delaytime*1000);
	},
	quita1: function(){
		var imgt=Artres.bannerTransitions.bannerActual%Artres.bannerTransitions.numBanners;
		$("#imgBanner_"+imgt).fadeOut(Artres.bannerTransitions.tiempo,function(){Artres.bannerTransitions.cambia();});
		$(".linkBanner").removeClass('active');
	},
	cambia: function(){
		Artres.bannerTransitions.bannerActual++;
		var imgt=Artres.bannerTransitions.bannerActual%Artres.bannerTransitions.numBanners;
    		$("#imgBanner_"+imgt).fadeIn(Artres.bannerTransitions.tiempo, function(){Artres.bannerTransitions.quita();});
		$('#linkBanner_'+imgt).addClass('active');
	},
        stopAndGo:function(id){
                clearTimeout(Artres.bannerTransitions.timer);
                $(".banner").stop(true);
                $(".linkBanner").removeClass('active');
                $('#linkBanner_'+id).addClass('active');
                $(".banner").hide();
                $("#imgBanner_"+id)
                $("#imgBanner_"+id).fadeTo(Artres.bannerTransitions.tiempo,1);
                Artres.bannerTransitions.bannerActual=id;
                Artres.bannerTransitions.timer=window.setTimeout('Artres.bannerTransitions.quita1()',10000);
        }
}

$(document).ready(function() {
	
        $(".linkBanner").click(function(){
            var id=$(this).attr("id");
            //linkBanner_
            id=id.substring(11);
            Artres.bannerTransitions.stopAndGo(id);
        });
        
        Artres.bannerTransitions.quita();
        
});

