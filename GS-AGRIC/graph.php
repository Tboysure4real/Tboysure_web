<?php
//include('graph_config.php');

$dataPoints = array(
    /*
	array("y" => 25, "label" => "Sunday"),
	array("y" => 15, "label" => "Monday"),
	array("y" => 25, "label" => "Tuesday"),
	array("y" => 5, "label" => "Wednesday"),
	array("y" => 10, "label" => "Thursday"),
	array("y" => 0, "label" => "Friday"),
	array("y" => 20, "label" => "Saturday")
*/

    array("y" => 35, "label" => "8:25am"),
    array("y" => 25, "label" => "8:55am"),
    array("y" => 35, "label" => "9:25am"),
    array("y" => 35, "label" => "9:55am"),
    array("y" => 25, "label" => "10:25"),
    array("y" => 25, "label" => "10:55am"),
    array("y" => 25, "label" => "11:25am")
);
//var_dump($dataPoints);
//foreach($dataPoints as $value){
//echo "<pre>";
//print_r($value).PHP_EOL;
// echo "</pre>";

/*
$dataPoints = array(
	array("y"=>"25", "label"=>"Sunday"),
	array("y"=>"20", "label"=>"Monday"),
	array("y"=>"25", "label"=>"Tuesday"),
	array("y"=>"25", "label"=>"Wednesday"),
	array("y"=>"20", "label"=>"Thursday"),
	array("y"=>"20", "label"=>"Friday"),
	array("y"=>"20", "label"=>"Saturday")
);            

var_dump($dataPoints);
foreach($dataPoints as $key=>$value){
$k[] = $key;
$v[] = $value;
//echo ($v) .PHP_EOL;
// print_r($k);
print_r($v).PHP_EOL;
echo "<pre>";
//echo $key . "=>" . $value .PHP_EOL;
//echo "</pre>";

}
*/
//Fetching Data from the database!


//Fetching Data from the database!
//$dataPoints;

//$dataPoints=$json_data;

?>

<!DOCTYPE HTML>
<html>

<head>
    <script>
    window.onload = function() {

        var chart = new CanvasJS.Chart("chartContainer", {
            title: {
                text: ""
            },
            axisY: {
                title: "PPM"
            },
            data: [{
                type: "line",
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
        });
        chart.render();

    }
    </script>
    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="utf-8">
        <!-- Stylesheets -->
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet'>
        <link rel="stylesheet" href="css/graph.css">
        <link rel="stylesheet" href="js/date_pic/date_input.css">
        <link rel="stylesheet" href="lib/auto/css/jquery.autnoneocomplete.css">

        <!-- Optimize for mobile devices -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    </head>

    <style type="text/css" media="print">
    .hide {
        display: table;
    }

    @media print {
        #printButton {
            display: table;
        }

        body {
            color: #1a4567 !important;
            /* -webkit-print-color-adjust: exact;*/
        }
    }
    </style>
    <script type="text/javascript">
    function printpage() {
        document.getElementById('printButton').style.visibility = "hidden";
        document.getElementById('dashboard').style.visibility = "hidden";
        window.print();
        document.getElementById('printButton').style.visibility = "visible";
        document.getElementById('dashboard').style.visibility = "visible";
    }
    </script>

<body>
    <a href="dashboard.php" class="active-tab dashboard-tab" id="dashboard"><button type="button">Dashboard</button></a>
    <input name="print" type="button" value="Print" id="printButton" onClick="printpage()">
    <div class="gss">
        <img src="upload/Hafiz Super Store.png" width="150px" />
        <div>
            <table class="graph-table" border="1" cellpadding="1" cellspacing="0">
                <tr>
                    <td>CPP</td>
                    <td><Strong>2C</strong></td>
                    <td>GS AGRICULTURE NIG.LTD. HACCP SYSTEM</td>
                </tr>
                <tr>
                    <td>Record</td>
                    <td>CCP/2CR/R</td>
                    <td>Chlorine level in chill water</td>
                </tr>
            </table>

        </div>

        <!--second Table-->
        <div>
            <table class="critical-limit" border="1" cellpadding="1" cellspacing="0">
                <tr>
                    <td>Critical limit</td>
                    <td><Strong>20-30ppm in </br>inlet of screw chiller water</strong></td>
                    <td>Frequency</td>
                    <td>Every 1/2 hour of operation</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="date">
        <tr>
            <td>Date:</td>
            <?php echo date('d-m-Y'); ?> <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>
            <td> &nbsp; </td>UPPER LIMIT
        </tr>
    </div>
    <!--<p class="gss"><strong>GS AGRICULTURE NIG. LTD. HACCP SYSTEM</strong></p> -->
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <div id="chartContainer" style="height:300px; width: 100%;"></div>
    <script src="js/graph.js"></script>
    <div style="margin-top:50px;">
        <!--<center class="c" style="color:#1a4567">LOWER LIMIT</center>-->
        <td>&nbsp;</td>
    </div>
    <p style="color:black"><strong>Corrective Action: ----------------------</></strong></p>
    <div style="margin-right:50px;">
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <p style="color:black"><strong>Production Manager'Sign--------------</strong></p>
    </div>
    <div style="margin-left:1000px">
        <P style="color:black"><strong>QA Supervisor's Sign..............</strong></P>
    </div>
</body>

</html>