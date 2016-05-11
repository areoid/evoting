<!DOCTYPE HTML>
<html>

<head>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo Redirect::base_url(); ?>apps/libs/CanvasJS/canvasjs.min.js"></script>

<script type="text/javascript">
var base_url = "<?php echo Redirect::base_url(); ?>";
var dps = [];
    
    $.getJSON(base_url+"home/rescount", function(json){

        for(var i=0; i<json.length; i++) {
                    var obj = { 
                        label: json[i].label,
                        y: parseInt(json[i].y)
                    };
                    dps.push(obj);
                }
    });
 window.onload = function () {
    // initial values of dataPoints
    /*var dps = [
    {label: "Management Wing", y: 125}  ,
    {label: "Production Lab", y: 332},
    {label: "Cafeteria", y: 55},
    {label: "Library", y: 46},
    {label: "Recreation Centre", y: 32}
    ];*/
    
    var totalEmployees = "total people on campus: 590";

    var chart = new CanvasJS.Chart("chartContainer",{
        theme: "theme2",
        title:{ 
            text: "People On Campus"
        },
        axisY: {                
            title: "Number of People"
        },                  
        legend:{
            verticalAlign: "top",
            horizontalAlign: "centre",
            fontSize: 18

        },
        data : [{
            type: "column",
            showInLegend: true,
            legendMarkerType: "none",               
            legendText: totalEmployees,
            indexLabel: "{y}",
            dataPoints: dps
        }]
    });

    // renders initial chart
    chart.render();

    var sum = 590;   //initial sum 

    var updateInterval = 1000;  // milliseconds
    
    var updateChart = function () {
        // Selecting a random dataPoint
        var dataPointIndex = Math.round(Math.random()*4);       

        // generating random value
        var deltaY = Math.round(2 + Math.random() *(-2-2)); 

        // adding random value to random dataPoint
        dps[dataPointIndex].y = (dps[dataPointIndex].y + deltaY) > 0 ? dps[dataPointIndex].y + deltaY : 0 ;

        // updating legend text. 
        sum = sum + deltaY;
        totalEmployees = "total people on campus: " + sum;          
        chart.options.data[0].legendText = totalEmployees;  

        chart.render();

    };
        // update chart after specified interval
        setInterval(function(){updateChart()}, updateInterval);

    }


    

    </script>

    
</head>
<body>
    <div id="chartContainer" style="height: 300px; width: 100%;">
    </div>
</body>
</html>

