<?php
session_start();
  if ($_SESSION['login']===true){
?>
<!doctype html>
<html lang="sk">
<head>
<?php 
include ("connect.php");                                                                                        

//PIATY GRAF - TYZDENNY
$result5 = mysqli_query($con,"SELECT * FROM vencurik  WHERE time >= (CURDATE() + INTERVAL -7 DAY)") or die(mysqli_error($con));
$rows5 = array(); 
$table5 = array();
$table5['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => file_get_contents("nazvyperiferii/teplomer1.txt"), 'type' => 'number')
	);
    foreach($result5 as $r5) {
$cas5 = strtotime($r5['time']);
	$cas5 = date('d. M H:i',$cas5);
        $temp5 = array();
        // The following line will be used to slice the Pie chart
        $temp5[] = array('v' => (string) $cas5);
        $temp5[] = array('v' => (float) $r5['teplota1']);
       // $temp[] = array('v' => (float) $r['teplota2']);
        $rows5[] = array('c' => $temp5);
        }
$table5['rows'] = $rows5;
$jsonTable5 = json_encode($table5);

//SIESTY GRAF - TYZDENNY 
$result6 = mysqli_query($con,"SELECT * FROM vencurik  WHERE time >= (CURDATE() + INTERVAL -7 DAY)") or die(mysqli_error($con));
$rows6 = array(); 
$table6 = array();
$table6['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => file_get_contents("nazvyperiferii/teplomer2.txt"), 'type' => 'number')
	);
    foreach($result6 as $r6) {
$cas6 = strtotime($r6['time']);
	$cas6 = date('d. M H:i',$cas6);
        $temp6 = array();
        // The following line will be used to slice the Pie chart
        $temp6[] = array('v' => (string) $cas6);
        $temp6[] = array('v' => (float) $r6['teplota2']);
       // $temp[] = array('v' => (float) $r['teplota2']);
        $rows6[] = array('c' => $temp6);
        }
$table6['rows'] = $rows6;
$jsonTable6 = json_encode($table6);

$resulty = mysqli_query($con,"SELECT * FROM vencurik  WHERE time >= (CURDATE() + INTERVAL -7 DAY)") or die(mysqli_error($con));
$rowsy = array(); 
$tabley = array();
$tabley['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => file_get_contents("nazvyperiferii/teplomer1.txt"), 'type' => 'number')
	);
    foreach($resulty as $ry) {
$casy = strtotime($ry['time']);
	$casy = date('d. M H:i',$casy);
        $tempy = array();
        // The following line will be used to slice the Pie chart
        $tempy[] = array('v' => (string) $casy);
        $tempy[] = array('v' => (float) $ry['teplota3']);
       // $temp[] = array('v' => (float) $r['teplota2']);
        $rowsy[] = array('c' => $tempy);
        }
$tabley['rows'] = $rowsy;
$jsonTabley = json_encode($tabley);

//SIEDMY GRAF - TYZDENNY 
$result7 = mysqli_query($con,"SELECT * FROM vencurik  WHERE time >= (CURDATE() + INTERVAL -7 DAY)") or die(mysqli_error($con));
$rows7 = array(); 
$table7 = array();
$table7['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => file_get_contents("nazvyperiferii/barometer.txt"), 'type' => 'number')
	);
    foreach($result7 as $r7) {
$cas7 = strtotime($r7['time']);
	$cas7 = date('d.M H:i',$cas7);
        $temp7 = array();
        // The following line will be used to slice the Pie chart
        $temp7[] = array('v' => (string) $cas7);
        $temp7[] = array('v' => (float) $r7['tlak']);
       // $temp[] = array('v' => (float) $r['teplota2']);
        $rows7[] = array('c' => $temp7);
        }
$table7['rows'] = $rows7;
$jsonTable7 = json_encode($table7);

//OSMY GRAF - TYZDENNY 
$result8 = mysqli_query($con,"SELECT * FROM vencurik  WHERE time >= (CURDATE() + INTERVAL -7 DAY)") or die(mysqli_error($con));
$rows8 = array(); 
$table8 = array();
$table8['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => file_get_contents("nazvyperiferii/vlhkomer.txt"), 'type' => 'number')
	);
    foreach($result8 as $r8) {
$cas8 = strtotime($r8['time']);
	$cas8 = date('d. M H:i',$cas8);
        $temp8 = array();
        $temp8[] = array('v' => (string) $cas8);
        $temp8[] = array('v' => (float) $r8['vlhkost']);
        $rows8[] = array('c' => $temp8);
        }
$table8['rows'] = $rows8;
$jsonTable8 = json_encode($table8);

?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    
    
    <script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTabley?>);
      var options = {
          title: '7 dní',
		  colors: ['orange'],
		  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.LineChart(document.getElementById('chart_divy'));
      chart.draw(data, options);

    }
    </script>
    
    
    
    
		<script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable5?>);
      var options = {
          title: '7 dní',
		  colors: ['red'],
		  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.LineChart(document.getElementById('chart_div5'));
      chart.draw(data, options);

    }
    </script>
			<script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable6?>);
      var options = {
          title: '7 dní',
		  colors: ['green'],
		  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.LineChart(document.getElementById('chart_div6'));
      chart.draw(data, options);

    }
    </script>
			<script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable7?>);
      var options = {
          title: '7 dní',
		  colors: ['purple'],
		  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.LineChart(document.getElementById('chart_div7'));
      chart.draw(data, options);

    }
    </script>
			<script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable8?>);
      var options = {
          title: '7 dní',
		  colors: ['brown'],
		  pointSize: 1
          //is3D: 'true',
       //   width: 800,
         // height: 400
        };
      var chart = new google.visualization.LineChart(document.getElementById('chart_div8'));
      chart.draw(data, options);

    }
    </script>
	
<?php 
include ("meta.php");
?>	
</head>
<?php $stranka = "Grafy";?>
<body>
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



<hr><center><h2>História záznamov - 7 dní</h2><hr>
<a href="grafy.php" class="btn btn-success" role="button">Grafy za 24 hodín</a>   </center>
<div class="col-md-12">
    <div id="chart_div5" style="display: block; max-width: 100%; height: auto;"></div>
  </div>
   <div class="col-md-12">
    <div id="chart_div6" style="display: block; max-width: 100%; height: auto;"></div>
  </div>     
  <div class="col-md-12">
    <div id="chart_divy" style="display: block; max-width: 100%; height: auto;"></div>
  </div>
   <div class="col-md-12">
    <div id="chart_div7" style="display: block; max-width: 100%; height: auto;"></div>
  </div>
   <div class="col-md-12">
    <div id="chart_div8" style="display: block; max-width: 100%; height: auto;"></div>
  </div>


					
								</div>
							</div>
					
						</div>
						
			<!-- END MAIN CONTENT -->
		</div>
    	 <div style="background-color: #808B96; border-radius: 25px; color: white;"><center>Vytvoril: <a href="https://www.facebook.com/martin.s.chlebovec"><font color="white"><u>Martin Chlebovec</u></font></a></center></div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2018 <a href="https://www.themeineed.com" target="_blank">Smart Home</a></p>
			</div>
		</footer>
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
