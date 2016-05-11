<div class="row">
	<div id="ale" class="alert alert-success alert-dismissible" role="alert">
		<strong>INFO : </strong> New candidate has been added 
	</div>
	<div class="col-lg-8">
		<div class="panel panel-primary">
			<div class="panel-heading">
		    	<h3 class="panel-title">Form Add Candidates</h3>
		  	</div>
			<div class="panel-body">
				<form id="form-addcandidates">
					<div class="form-group">
				    	<label for="nama">Name</label>
				    	<input type="text" class="form-control" name="name" placeholder="Patrick Wilson" autocomplete="off" >
				  	</div>
				  	<div class="form-group">
				    	<label for="address">Address</label>
				    	<input type="text" class="form-control" name="address" placeholder="Los Angeles 1156 High Street, CA 99281" autocomplete="off" >
				  	</div>
				  	<div class="form-group">
				  		<label for="Date-of-birth">Date of Birth ( place - mm/dd/yyyy )</label>
				  		<div class="row">
							<div class="col-lg-5">
								<label for="Date-of-birth">Place</label>
				    			<input type="text" class="form-control" name="place" placeholder="Santa Cruz" autocomplete="off">
							</div>
							<div class="col-lg-7">
								<label for="Date-of-birth">YYYY-MM-DD</label>
				    			<input type="text" class="form-control" name="date" placeholder="1990-02-02" autocomplete="off">
							</div>
				  		</div>
				  	</div>
				  	<div class="form-group">
				  		<label for="images">Picture : <span id="picstatus" class="label label-danger">Picture not found</span></label>
				    	<input id="pathpic" type="hidden" class="form-control" name="pathpic" placeholder="Los Angeles 1156 High Street, CA 99281" autocomplete="off" >
				  	</div>
				  	<div class="form-group">
				  		<label for="prestation">Prestation :</label>
				    	<input id="prestation" type="text" class="form-control" name="prestation" placeholder="The Champion" autocomplete="off" >
				  	</div>
				  	<div class="form-group">
				  		<label for="biografi">Biografi Candidate</label>
				    	<textarea id="biografi" class="form-control" name="biografi" placeholder="..." autocomplete="off" ></textarea>
				  	</div>
				  	<div class="form-group">
				  		<label for="partai">Partai :</label>
				    	<input id="partai" type="text" class="form-control" name="partai" placeholder="Partai" autocomplete="off" >
				  	</div>
				  	<button id="btn" type="submit" class="btn btn-primary">Add Candidate</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-lg-4">
		<div class="panel panel-primary">
			<div class="panel-heading">
		    	<h3 class="panel-title">Upload Picture</h3>
		  	</div>
		  	<div class="panel-body">
			
				<div id="error"></div>

				<div class="row">
					<div class="col-lg-1"></div>
					
					<div class="col-lg-10">
						<div id="uploadBox" class="thumbnail">
							<h4>Drag and drop here ! </h4>
							<img id="imgcandidate" src="<?php echo Redirect::base_url(); ?>assets/admin/imagescandidates/photo_not_available.png">
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

	<!-- Addcandidates JavaScript -->
    <script src="<?php echo Redirect::base_url(); ?>assets/admin/js/uploadcan.js"></script>
    <script src="<?php echo Redirect::base_url(); ?>assets/admin/js/addcandidates.js"></script>
    

 