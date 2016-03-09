<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="EVO-cms is e-voting content management system">
    <meta name="author" content="Evo CMS">

    <title>Evo CMS - Control Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Redirect::base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo Redirect::base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div class="container">
		
		<div class="row">
			
			<div class="col-md-4">
				
			</div><!-- .sisi kiri -->

			<div class="col-md-4">
				<br />
				<br />
				<center><img src="<?php echo Redirect::base_url(); ?>assets/images/evo.png" width="50%" /></center>
				<br />
				<div class="panel panel-primary">
					<div class="panel-heading">
				    	<h3 class="panel-title" align="center">Control Panel</h3>
				  	</div>
				  	<div class="panel-body">
				    	<form id="form-login">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
								<input type="text" name="username" autocomplete="off" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
							</div>
							<br />
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
								<input type="password" name="password" autocomplete="off" class="form-control" placeholder="Password" aria-describedby="basic-addon1">
							</div>
							<br />
							<button type="submit" class="btn btn-primary btn-block">Login</button>
							<br />
							<button type="submit" class="btn btn-default pull-right"><i class="fa fa-question-circle fa-fw"></i> Lost Password</button>
				    	</form>
				  	</div>
				</div>
			</div><!-- .sisi tengah -->

			<div class="col-md-4">
				
			</div><!-- .sisi kanan -->

		</div><!-- .row -->

    </div>

    <!-- jQuery -->
    <script src="<?php echo Redirect::base_url(); ?>assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo Redirect::base_url(); ?>assets/js/bootstrap.min.js"></script>

    <!-- Login JavaScript -->
    <script src="<?php echo Redirect::base_url(); ?>assets/admin/js/login.js"></script>

    <!-- get Base URL JavaScript -->
    <script type="text/javascript">var base_url = "<?php echo Redirect::base_url(); ?>";</script>

</body>

</html>
