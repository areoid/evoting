function view(value){

	$.ajax({
		type: "POST",
		url: base_url + "admin/votes/view_voter",
		data: {id:value},
		cache: false,
		datatype: 'json',
		success: function(result) {
			$('#v_name').html(result.name);
			$('#v_address').html(result.address);
			$('#v_data_of_birth').html(result.place + ", " + result.date);
			$('#v_religion').html(result.religion);
			$('#v_regname').html(result.regname);
			$('#v_photo').attr('src', base_url + 'assets/admin/imagesvoters/' + result.path_foto);
			$('#v_qrcode').attr('src', base_url + 'assets/admin/imagesqr/' + result.name + '.png');
		}
	});
	$('#modalview').modal('show');

}

function edit(value){
	
	$.ajax({
		type: "POST",
		url: base_url + "admin/votes/view_voter",
		data: {id:value},
		cache: false,
		success: function(result) {
			$('#e_name').val(result.name);
			$('#e_address').val(result.address);
			$('#e_place').val(result.place);
			$('#e_date').val(result.date);
			$('#e_religion').val(result.religion);
		    $('#e_regional').load(base_url + "admin/votes/fetch_reg", function(){
		    	$('select#e_regional').val(result.id_reg);
		    });
		    $('#e_id').val(result.id);
		    $('#imgvoter').attr('src', base_url + 'assets/admin/imagesvoters/' + result.path_foto);
			$('#pathpic').val(result.path_foto);
		}
	});

	$('#modaledit').modal('show');

}

function del(value){
	$.ajax({
		type: "POST",
		url: base_url + "admin/votes/view_voter",
		data: {id:value},
		cache: false,
		success: function(result) {
			$('#d_name').html(result.name);
			$('#d_id').val(result.id);
		}
	});
	$('#modaldelete').modal('show');

}

$(window).load(function() {
	/*
    *	Hide alert
    */
    $('#ale').hide();
})

$(document).ready(function() {
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

	/*
	*	Animation of slideUp or slideDown
	*/
	$("#showcard").hide();
    $("#btnshowcard").click(function(){
        if($("#btnshowcard").html() === '<i id="icbtnshow" class="fa fa-share fa-fw"></i>Show Evo Card') {
        	$("#btnshowcard").html('<i id="icbtnshow" class="fa fa-reply fa-fw"></i>Back');
        }
        else if($("#btnshowcard").html() === '<i id="icbtnshow" class="fa fa-reply fa-fw"></i>Back') {
        	$("#btnshowcard").html('<i id="icbtnshow" class="fa fa-share fa-fw"></i>Show Evo Card');	
        }
        $("#showphoto").slideToggle(function() {
            $("#showcard").slideToggle();
        });
    });

   	/*
	*	For handling button save changes (Edit)
	*/
	$('#b_edit').click(function(){
		$.ajax({
			type: "POST",
			url: base_url + "admin/votes/update_voter",
			data: {
				id:$('#e_id').val(),
				name:$('#e_name').val(),
				address:$('#e_address').val(),
				place:$('#e_place').val(),
				date:$('#e_date').val(),
				religion:$('#e_religion').val(),
				regional:$('#e_regional').val(),
				path_foto:$('#pathpic').val()
			},
			cache: false,
			success: function(result) {
				$('#modaledit').modal('hide');
    			$('message').html('updated ...');
    			$('#ale').fadeIn(1000).delay(2000).fadeOut(1000);
				setTimeout(function() {
					location.reload();
				}, 3000);
			}
		});
	});

	/*
    *	Button handling for edit
    */
    $('#b_delete').click(function() {

    	$.ajax({
    		type: "POST",
    		url: base_url + "admin/votes/delete_voter",
    		data: {id:$('#d_id').val()},
    		cache: false,
    		success: function(result) {
    			$('#modaldelete').modal('hide');
    			$('message').html('deleted ...');
    			$('#ale').fadeIn(1000).delay(2000).fadeOut(1000);
				setTimeout(function() {
					location.reload();
				}, 3500);
    		}
    	});

    });

});