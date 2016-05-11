$(document).ready(function() {
    $("#edit").click(function() {
    	$.ajax({
    		type: "POST",
    		url: base_url + "admin/config/view_config",
    		cache: false,
    		datatype: 'json',
    		success: function(result) {
    			$("#e_evo_name").val(result[0]);
    			$("#e_evo_card_name").val(result[1]);
    		}
    	});
    	$('#modaledit').modal('show');
    });

    $("#b_edit").click(function() {
    	$.ajax({
    		type: "POST",
    		url: base_url + "admin/config/edit",
    		data: {evo_name:$("#e_evo_name").val(), evo_card_name:$("#e_evo_card_name").val()},
    		cache: false,
    		success: function(result) {
    			if(result === "true") {
    				$('#modaledit').modal('hide');
    				location.reload();
    			}
    		}
    	});
    });
});