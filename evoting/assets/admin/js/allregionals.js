function view(value) {

	$.ajax({
		type: "POST",
		url: base_url + "admin/votes/view_reg",
		data: {id:value},
		cache: false,
		datatype: 'json',
		success: function(result) {
			$('#v_regname').html(result.regname);
			$('#v_description').html(result.description);
		}
	});

	$('#modalview').modal('show');

}

function edit(value) {

	$.ajax({
		type: "POST",
		url: base_url + "admin/votes/view_reg",
		data: {id:value},
		cache: false,
		datatype: 'json',
		success: function(result) {
			$('#e_id').val(result.id);
			$('#e_regname').val(result.regname);
			$('#e_description').val(result.description);
		}
	});

	$('#modaledit').modal('show');

}

function del(value) {

	$.ajax({
		type: "POST",
		url: base_url + "admin/votes/view_reg",
		data: {id:value},
		cache: false,
		datatype: 'json',
		success: function(result) {
			$('#d_id').val(result.id);
			$('#d_regname').html(result.regname);
		}
	});

	$('#modaldelete').modal('show');

}


$(document).ready(function() {
    $('#dataTables').DataTable({
        responsive: true
    });

    /*
    *	hide alert
    */
    $('.alert').hide();

    /*
    *	Button handling for edit
    */
    $('#b_edit').click(function() {

    	$.ajax({
    		type: "POST",
    		url: base_url + "admin/votes/update_reg",
    		data: {
    			id:$('#e_id').val(),
    			regname:$('#e_regname').val(),
    			description:$('#e_description').val()
    		},
    		cache: false,
    		success: function(result) {
    			$('#modaledit').modal('hide');
    			$('message').html('updated ...');
    			$('#ale').fadeIn(1000).delay(2000).fadeOut(1000);
				setTimeout(function() {
					location.reload();
				}, 4000);
    		}
    	});

    });

    /*
    *	Button handling for edit
    */
    $('#b_delete').click(function() {

    	$.ajax({
    		type: "POST",
    		url: base_url + "admin/votes/delete_reg",
    		data: {id:$('#d_id').val()},
    		cache: false,
    		success: function(result) {
    			$('#modaldelete').modal('hide');
    			$('message').html('deleted ...');
    			$('#ale').fadeIn(1000).delay(2000).fadeOut(1000);
				setTimeout(function() {
					location.reload();
				}, 4000);
    		}
    	});

    });

});