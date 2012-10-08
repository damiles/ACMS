function diapositivas(btnA,btnR, npasos, tam, bloq, num)
{
	this.pasos=npasos;
	this.pasoactual=0;
	this.size=-tam;
	this.btnAvanza=btnA;
	this.btnRetrocede=btnR;
	this.bloque=bloq;
	this.numeracion= num;
	
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
		
		$(this.bloque).parent().animate({
			'height':($(lis[this.pasoactual]).height())
		});
		
		$(this.bloque).animate({
				left:pos
			}, 400, function(){
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
		
	};
	this.saltaA=function( p ){
		this.pasoactual=p; 
		if(p==0)
			$(this.btnRetrocede).fadeTo(0, 0.3);
		if(this.pasoactual==this.pasos-1)
			$(this.btnAvanza).fadeTo(0, 0.3);
			
		this.iralpaso();
	}
	this.retrocedepaso=function(){
		if(this.pasoactual>0)
			this.pasoactual=this.pasoactual-1;
		
		if(this.pasoactual<=0)
			$(this.btnRetrocede).fadeTo(0, 0.3);
		$(this.btnAvanza).fadeTo(0, 1);
		this.iralpaso();
	};
	
	this.avanzapaso=function(){
		if(this.pasoactual<this.pasos-1)
			this.pasoactual=this.pasoactual+1;
		if(this.pasoactual==this.pasos-1)
			$(this.btnAvanza).fadeTo(0, 0.3);
		$(this.btnRetrocede).fadeTo(0, 1);
		this.iralpaso();
	}
}
