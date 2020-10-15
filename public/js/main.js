$(document).ready(function(){
	$("#prd_name").keyup(function(){
		var name = $(this).val();
		// $("#message").html(prd_name);	
		$.post("./ajax/check_prd", {prd_name:name} ,function(data){
			$("#message").html(data);
		});
	});

});

$(document).ready(function(){
	$("#user_mail").keyup(function(){
		var name_mail = $(this).val();
		// $("#message").html(prd_name);	
		$.post("./ajax/check_user", {user_mail:name_mail} ,function(data){
			$("#message_user").html(data);
		});
	});
	
});