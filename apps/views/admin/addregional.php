<div class="row">
	<div class="col-lg-12">
		<div id="ale" class="alert alert-success alert-dismissible" role="alert">
            <strong>INFO : </strong> New regional has been <message></message> 
        </div>
		<div class="panel panel-primary">
			<div class="panel-heading">
		    	<h3 class="panel-title">Form Add Regional</h3>
		  	</div>
			<div class="panel-body">
				<form id="form-addregional">
					<div class="form-group">
				    	<label for="nama">Regional Name</label>
				    	<input type="text" class="form-control" name="regionalname" placeholder="East Java" autocomplete="off" >
				  	</div>
				  	<div class="form-group">
				    	<label for="address">Description</label>
				    	<input type="text" class="form-control" name="description" placeholder="East Java is the name of Indonesia Province" autocomplete="off" >
				  	</div>
				  	<button id="btn" type="submit" class="btn btn-primary">Add Candidate</button>
				</form>
			</div>
		</div>
	</div>
</div>
	<!-- Addregional JavaScript -->
    <script src="<?php echo Redirect::base_url(); ?>assets/admin/js/addregional.js"></script> 