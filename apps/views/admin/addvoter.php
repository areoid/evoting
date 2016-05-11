<div class="row">
	<div id="ale" class="alert alert-success alert-dismissible" role="alert">
		<strong>INFO : </strong> New voter has been added 
	</div>
	<div class="col-lg-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
		    	<h3 class="panel-title">Form Add Voter</h3>
		  	</div>
			<div class="panel-body">
				<form id="form-addvoter">
					<div class="form-group">
				    	<label for="nama">Name</label>
				    	<input type="text" class="form-control" name="name" placeholder="John Williams" autocomplete="off" >
				  	</div>
				  	<div class="form-group">
				    	<label for="address">Address</label>
				    	<input type="text" class="form-control" name="address" placeholder="East Java is the name of Indonesia Province" autocomplete="off" >
				  	</div>
				  	<div class="form-group">
				    	<label for="address">Place, date of birth (yyyy-mm-dd)</label>
				    	<div class="row">
							<div class="col-lg-6">
								<input type="text" class="form-control" name="place" placeholder="Los Angles" autocomplete="off" >			
							</div>
							<div class="col-lg-6">
								<input type="text" class="form-control" name="date" placeholder="2001-02-03" autocomplete="off" >	
							</div>
				    	</div>
				  	</div>
				  	<div class="form-group">
				  		<div class="row">
							<div class="col-lg-6">
								<label for="address">Religion</label>
				    			<input type="text" class="form-control" name="religion" placeholder="Islamic" autocomplete="off" >
							</div>
							<div class="col-lg-6">
								<label for="id_regional">Regional</label>
				    			<select id="fetchreg" name="regional" class="form-control"></select>
							</div>
				  		</div>
				  	</div>
				  	<div class="form-group">
				  		<div class="row">
							<div class="col-lg-6">
								<label for="address">PIN-FINGER (4 digits)</label>
				    			<input id="inpin" type="text" class="form-control" maxlength="4" placeholder="1234" autocomplete="off">
				    			<input id="hiddenpin" name="pin" type="hidden" class="form-control" maxlength="4">
							</div>
							<div class="col-lg-6">
								<label for="images">Picture Voter : <span id="picstatus" class="label label-danger">Picture not found</span></label>
				    			<input id="pathpic" type="hidden" name="path_photo">
							</div>
				  		</div>
				  	</div>
				  	<button id="btn" type="submit" class="btn btn-primary">Add Voter</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Picture Voter</h3>
			</div>
			<div class="panel-body">
				<div id="error"></div>

				<div class="row">
					<div class="col-lg-1"></div>
					
					<div class="col-lg-10">
						<div id="uploadBox" class="thumbnail">
							<h4>Drag and drop here ! </h4>
							<img id="imgvoter" src="<?php echo Redirect::base_url(); ?>assets/admin/imagescandidates/photo_not_available.png">
						</div>
					</div>
					<div class="col-lg-1"></div>
				</div>

				<section id="uploadStatus">
					<div id="progressWrapper">
					<div id="progressBar"></div>
					<div id="progressValue">0%
				 	</div></div>
				</section>
			</div>
		</div>
	</div>
</div>
<!-- Modal Panel PIN -->
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

<!-- Modal Evo Card -->
<div class="modal fade" id="modalevocard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
<!--<div id="modalevocard">-->	
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Creating Evo Cards</h4>
            </div>
            <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-body">
						<div class="row" style="margin: auto; max-width: 520px;">
							<div class="col-lg-12">
								<img src="<?php echo Redirect::base_url(); ?>assets/images/loading.gif">
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
                                                <b>PEMILU KADES 2012</b>
                                            </h5>
											<p style="padding:10px;" id="qr_name">
											</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="canvas">
                                </div>
                                <div id="image">
                                </div>
							</div>
						</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

	<!-- Addregional JavaScript -->
    <script src="<?php echo Redirect::base_url(); ?>assets/admin/js/addvoter.js"></script> 
    <script src="<?php echo Redirect::base_url(); ?>assets/admin/js/uploadvot.js"></script>
    <script src="<?php echo Redirect::base_url(); ?>apps/libs/html2canvas/html2canvas.js"></script>  