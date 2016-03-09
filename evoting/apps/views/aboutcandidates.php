<!DOCTYPE HTML>
<html>
<head>
    <!-- Javascript core  -->
    <script type="text/javascript" src="<?php echo Redirect::base_url(); ?>assets/js/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo Redirect::base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Javascript core  -->
    <script type="text/javascript" src="<?php echo Redirect::base_url(); ?>assets/js/bootstrap.min.js"></script>
</head>
<body>
<script type="text/javascript">
	var base_url = "<?php echo Redirect::base_url(); ?>";
	$(document).ready(function() {
		$("form").hide();
		//$("#modalshow").hide();
	})

	function view(value) {
		$.getJSON(base_url+'home/view/'+value, function(json){
			$("#name").html(json.name);
			$("#address").html(json.address);
			$("#place").html(json.place);
			$("#date").html(json.birth_day);
			$("#partai").html(json.partai);
			$("#achievement").html(json.achievement);
			var a = json.biografi.replace(/\\r\\n|\\n|\\r/g, '<br />');
			$("#biografi").html(a);
			$("#showimg").attr('src', base_url+'assets/admin/imagescandidates/'+json.path_foto);
		});
		$("#modalshow").modal("show");
	}
</script>
	<div class="container">
		<h3 align="center">About Candidates</h3>
		<div class="row">
				<?php foreach ($_data['aboutcan']->results() as $res) : ?>
				<div class="col-md-3">
					<div onclick="view(<?php echo $res->id_candidate; ?>)" class="panel panel-primary">
						<div class="panel-body">
							<a href="#" class="thumbnail">
								<img class="img-rounded" src="<?php echo Redirect::base_url(); ?>assets/admin/imagescandidates/<?php echo $res->path_foto; ?>">
							</a>
						</div>
						<div class="panel-footer" align="center">
							<b><?php echo $res->name; ?></b>
						</div>
					</div>
					<form method="POST" action="<?php echo Redirect::base_url(); ?>vote/home/choose">
						<input id="kompre" type="text" name="val" value="<?php echo $res->id_candidate; ?>">
						<button id="btnvote<?php echo $res->id_candidate; ?>" type="submit">Test</button>
					</form>
				</div>
				<?php endforeach; ?>
		</div>
	</div>
<div class="modal fade" id="modalshow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit detail candidate</h4>
            </div>
            <div class="modal-body">
              <table class="table">
              	<tr>
					<td>
						<center><img id="showimg" class="img-rounded" src=""></center>
					</td>
              	</tr>
              	<tr>
					<td>
						<b>Name :</b> <z id="name"></z>
					</td>
              	</tr>
              	<tr>
					<td>
						<b>Address :</b> <z id="address"></z>
					</td>
              	</tr>
              	<tr>
					<td>
						<b>Date of Birth :</b> <z id="place"></z>, <z id="date"></z>
					</td>
              	</tr>
              	<tr>
					<td>
						<b>Polical party :</b> <z id="partai"></z>
					</td>
              	</tr>
              	<tr>
					<td>
						<b>Achievement	:</b> <z id="achievement"></z>
					</td>
              	</tr>
              	<tr>
					<td>
						<b>Biography :</b> <br/>
						<br/>
						<p id="biografi"></p> 
					</td>
              	</tr>	
			  </table>
			</div>
		</div>
	</div>
</div>
</body>
</html>