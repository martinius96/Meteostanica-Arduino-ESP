<?php
session_start();
  if ($_SESSION['login']===true){
?>
<!doctype html>
<html lang="sk">
<head>
<?php 
include ("connect.php");                                                                                        
$result = mysqli_query($con,"SELECT * FROM vencurik  WHERE time >= DATE_SUB(NOW(),INTERVAL 24 HOUR)") or die(mysqli_error($con));
$rows = array();
$table = array();
$table['cols'] = array(
    array('label' => 'time', 'type' => 'string'), 
    array('label' => file_get_contents("nazvyperiferii/teplomer1.txt"), 'type' => 'number')
	);
    foreach($result as $r) {
$cas = strtotime($r['time']);
	$cas = date('H:i',$cas);
        $temp = array();
        // The following line will be used to slice the Pie chart
        $temp[] = array('v' => (string) $cas);
        $temp[] = array('v' => (float) $r['teplota1']);
       // $temp[] = array('v' => (float) $r['teplota2']);
        $rows[] = array('c' => $temp);
        }
$table['rows'] = $rows;
$jsonTable = json_encode($table);



$resultx = mysqli_query($con,"SELECT * FROM vencurik  WHERE time >= DATE_SUB(NOW(),INTERVAL 24 HOUR)") or die(mysqli_error($con));
$rowsx = array();
$tablex = array();
$tablex['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => file_get_contents("nazvyperiferii/teplomer3.txt"), 'type' => 'number')
	);
    foreach($resultx as $rx) {
$casx = strtotime($rx['time']);
	$casx = date('H:i',$casx);
        $tempx = array();
        // The following line will be used to slice the Pie chart
        $tempx[] = array('v' => (string) $casx);
        $tempx[] = array('v' => (float) $rx['teplota3']);
       // $temp[] = array('v' => (float) $r['teplota2']);
        $rowsx[] = array('c' => $tempx);
        }
$tablex['rows'] = $rowsx;
$jsonTablex = json_encode($tablex);



//DRUHY GRAF
$result2 = mysqli_query($con,"SELECT * FROM vencurik  WHERE time >= DATE_SUB(NOW(),INTERVAL 24 HOUR)") or die(mysqli_error($con));
$rows2 = array();
$table2 = array();
$table2['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => file_get_contents("nazvyperiferii/teplomer2.txt"), 'type' => 'number')
	);
    foreach($result2 as $r2) {
$cas2 = strtotime($r2['time']);
	$cas2 = date('H:i',$cas2);
        $temp2 = array();
        $temp2[] = array('v' => (string) $cas2);
        $temp2[] = array('v' => (float) $r2['teplota2']);
        $rows2[] = array('c' => $temp2);
        }
$table2['rows'] = $rows2;
$jsonTable2 = json_encode($table2);

//TRETI GRAF
$result3 = mysqli_query($con,"SELECT * FROM vencurik  WHERE time >= DATE_SUB(NOW(),INTERVAL 24 HOUR)") or die(mysqli_error($con));
$rows3 = array();
$table3 = array();
$table3['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => file_get_contents("nazvyperiferii/barometer.txt"), 'type' => 'number')
	);
    foreach($result3 as $r3) {
$cas3 = strtotime($r3['time']);
	$cas3 = date('H:i',$cas3);
        $temp3 = array();
        // The following line will be used to slice the Pie chart
        $temp3[] = array('v' => (string) $cas3);
        $temp3[] = array('v' => (float) $r3['tlak']);
       // $temp[] = array('v' => (float) $r['teplota2']);
        $rows3[] = array('c' => $temp3);
        }
$table3['rows'] = $rows3;
$jsonTable3 = json_encode($table3);

//STVRTY GRAF
$result4 = mysqli_query($con,"SELECT * FROM vencurik  WHERE time >= DATE_SUB(NOW(),INTERVAL 24 HOUR)") or die(mysqli_error($con));
$rows4 = array();
$table4 = array();
$table4['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => file_get_contents("nazvyperiferii/vlhkomer.txt"), 'type' => 'number')
	);
    foreach($result4 as $r4) {
$cas4 = strtotime($r4['time']);
	$cas4 = date('H:i',$cas4);
        $temp4 = array();
        // The following line will be used to slice the Pie chart
        $temp4[] = array('v' => (string) $cas4);
        $temp4[] = array('v' => (float) $r4['vlhkost']);
       // $temp[] = array('v' => (float) $r['teplota2']);
        $rows4[] = array('c' => $temp4);
        }
$table4['rows'] = $rows4;
$jsonTable4 = json_encode($table4);


?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable?>);
      var options = {
          title: 'Posledných 24 hodín',
		  	  colors: ['red'],
			  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);

    }
    </script>
	  <script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable2?>);
      var options = {
          title: 'Posledných 24 hodín',
		  	  colors: ['green'],
			  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.LineChart(document.getElementById('chart_div2'));
      chart.draw(data, options);

    }
    </script>
     <script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTablex?>);
      var options = {
          title: 'Posledných 24 hodín',
		  	  colors: ['orange'],
			  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.LineChart(document.getElementById('chart_divx'));
      chart.draw(data, options);

    }
    </script>
	<script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable3?>);
      var options = {
          title: 'Posledných 24 hodín',
		  colors: ['purple'],
		  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.LineChart(document.getElementById('chart_div3'));
      chart.draw(data, options);

    }
    </script>
	<script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable4?>);
      var options = {
          title: 'Posledných 24 hodín',
		  colors: ['brown'],
		  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.LineChart(document.getElementById('chart_div4'));
      chart.draw(data, options);

    }
    </script>
	
<?php 
include ("meta.php");
?>	
</head>
<?php $stranka = "Grafy";?>
<body onload="myFunction()">
	<!-- WRAPPER -->
	<div id="wrapper">
	<?php 
include ("menu.php");
?>	
<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
							<div class="panel-body">



<hr><center><h2>Aktuálny deň</h2><hr>
<a href="grafy2.php" class="btn btn-success" role="button">Grafy za 7 dní</a>   </center>
  <div class="col-md-12">
    <div id="chart_div" style="display: block; max-width: 100%; height: auto;"></div>
  </div>
  <div class="col-md-12">
    <div id="chart_div2" style="display: block; max-width: 100%; height: auto;"></div>
  </div>  
  <div class="col-md-12">
    <div id="chart_divx" style="display: block; max-width: 100%; height: auto;"></div>
  </div>
   <div class="col-md-12">
    <div id="chart_div3" style="display: block; max-width: 100%; height: auto;"></div>
  </div>
    <div class="col-md-12">
    <div id="chart_div4" style="display: block; max-width: 100%; height: auto;"></div>
  </div>



					
								</div>
							</div>
					
						</div>
			<!-- END MAIN CONTENT -->
		</div>
    	 <div style="background-color: #808B96; border-radius: 25px; color: white;"><center>Vytvoril: <a href="https://www.facebook.com/martin.s.chlebovec"><font color="white"><u>Martin Chlebovec</u></font></a></center></div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
<?php
include ("js_files.php");
?>	
	
</body>


</html>
<?php }else{
	header("Location: ../index.php");
	
} ?>
