<html>
</head>
	<title>Create Card</title>
<script src="<?php echo Redirect::base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
	var base_url = "<?php echo Redirect::base_url(); ?>";
	var value = "<?php echo $_data['id']; ?>"
	var namecard;
	$.ajax({
		url: base_url + "admin/votes/card_name",
		cache: false,
		success: function(result) {
			$("#card_name").html(result);
		}
	});
	$.ajax({
		type: "POST",
		url: base_url + "admin/votes/view_voter",
		data: {id:value},
		cache: false,
		datatype: 'json',
		success: function(result) {
			namecard = result.name;
			$('#qr_name').html(result.name);
			$('#qr_qrcode').attr('src', base_url + 'assets/admin/imagesqr/' + result.name + '.png');
		}
	}).done(function(){

	    html2canvas([document.getElementById('frame')], {
    onrendered: function (canvas) {
    document.getElementById('canvas').appendChild(canvas);
    var data = canvas.toDataURL('image/png');
     //display 64bit imag
     var image = new Image();
    image.src = data;
    document.getElementById('image').appendChild(image);
    // AJAX call to send `data` to a PHP file that creates an PNG image from the dataURI string and saves it to a directory on the server

    var file= dataURLtoBlob(data);

// Create new form data
var fd = new FormData();
fd.append("uploadedFile[]", file);

	var imgname = namecard+".png";

$.ajax({
   url: base_url + "admin/votes/card_save",
   type: "POST",
   data: fd,
   processData: false,
   contentType: false,
   cache: false,
   success: function(result) {
		if( result === "true" ) {
			$.ajax({
				type: "POST",
				url: base_url + "admin/votes/card_rename",
				cache: false,
				data: {nm:imgname},
				success: function ( result ) {
					alert(result);
				}
			});
		}
		else {
			return false;
		}
   }
}).done(function(respond){

    window.close();
    });

  }
});

	});

</script>
</head>
<style>
#mydiv {
    width: 530px;
    height: 260px
}
#frame {
	padding :10px;
	width: 520px;
	height: 250px;
}

#inline {
	padding: 10px;
	width: 500px;
	height: 210px;
	border: 2px solid;
	border-radius: 3px;
}

#boxqr {
	float: left;
	width: 200px;
	height: 200px;
	background-color: #FFF;
}

#descqr {
	float: right;
	width: 270px;
	height: 200px;
	background-color: #FFF;
}
</style>
<body>
Creating EVO Card...
<div id="mydiv" >
	<div id="frame">
	    <div id="inline">
	        <div id="boxqr">
	            <img id="qr_qrcode" src="" width="100%">
	        </div>
	        <div id="descqr">
	            <h4 align="center">
	                <b>EVO CARD</b>
	            </h4>
	            <h5 align="center">
	                <b id="card_name"></b>
	            </h5>
					<p id="qr_name"></p>
	        </div>
	    </div>
    </div>
</div>
<div id="canvas">
<p>Canvas:</p>
</div>

 <div style="width:200px; float:left" id="image">
 <p style="float:left">Image: </p>
 </div>
 <div style="float:left;margin-top: 120px;" class="return-data">
 </div>
<script src="<?php echo Redirect::base_url(); ?>apps/libs/html2canvas/html2canvas.js"></script>  
<script language="javascript">


function dataURLtoBlob(dataURL) {
	// Decode the dataURL    
	var binary = atob(dataURL.split(',')[1]);
	// Create 8-bit unsigned array
	var array = [];
	for(var i = 0; i < binary.length; i++) {
		array.push(binary.charCodeAt(i));
	 }
	// Return our Blob object
	return new Blob([new Uint8Array(array)], {type: 'image/png'});
}

</script>