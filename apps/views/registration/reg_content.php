<div id="maincamreg">
	<div id="container">
	    <video autoplay="true" id="videoElement">
	     
	    </video>
	</div>

	<canvas id="canvas" width="500" height="375"></canvas>
	<br />
	<p align="center">
		<button id="activatecam" class="btn btn-success">Activate Camera</button>
		<button id="save" class="btn btn-primary">Start Scan</button>
		<!--<button id="test" class="btn btn-warning">Test</button>-->
	</p>
	<p align="center" id="hasil"></p>
	<img id="imgtag" src="" width="500" height="375" alt="capture" />
</div>
<div id="regsuccess">
	
</div>

<!-- Modal Failed -->
<div class="modal fade" id="modalresregis" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Registration Message</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-body">
						Message : <b id="resregis"></b>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="javascipt:location.reload();" >Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal PIN -->
<div class="modal fade" id="modalpin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Enter PIN</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-body">
						<div class="row">
							<div class="col-lg-2">
							
							</div>
							<div class="col-lg-8">
								<div id="keypadpin1" align="center">
									<img id="key1" src="../../assets/admin/imgpin/1.png">
									<img id="key2" src="../../assets/admin/imgpin/2.png">
									<img id="key3" src="../../assets/admin/imgpin/3.png">
									<img id="key4" src="../../assets/admin/imgpin/4.png">
									<img id="key5" src="../../assets/admin/imgpin/5.png">
									<img id="key6" src="../../assets/admin/imgpin/6.png">
									<img id="key7" src="../../assets/admin/imgpin/7.png">
									<img id="key8" src="../../assets/admin/imgpin/8.png">
									<img id="key9" src="../../assets/admin/imgpin/9.png">
									<button id="keydel" type="button" class="btn btn-danger"><i class="fa fa-times fa-fw"></i></button>	
									<img id="key0" src="../../assets/admin/imgpin/0.png">
									<button id="keyok" type="button" class="btn btn-success"><i class="fa fa-check fa-fw"></i></button>	
								</div>
							</div>
							<div class="col-lg-2">
								
							</div>
						</div>
                    </div>
                </div>
                <div id="displaypin">
					<i><center id="respin"></center></i>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Core QR Code -->
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/grid.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/version.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/detector.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/formatinf.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/errorlevel.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/bitmat.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/datablock.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/bmparser.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/datamask.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/rsdecoder.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/gf256poly.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/gf256.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/decoder.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/qrcode.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/findpat.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/alignpat.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/qr-scan/databr.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>assets/registration/js/cam.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>assets/registration/js/reg.js"></script>
<script type="text/javascript">
	
$(document).ready(function(){
    $("#canvas").hide();
    $("#imgtag").hide();

    $("#activatecam").click(function() {
        location.reload();
    });

    $('#test').click(function() {
    	$('#modalpin').modal('show');
    });
});

</script>