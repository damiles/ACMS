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
		$("#imgBanner_"+imgt).fadeOut(Artres.bannerTransitions.tiempo,function(){ Artres.bannerTransitions.cambia();});
		$(".linkBanner").removeClass('active');
	},
	cambia: function(){
		Artres.bannerTransitions.bannerActual++;
		var imgt=Artres.bannerTransitions.bannerActual%Artres.bannerTransitions.numBanners;
    		$("#imgBanner_"+imgt).fadeIn(Artres.bannerTransitions.tiempo, function(){ Artres.bannerTransitions.quita();});
		$('#linkBanner_'+imgt).addClass('active');
	}
}

$(document).ready(function() {
	// put all your jQuery goodness in here.
	Artres.bannerTransitions.quita();
});

