<?php
require_once('database.php');
require_once('db_functions.php');

//56///////////////////////////////////////////////////////////////
$rows56 = count_56();

$numbers56 = array();
$times56 = array();

for($i = 0; $i < count($rows56); $i++){
    $numbers56[$i] = $rows56[$i]['count'];
    $numbers56[$i] = (int) $numbers56[$i];
    $times56[$i] = $rows56[$i]['arrivalTime'];
}

$splitTimes56 = array();
$hours56 = array();
$minutes56 = array();

for($i = 0; $i < count($times56); $i++){
    $splitTimes56 = explode(":", $times56[$i]);

    array_push($hours56, $splitTimes56[0]);
    array_push($minutes56, $splitTimes56[1]);
}

$sizeOfArrays56 = count($numbers56);

//43////////////////////////////////////////////////////////////////
$rows43 = count_43();

$numbers43 = array();
$times43 = array();

for($i = 0; $i < count($rows43); $i++){
    $numbers43[$i] = $rows43[$i]['count'];
    $numbers43[$i] = (int) $numbers43[$i];
    $times43[$i] = $rows43[$i]['arrivalTime'];
}

$splitTimes43 = array();
$hours43 = array();
$minutes43 = array();

for($i = 0; $i < count($times43); $i++){
    $splitTimes43 = explode(":", $times43[$i]);

    array_push($hours43, $splitTimes43[0]);
    array_push($minutes43, $splitTimes43[1]);
}

$sizeOfArrays43 = count($numbers43);

//66////////////////////////////////////////////////////////////////
$rows66 = count_66();

$numbers66 = array();
$times66 = array();

for($i = 0; $i < count($rows66); $i++){
    $numbers66[$i] = $rows66[$i]['count'];
    $numbers66[$i] = (int) $numbers66[$i];
    $times66[$i] = $rows66[$i]['arrivalTime'];
}

$splitTimes66 = array();
$hours66 = array();
$minutes66 = array();

for($i = 0; $i < count($times66); $i++){
    $splitTimes66 = explode(":", $times66[$i]);

    array_push($hours66, $splitTimes66[0]);
    array_push($minutes66, $splitTimes66[1]);
}

$sizeOfArrays66 = count($numbers66);

$newVar;

?>
<!DOCTYPE HTML>
<html>
<head>
    <script type="text/javascript">
        //56//////////////////////////////////////////////////////////////
        var numbers56 = <?php echo json_encode($numbers56); ?>;
        var hours56 = <?php echo json_encode($hours56); ?>;
        var minutes56 = <?php echo json_encode($minutes56); ?>;
        var sizeOfArrays56 = <?php echo $sizeOfArrays56; ?>;


        var masterArray56 = new Array();
        var makeObject56 = function(numbers56, hours56, minutes56){
            for(var i=0; i < sizeOfArrays56; i++){
                var tempObject = {x: new Date("October 26, 1983 "+hours56[i]+":"+minutes56[i]+":00"), y:numbers56[i]};
                masterArray56.push(tempObject);
            }
        };
        makeObject56(numbers56, hours56, minutes56);

        //43///////////////////////////////////////////////////////////////
        var numbers43 = <?php echo json_encode($numbers43); ?>;
        var hours43 = <?php echo json_encode($hours43); ?>;
        var minutes43 = <?php echo json_encode($minutes43); ?>;
        var sizeOfArrays43 = <?php echo $sizeOfArrays43; ?>;


        var masterArray43 = new Array();
        var makeObject43 = function(numbers43, hours43, minutes43){
            for(var i=0; i < sizeOfArrays43; i++){
                var tempObject = {x: new Date("October 26, 1983 "+hours43[i]+":"+minutes43[i]+":00"), y:numbers43[i]};
                masterArray43.push(tempObject);
            }
        };
        makeObject43(numbers43, hours43, minutes43);
        console.log(masterArray43);

        //66/////////////////////////////////////////////////////////////
        var numbers66 = <?php echo json_encode($numbers66); ?>;
        var hours66 = <?php echo json_encode($hours66); ?>;
        var minutes66 = <?php echo json_encode($minutes66); ?>;
        var sizeOfArrays66 = <?php echo $sizeOfArrays66; ?>;


        var masterArray66 = new Array();
        var makeObject66 = function(numbers66, hours66, minutes66){
            for(var i=0; i < sizeOfArrays66; i++){
                var tempObject = {x: new Date("October 26, 1983 "+hours66[i]+":"+minutes66[i]+":00"), y:numbers66[i]};
                masterArray66.push(tempObject);
            }
        };
        makeObject66(numbers66, hours66, minutes66);

    </script>
    <script type="text/javascript">
        window.onload = function () {
            var chart = new CanvasJS.Chart("chartContainer",
                {
                    title:{
                        text: "Catch That Bus"
                    },

                    axisX:{
                        title: "Arrival Time",
                        gridThickness: 2,
                        interval:2,
                        intervalType: "hour",
                        valueFormatString: "hh TT K",
                        labelAngle: -20
                    },
                    axisY:{
                        title: "Frequency"
                    },
                    data: [
                        {
                            type: "line",
                            showInLegend: true,
                            name: "56",
                            dataPoints: masterArray56
                        },
                        {
                            type: "line",
                            showInLegend: true,
                            name: "43",
                            dataPoints: masterArray43
                        },
                        {
                            type: "line",
                            showInLegend: true,
                            name: "66",
                            dataPoints: masterArray66
                        }
                    ],
                    legend: {
                        cursor: "pointer",
                        itemclick: function (e) {
                            if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                                e.dataSeries.visible = false;
                            } else {
                                e.dataSeries.visible = true;
                            }
                            chart.render();
                        }
                    }
                }
            );

            chart.render();
        }
    </script>
    <script type="text/javascript" src="canvasjs.js"></script>
    <script type="text/javascript">
        saveTime = function(){
            var radios = document.getElementsByName('busNumber');
            var newVar;
            for (var i = 0, length = radios.length; i < length; i++) {
                if (radios[i].checked) {
                    // do whatever you want with the checked radio
                    alert(radios[i].value);
                    newVar = radios[i].value;
                    break;
                }
            }

        }
    </script>

    <style type="text/css">
        select {
            min-width:265px;
            min-height: 75px;
            border-width: 10px;
            border-color: rgba(50, 50, 50, 0.14);
            margin: 10px 10px 10px 0px;
        }
        .big-btn {
            width: 90px;
            height: 80px;
        }
    </style>
</head>
<body>
<div id="chartContainer" style="height: 700px; width: 100%;">
</div>
<br><br>
<h3 align="center">Select Bus Number</h3>
<div align="center">
<form action="phpFunctions.php" id="bus" name="busNum" method="get">
    <select name="busNumber" class="selectTags">
    <option name="busNumber" value="56"> 56 </option>
    <option name="busNumber" value="43"> 43 </option>
    <option name="busNumber" value="66"> 66 </option>
    </select>
    <input class="big-btn" type="submit" value="Log it!">
</form>
</div>

</body>
</html>
