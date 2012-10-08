 $(function() {
	$("input").each(function(index){
	    var defaultVal=$(this).val();
	    $(this).focusin(function(){
		if($(this).val()==defaultVal)
		    $(this).val("");
	    });
	    $(this).focusout(function(){
		if($(this).val()=="")
		    $(this).val(defaultVal);
	    });
	});

	$("textarea").each(function(index){
	    var defaultVal=$(this).val();
	    $(this).focusin(function(){
		if($(this).val()==defaultVal)
		    $(this).val("");
	    });
	    $(this).focusout(function(){
		if($(this).val()=="")
		    $(this).val(defaultVal);
	    });
	});
});
