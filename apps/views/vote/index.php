<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="EVO-cms is e-voting content management system">
    <meta name="author" content="Evo CMS">

    <title>Evo CMS Administrator - <?php echo $_data['title']; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo Redirect::base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo Redirect::base_url(); ?>assets/css/registration.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo Redirect::base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
	#container {
	    margin: 0px auto;
	    width: 500px;
	    height: 375px;
	    border: none;
	}
	#videoElement {
	    width: 500px;
	    height: 375px;
	    background-color: #666;
	}
	#canvas {
	    width: 500px;
	    height: 375px;
	    
	    background-color: #CCC;
	}
	</style>

</head>

<body>
    <!-- jQuery -->
    <script src="<?php echo Redirect::base_url(); ?>assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo Redirect::base_url(); ?>assets/js/bootstrap.min.js"></script>

    <!-- get Base URL JavaScript -->
    <script type="text/javascript">var base_url = "<?php echo Redirect::base_url(); ?>";</script>

    <div>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header"> 
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo Redirect::base_url(); ?>vote/home/index">Evo CMS Vote</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        Option <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li class="divider"></li>
                        <li><a href="<?php echo Redirect::base_url(); ?>"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Back</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
        </nav>

    </div>
    <!-- /#wrapper -->

    <div class="container">
    	<?php
            echo $_data['content'];
        ?>
	</div>

</body>

</html>
