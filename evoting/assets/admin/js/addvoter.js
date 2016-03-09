var pin = "Ex: 4 digits";
var pin1 = "";

/*
*	For remove tail of pin
*/
function removepin() {
	if(pin == "Ex: 4 digits") {
		$('#respin').html('');
		pin = "";
	}
	if($('#respin').html() === "" || pin === "") {
		return false;
	}
	if(pin.length)
	pin = pin.slice(0, -1);
	hidepin();
}

/*
*	func for insert PIN when the button was tap/click
*/
function inputpin(x) {
	if(pin.length === 4) {
		alert('You have insert PIN');
		return false;
	}
	if(pin == "Ex: 4 digits") {
		$('#respin').html('');
		pin = "" + x;
		hidepin();
		return false;
	}
	pin = pin.concat(x);
	hidepin();
}

/*
*	For change the pin into ' * ' chars
*/
function hidepin() {
	$('#respin').html('');
	for(var i=0; i<pin.length; i++){
		$('#respin').append(' * ');
	}
}

function checkrespin() {
	if(pin.length === 4) {
		if(pin1 === "") {
			alert('Please Re-Enter PIN');
			pin1 = pin;
			pin = "";
			$('#respin').html('Re-enter PIN');
			$('#myModalLabel').html('Re-Enter PIN');

		}
		else {
			if(pin1 === pin) {
				$('#inpin').val($('#respin').html());
				$('#hiddenpin').val(pin);
				$('#modalpin').modal('hide');
				$('#respin').val('Enter PIN');
				pin1 = "";
				pin = "";
			}
			else {
				alert('PIN False, please try again');
				$('#respin').val('Enter PIN');
				pin1 = "";
				pin = "";
				return false;
			}	
		}
	}
	else {
		alert('Please complete the PIN');
	}
}

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

$(window).load(function() {
	/*
	*	Hide ale
	*/
	$('#ale').hide();
});

$(document).ready(function(){

	/*
	*	show modal panel PIN
	*/
	$('#inpin').focusin(function() {
		$('#modalpin').modal('show');
	});
	$('#respin').html(pin);

	/*
	*	Keypad function
	*/
	$('#key1').click(function(){ inputpin(1); });
	$('#key2').click(function(){ inputpin(2); });
	$('#key3').click(function(){ inputpin(3); });
	$('#key4').click(function(){ inputpin(4); });
	$('#key5').click(function(){ inputpin(5); });
	$('#key6').click(function(){ inputpin(6); });
	$('#key7').click(function(){ inputpin(7); });
	$('#key8').click(function(){ inputpin(8); });
	$('#key9').click(function(){ inputpin(9); });
	$('#key0').click(function(){ inputpin(0); });
	$('#keyok').click(function(){ checkrespin(); });
	$('#keydel').click(function(){ removepin(); });

	/*
	*	fetch list of regional
	*/
	$('#fetchreg').load(base_url + 'admin/votes/fetch_reg');

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
	*	When form addvoter submited
	*/
	$("#form-addvoter").submit(function(){
		if($('#picstatus').html() == "Picture not found") {
			alert('Please upload the picture');
			return false;
		}
		$.ajax({
			type: "POST",
			url: base_url + "admin/votes/submit_voter",
			data: $("#form-addvoter").serialize(),
			cache: false,
			success: function(result) {
				if(!isNaN(result)) {
					$('#ale').fadeIn(1000).delay(2000).fadeOut(1000);
					var win = window.open(base_url + 'admin/votes/card/' + result, '_target');
					location.reload();
					if(win){
					    //Browser has allowed it to be opened
					    win.focus();
					}else{
					    //Broswer has blocked it
					    alert('Please allow popups for this site');
					}
				}

				else {
					alert(result);
				}
			}
		});
		return false;
	});
});
