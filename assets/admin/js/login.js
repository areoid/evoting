$(document).ready(function(){
	$("#form-login").submit(function(){
		
		$.ajax({
			type: "POST",
			data: $("#form-login").serialize(),
			url: base_url + "login/process",
			cache: false,
			success: function(result) {
				if(result === "true") {
					window.location.href = base_url + 'admin/home/index';
				} 
				else {
					alert("Login " +result);
				}
			}
		});
		
		return false;
	});
});
