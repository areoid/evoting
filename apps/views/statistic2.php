<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--<link rel="icon" href="http://getbootstrap.com/favicon.ico">-->

    <title>Evo CMS</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo Redirect::base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo Redirect::base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo Redirect::base_url(); ?>apps/libs/Flot/flot.js"></script>
    <script src="<?php echo Redirect::base_url(); ?>apps/libs/Flot/jquery.flot.pie.js"></script>
    <style type="text/css">
    .demo-placeholder {
    width: 100px;
    height: 100px;
    font-size: 14px;
    line-height: 1.2em;
}
    </style>
</head>
<body>
  <div id="ampas" style="height: 500px;"></div>
  <script type="text/javascript">
    var base_url = "<?php echo Redirect::base_url(); ?>";
    var dataStat;

    $(function () {
        var data = [
          { label: "Series1",  data: 10},
          { label: "Series2",  data: 30},
          { label: "Series3",  data: 90},
          { label: "Series4",  data: 70},
          { label: "Series5",  data: 80},
          { label: "Series6",  data: 110}
        ];

        var placeholder = $("#placeholder");

        $("button").click(function() {

            placeholder.unbind();

            $.plot(placeholder, data, {
                series: {
                    pie: { 
                        show: true
                    }
                }
            });
        });



    });

//getStatistic();
    
  </script>

    <div id="placeholder" class="#demo-placeholder"></div>

    <button>a</button>

  <script src="<?php echo Redirect::base_url(); ?>assets/js/bootstrap.min.js"></script>
</body>
</html>