$(document).ready(function(){

	// hide alert
	$('.alert').hide();

	$("#form-addregional").submit(function(){
		$.ajax({
			type: "POST",
			url: base_url + "admin/votes/submit_regional",
			data: $("#form-addregional").serialize(),
			cache: false,
			success: function(result) {
    			$('message').html('added ...');
    			$('#ale').fadeIn(1000).delay(2000).fadeOut(1000);
				setTimeout(function() {
					location.reload();
				}, 4000);
			}
		});
		return false;
	});
});
