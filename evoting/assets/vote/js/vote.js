var pin = "Ex: 4 digits";

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
		$.ajax({
			type: "POST",
			url: base_url + "vote/home/result",
			data: {qr:dataqr, pin:pin, id:$('#id_candidate').val()},
			cache: false,
			success: function(result) {
				$('#modalpin').modal('hide');
				$('#resvote').html(result);
				$('#modalresvote').modal('show');
			}
		});
	}
	else {
		alert('Please complete the PIN');
	}
}

/*
*	Action after scan
*/
function afterscan(value) {
	$('#resvote').html(value);
	if($('#resvote').html() === "Vote Ready") {
		$('#modalpin').modal('show');
	} 
	else {
		$('#modalresvote').modal('show');
	}
	
	// stop cam recording
	$("#maincamvote").remove();
}

/*
*	Checking data QR Code
*/
function checkqr(value) {

	$.ajax({
		type: "POST",
		url: base_url + "vote/home/scanqr",
		data: {qr:value},
		cahce: false,
		success: function(result) {
			afterscan(result);
			return false;
		}
	});

}

/*
*	Tap candidate
*/
function vote(value){
	$("#btnvote"+value).trigger('click');
}

$(function() {
	$("#canvas").hide();
    $("#imgtag").hide();

    $("#kompre").hide();

    
    $('form').hide();

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
});