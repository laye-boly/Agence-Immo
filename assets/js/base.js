$(function(){
	$("#menu-symbol").click(function(){
		
		$("#menu-wrapper").toggle();
		if($("#carousel_immobilier_index").css("display") == "block"){
			$("#carousel_immobilier_index").hide();
		}else{
			$("#carousel_immobilier_index").show();
		}
		
	});

	$("#show-menu-immobilier").click(function(){
		
		$("#menu-immobilier").toggle();

		if($("#menu-immobilier").css("display") == "block"){
			$("#show-menu-immobilier").attr("class", "glyphicon glyphicon-minus-sign");
		}else{
			$("#show-menu-immobilier").attr("class", "glyphicon glyphicon-plus-sign");
		}

	
	});

	$("#show-menu-solaire").click(function(){
		
		$("#menu-solaire").toggle();

		if($("#menu-solaire").css("display") == "block"){
			$("#show-menu-solaire").attr("class", "glyphicon glyphicon-minus-sign");
		}else{
			$("#show-menu-solaire").attr("class", "glyphicon glyphicon-plus-sign");
		}

	
    });
});   