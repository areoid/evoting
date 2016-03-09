var video = document.querySelector("#videoElement");

navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;
 
if (navigator.getUserMedia) {       
    navigator.getUserMedia({video: true}, handleVideo, videoError);
}
 
function handleVideo(stream) {
    video.src = window.URL.createObjectURL(stream);
}
 
function videoError(e) {
    // do something
}
var v,canvas,context,w,h;
var imgtag = document.getElementById('imgtag');
//var sel = document.getElementById('fileselect');

document.addEventListener('DOMContentLoaded', function(){
    v = document.getElementById('videoElement');
    canvas = document.getElementById('canvas');
    context = canvas.getContext('2d');
    w = canvas.width;
    h = canvas.height;

},false);

function draw(v,c,w,h) {
    if(v.paused || v.ended) return false;
    context.drawImage(v,0,0,w,h);
   
   var uri = canvas.toDataURL("image/png");
   
  // console.log(uri);
   
   imgtag.src = uri;
   decodeqr(uri);
   
}

function decodeqr(uri){
    qrcode.decode(uri);
    qrcode.callback = showInfo;
}

var dataqr;
function showInfo(data) {
    if(data == "error decoding QR Code") {
        data = "Scan Your Evo Card";
    }
    $("#hasil").html(data);
    if($("#hasil").html() === "Scan Your Evo Card") {
        return true;
    }
    else {
        dataqr = $("#hasil").html();
        checkqr(dataqr);
        return false;
    }
}

function klikterus(){
    draw(v,context,w,h);
    setTimeout(function() {
        //writeNumber.html(initMessage);
        klikterus();
    }, 1000);    
}

$(window).load(function(){
   $("#save").click(function(){
        //draw(v,context,w,h);
        klikterus();
   });
});

var fr;
/*
sel.addEventListener('change',function(e){
    var f = sel.files[0];
    
    fr = new FileReader();
    fr.onload = receivedText;
    fr.readAsDataURL(f);
})
*/

function receivedText() {        
    imgtag.src = fr.result;
}
