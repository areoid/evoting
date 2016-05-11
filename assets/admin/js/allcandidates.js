function view(value) {
	
	$.ajax({
		type: "POST",
		url: base_url + "admin/candidates/view",
		data: {id:value},
		cache: false,
		datatype: 'json',
		success: function(result) {
			$("#v_name").html(result.name);
			$("#v_address").html(result.address);
			$("#v_date_of_birth").html(result.place + ", " + result.birth_day);
			$('#v_photo').attr('src', base_url + 'assets/admin/imagescandidates/' + result.path_foto);
			$('#v_achievement').html(result.achievement);
			$('#v_partai').html(result.partai);
			var a = result.biografi.replace(/\\r\\n|\\n|\\r/g, '<br />');
			$('#v_biography').html(a);
		}

	});

	$('#modalview').modal('show');
	
}

function edit(value) {
	
	$.ajax({
		type: "POST",
		url: base_url + "admin/candidates/view",
		data: {id:value},
		cache: false,
		datatype: 'json',
		success: function(result) {
			$("#e_id").val(result.id);
			$("#e_name").val(result.name);
			$("#e_address").val(result.address);
			$("#e_place").val(result.place);
			$("#e_date").val(result.birth_day);
			$('#imgcandidate').attr('src', base_url + 'assets/admin/imagescandidates/' + result.path_foto);
			$('#pathpic').val(result.path_foto);
			$('#e_achievement').val(result.achievement);
			$('#e_partai').val(result.partai);
			var a = result.biografi.replace(/\\r\\n|\\n|\\r/g, '\r\n');
			$('#e_biografi').val(a);
		}
	});

	$('#modaledit').modal('show');
	
}

function del(value) {
	
	$.ajax({
		type: "POST",
		url: base_url + "admin/candidates/view",
		data: {id:value},
		cache: false,
		datatype: 'json',
		success: function(result) {
			$("#d_name").html(result.name);
		}

	});

	$('#modaldelete').modal('show');
	
}

$(document).ready(function() {
	$('.alert').hide();

    $('#dataTables').DataTable({
        responsive: true
	});

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
    
    // button handling for delete
    $('#btndelete').click(function(){
    	$.ajax({
    		type: "POST",
    		url: base_url + "admin/candidates/del",
    		data: {name:$('#d_name').html()},
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

    // button handling reload when cancel edit
    $('#b_close').click(function(){
    	location.reload();
    });

    // button handling for edit
    $('#b_edit').click(function(){
    	
    	$.ajax({
    		type: "POST",
    		url: base_url + "admin/candidates/update_candidate",
    		data: {
    			id:$('#e_id').val(),
    			name:$('#e_name').val(),
    			address:$('#e_address').val(),
    			place:$('#e_place').val(),
    			date:$('#e_date').val(),
    			photo:$('#pathpic').val(),
    			partai:$('#e_partai').val(),
    			achievement:$('#e_achievement').val(),
    			biografi:$('#e_biografi').val()
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

});