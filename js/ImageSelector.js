$(document).ready(function(){
	$(".imageSelector").click(function(){
		window.open($(this).attr('href'),'ImageSelector','resizable=no,width=900,height=600');
		return false;	
	});
});
