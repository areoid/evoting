<!DOCTYPE HTML>
<html>
<head>
    <script type="text/javascript" src="<?php echo Redirect::base_url(); ?>assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/CanvasJS/canvasjs.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo Redirect::base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">
    var base_url = "<?php echo Redirect::base_url(); ?>";
    var yjson = [];
    var labeljson = [];
    var dps = [];
    var howlong;
    
    window.onload = function () {
    $.getJSON(base_url+"home/rescount", function(json){
        
        for(var i=0; i<json.length; i++) {
                    
            var obj = { 
                    label: json[i].label,
                    y: parseInt(json[i].y)
                };
            dps.push(obj);
            $("#tb_candidates").append("<tr><td>"+json[i].label+"</td>"+
                                       "<td id=\"y"+i+"\">"+json[i].y+"</td></tr>");
        }
    });

        var chart = new CanvasJS.Chart("chartContainer",{
            theme: "theme2",
            title: {
                text: "Statistic of Votes"      
            },
            axisY: {                
                suffix: " Votes"
            },      
            legend :{
                verticalAlign: 'bottom',
                horizontalAlign: "center"
            },
            data: [
            {
                type: "column", 
                bevelEnabled: true,             
                indexLabel: "{y} Votes",
                dataPoints: dps                 
            }
            ]
        });
        //alert(dps);

        chart.render();

        var updateInterval = 1000;  
        var count = 0;
        var table = "";
        //console.log(dps);
    
        var updateChart = function () {
            
            $.getJSON(base_url+"home/resvotes", function(json){
                $("#t_voters").html(json[0].t_voters);
                $("#r_voters").html(json[0].r_voters);
                $("#votes").html(json[0].votes);
                
            });        

            $.getJSON(base_url+"home/rescount", function(json){
                //myjson = json;
                for(var i=0; i<json.length; i++) {
                    labeljson[i] = json[i].label;
                    yjson[i] = parseInt(json[i].y);
                    $("#y"+i).html(yjson[i]);
                    
                }
                
            });
            //alert(howlong);
            for (var i = 0; i < dps.length; i++) {

                dps[i] = {label: labeljson[i] , y: yjson[i]};
                $("#y["+i+"]").html(yjson[i]);
                
            };

        

            chart.render();
            //console.log(dps);

            //alert(dps);

            count++;
            if(count == 60) {
                window.location.reload();
            }
        };
        
        updateChart();      

        // update chart after specified interval 
        setInterval(function(){updateChart()}, updateInterval);
//}
//catch(err) {
  //  document.writeln("Sorry, there is problem when load charts. <a href='"+window.location.href+"'>[Try Again]</a>");
//}
    }

    </script>

</head>
<body>
<div class="container">
    <div id="chartContainer" style="height: 300px; width: 100%;"></div>
    <br>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <h3>Details of Votes :</h3>
            <table class="table">
                <tr>
                    <td>Total voters : </td>
                    <td id="t_voters">10</td>
                </tr>
                <tr>
                    <td>Registerd voters : </td>
                    <td id="r_voters">10</td>
                </tr>
                <tr>
                    <td>Total votes : </td>
                    <td id="votes">10</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <h3>Details of Candidates :</h3>
            <table class="table" id="tb_candidates">
            </table>
        </div>
    </div>
    
</div>
</body>
</html>
