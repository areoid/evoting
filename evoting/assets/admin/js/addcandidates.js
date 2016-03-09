$(document).ready(function(){

	/*
	*	Hover dnd
	*/
	$('#uploadBox').on('dragover', function(){
		$('#uploadBox').addClass('hover');
	});

	$('#uploadBox').on('dragleave', function(){
		$('#uploadBox').removeClass('hover');
	});

	$('#uploadBox').on('dragenter', function(){
		$('#uploadBox').removeClass('hover');
	});

	/*
	*	Hide ale
	*/
	$('#ale').hide();

	/*
	*	Submit form candidate
	*/
	$("#form-addcandidates").submit(function(){

		// checking picture
		if( $('#picstatus').html() === "Picture not found" ) {
			alert('Please upload picture of candidate !!');
			return false;
		}

		$.ajax({
			type: "POST",
			url: base_url + "admin/candidates/submit_candidates",
			data: $("#form-addcandidates").serialize(),
			cache: false,
			success: function(result) {
				if(result == "true") {
					$('#ale').fadeIn(1000).delay(2000).fadeOut(1000);
					setTimeout(function() {
						location.reload();
					}, 5000);
				
				}
				else {
					alert('Something when wrong !!');
				}
			}
		});
		return false;
	});
});

