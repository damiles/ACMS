function diapositivasFull(btnA,btnR, npasos, tam, bloq, num, textos)
{
	this.pasos=npasos;
	this.pasoactual=0;
	this.pasoAnterior=-1;
	this.size=-tam;
	this.btnAvanza=btnA;
	this.btnRetrocede=btnR;
	this.bloque=bloq;
	this.numeracion= num;
	this.isTextos=textos;
	
	//Iniciamos la altura del primer bloque
	var lis=$(this.bloque).children();
	$(this.bloque).parent().height($(lis[this.pasoactual]).height());
	
	//Iniciamos numeracion
	if(this.numeracion){
		if($(this.numeracion)){
			$(this.numeracion).html("<span>"+(this.pasoactual+1)+"</span> de "+this.pasos);	
		}	
	}
	
	this.iralpaso=function(){
		pos=this.pasoactual*this.size;
		var lis=$(this.bloque).children();
		/*
		$(this.bloque).parent().animate({
			'height':($(lis[this.pasoactual]).height())
		});*/
		
		$(this.bloque).animate({
				left:pos
			}, 2000,'easeOutCubic', function(){
				//OnComplete
			});
			
			
		//iluminamos la opcion
		$("."+this.bloque.substring(1)+"_link").removeClass('on');
		$(this.bloque+"_link"+this.pasoactual).addClass('on');
		
		if(this.numeracion){
			if($(this.numeracion)){
				$(this.numeracion).html("<span>"+(this.pasoactual+1)+"</span> de "+this.pasos);	
			}	
		}

		if(this.isTextos){
			if(this.pasoAnterior!=-1){
				$(this.bloque+"_texto_"+this.pasoAnterior).animate({
					left:-200,
					opacity:0,
				}, 400, function(){
					//OnComplete
				});
			}
			$(this.bloque+"_texto_"+this.pasoactual).css('left','200px');			
			$(this.bloque+"_texto_"+this.pasoactual).animate({
				left:0,
				opacity:1,
			}, 400, function(){
				//OnComplete
			});
		}
		
	};
	this.saltaA=function( p ){
		this.pasoAnterior=this.pasoactual;
		this.pasoactual=p; 
		if(p==0)
			$(this.btnRetrocede).fadeTo(0, 0.3);
		if(this.pasoactual==this.pasos-1)
			$(this.btnAvanza).fadeTo(0, 0.3);
			
		this.iralpaso();
	}
	this.retrocedepaso=function(){
		this.pasoAnterior=this.pasoactual;
		if(this.pasoactual>0)
			this.pasoactual=this.pasoactual-1;
		
		if(this.pasoactual<=0)
			$(this.btnRetrocede).fadeTo(0, 0.3);
		$(this.btnAvanza).fadeTo(0, 1);
		this.iralpaso();
	};
	
	this.avanzapaso=function(){
		this.pasoAnterior=this.pasoactual;
		if(this.pasoactual<this.pasos-1)
			this.pasoactual=this.pasoactual+1;
		if(this.pasoactual==this.pasos-1)
			$(this.btnAvanza).fadeTo(0, 0.3);
		$(this.btnRetrocede).fadeTo(0, 1);
		this.iralpaso();
	}
	

	this.updateSize=function() {
	  this.size=-$(document).width();
	  pos=this.pasoactual*this.size;
	  $(this.bloque).css('left',pos+"px");
	  $(this.bloque+" li").width($(document).width());	  
	  $(this.bloque+" li img").width($(document).width());
	}


}



