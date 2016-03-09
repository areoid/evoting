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

    <!-- MetisMenu CSS -->
    <link href="<?php echo Redirect::base_url(); ?>assets/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo Redirect::base_url(); ?>assets/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo Redirect::base_url(); ?>assets/css/sb-admin-2.css" rel="stylesheet">

    <!-- EvoCard CSS -->
    <link href="<?php echo Redirect::base_url(); ?>assets/admin/css/evocard.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo Redirect::base_url(); ?>assets/css/morris.css" rel="stylesheet">

    <!-- DataTable CSS -->
    <link href="<?php echo Redirect::base_url(); ?>assets/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo Redirect::base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    div#loader
    {
        display: none;
        width:100px;
        height: 100px;
        position: fixed;
        top: 50%;
        left: 50%;
        text-align:center;
        margin-left: -50px;
        margin-top: -100px;
        z-index:2;
        overflow: auto;
    }    
    </style>
</head>

<body>
    <!-- Loader animation -->
    <div id="loader">
        <img src="<?php echo Redirect::base_url(); ?>assets/images/loading.gif" alt="Loading..."/>
    </div>

    <script type="text/javascript">
    /*
    $('#loader').ajaxStart(function () {
       $(this).fadeIn('fast');
    }).ajaxStop(function () {
       $(this).stop().fadeOut('fast');
    });
    $(function() {
        $(document).ajaxStart(function () {
            $("#loader").show();
        });
        $(document).ajaxStop(function () {
            $("#loader").hide();
        });
    });*/
    </script>

    <!-- jQuery -->
    <script src="<?php echo Redirect::base_url(); ?>assets/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo Redirect::base_url(); ?>assets/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo Redirect::base_url(); ?>assets/js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo Redirect::base_url(); ?>assets/js/raphael-min.js"></script>
    <script src="<?php echo Redirect::base_url(); ?>assets/js/morris.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo Redirect::base_url(); ?>assets/js/sb-admin-2.js"></script>

    <!-- dataTables JavaScript -->
    <script src="<?php echo Redirect::base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo Redirect::base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>

    <!-- get Base URL JavaScript -->
    <script type="text/javascript">var base_url = "<?php echo Redirect::base_url(); ?>";</script>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header"> 
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Evo CMS Administrator</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"> </span> Welcome <?php echo Session::show('username'); ?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> User Profile</a>
                        </li>
                        <li><a href="#"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo Redirect::base_url(); ?>admin/home/logout"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
        <?php
            // show menu
            echo $_data['menu'];
        ?> 
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $_data['title']; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php echo $_data['content']; ?>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>
