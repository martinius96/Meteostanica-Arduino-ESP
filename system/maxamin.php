<?php
error_reporting(0);
session_start();
  if ($_SESSION['login']===true){
?>
<!doctype html>
<html lang="sk">

<head>
<?php 
include ("meta.php");
include ("connect.php");
?>
<script src="https://www.gstatic.com/charts/loader.js"></script>
  <script>
    google.charts.load('current', {packages: ['gauge']});
    </script>
</head>
<?php $stranka = "Rekordy";?>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
	
	<?php 
include ("menu.php");
?>	





 <?php
  $highesttempoutsidetoday = mysqli_query($con,"SELECT MAX(teplota1) AS NajvyssiVondnes, time FROM vencurik WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
    $highesttempoutsidetodayJs=0;     
           while($row = mysqli_fetch_assoc($highesttempoutsidetoday)){
	 $highesttempoutsidetodayJs = round($row['NajvyssiVondnes'],2); }
   
   
   
   
   
   
   
   
   
   
   $highestteplota3today = mysqli_query($con,"SELECT MAX(teplota3) AS NajvyssiTeplota3dnes, time FROM vencurik WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
    $highestteplota3todayJs=0;     
           while($row = mysqli_fetch_assoc($highestteplota3today)){
	 $highestteplota3todayJs = round($row['NajvyssiTeplota3dnes'],2); }
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   

  $highesttemplivingroomtoday = mysqli_query($con,"SELECT MAX(teplota2) AS NajvyssiLivingRoomdnes, time FROM vencurik WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
   $highesttemplivingroomtodayJs=0;
           while($row = mysqli_fetch_assoc($highesttemplivingroomtoday)){
	$highesttemplivingroomtodayJs = round($row['NajvyssiLivingRoomdnes'],2); } 

  $highesttempbedroomtoday = mysqli_query($con,"SELECT MAX(vlhkost) AS NajvyssiBedRoomdnes, time FROM vencurik WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
  $highesttempbedroomtodayJs=0;
           while($row = mysqli_fetch_assoc($highesttempbedroomtoday)){
	$highesttempbedroomtodayJs = round($row['NajvyssiBedRoomdnes'],2); } 
  $highestpresoutsidetoday = mysqli_query($con,"SELECT MAX(tlak) AS Najvyssitlakvondnes, time FROM vencurik WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
   $highestpresoutsidetodayJs=0;
           while($row = mysqli_fetch_assoc($highestpresoutsidetoday)){
	$highestpresoutsidetodayJs=round($row['Najvyssitlakvondnes'],2); }  
  $lowesttempoutsidetoday = mysqli_query($con,"SELECT MIN(teplota1) AS NajnizsiVondnes, time FROM vencurik WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
    $lowesttempoutsidetodayJs=0;     
           while($row = mysqli_fetch_assoc($lowesttempoutsidetoday)){
	 $lowesttempoutsidetodayJs = round($row['NajnizsiVondnes'],2); }
   
   
   
   
   
   
   
   
   
       $lowestteplota3today = mysqli_query($con,"SELECT MIN(teplota3) AS NajnizsiVondnes, time FROM vencurik WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
    $lowestteplota3todayJs=0;     
           while($row = mysqli_fetch_assoc($lowestteplota3today)){
	 $lowestteplota3todayJs = round($row['NajnizsiVondnes'],2); }
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   

  $lowesttemplivingroomtoday = mysqli_query($con,"SELECT MIN(teplota2) AS NajnizsiLivingRoomdnes, time FROM vencurik WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
   $lowesttemplivingroomtodayJs=0;
           while($row = mysqli_fetch_assoc($lowesttemplivingroomtoday)){
	$lowesttemplivingroomtodayJs = round($row['NajnizsiLivingRoomdnes'],2); } 

  $lowesttempbedroomtoday = mysqli_query($con,"SELECT MIN(vlhkost) AS NajnizsiBedRoomdnes, time FROM vencurik WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
  $lowesttempbedroomtodayJs=0;
           while($row = mysqli_fetch_assoc($lowesttempbedroomtoday)){
	$lowesttempbedroomtodayJs = round($row['NajnizsiBedRoomdnes'],2); } 
  $lowestpresoutsidetoday = mysqli_query($con,"SELECT MIN(tlak) AS Najnizsitlakvondnes, time FROM vencurik WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
   $lowestpresoutsidetodayJs=0;
           while($row = mysqli_fetch_assoc($lowestpresoutsidetoday)){
	$lowestpresoutsidetodayJs=round($row['Najnizsitlakvondnes'],2); } 

 $avgtempoutside = mysqli_query($con,"SELECT AVG(teplota1) AS PriemerVon  FROM vencurik WHERE date(time) < CURDATE() - INTERVAL 7 day") or die(mysqli_error($con));
  $avgtemperatureOutsideJs=0;         
           while($line = mysqli_fetch_array($avgtempoutside)){
$avgtemperatureOutsideJs = round($line['PriemerVon'],2);
} 




$avgteplota3 = mysqli_query($con,"SELECT AVG(teplota3) AS PriemerVon  FROM vencurik WHERE date(time) < CURDATE() - INTERVAL 7 day") or die(mysqli_error($con));
  $avgteplota3Js =0;         
           while($line = mysqli_fetch_array($avgteplota3)){
$avgteplota3Js = round($line['PriemerVon'],2);
} 





















 $avgtemplivingroom = mysqli_query($con,"SELECT AVG(teplota2) AS PriemerObyvacka  FROM vencurik WHERE date(time) < CURDATE() - INTERVAL 7 day") or die(mysqli_error($con));
  $avgtemperatureLivingRoomJs=0;         
           while($line = mysqli_fetch_array($avgtemplivingroom)){
$avgtemperatureLivingRoomJs = round($line['PriemerObyvacka'],2);
}
 $avgtempbedroom = mysqli_query($con,"SELECT AVG(vlhkost) AS PriemerSpalna  FROM vencurik WHERE date(time) < CURDATE() - INTERVAL 7 day") or die(mysqli_error($con));
  $avgtemperatureBedRoomJs=0;         
           while($line = mysqli_fetch_array($avgtempbedroom)){
$avgtemperatureBedRoomJs = round($line['PriemerSpalna'],2);
} 
 $avgpresoutside = mysqli_query($con,"SELECT AVG(tlak) AS PriemerTlak  FROM vencurik WHERE date(time) < CURDATE() - INTERVAL 7 day") or die(mysqli_error($con));
  $avgpressureOutsideJs=0;         
           while($line = mysqli_fetch_array($avgpresoutside)){
$avgpressureOutsideJs = round($line['PriemerTlak'],2);
}
 $highesttempoutside = mysqli_query($con,"SELECT MAX(teplota1) AS NajvyssiVon  FROM vencurik ") or die(mysqli_error($con));
  $highesttemperatureOutsideJs=0;         
           while($line = mysqli_fetch_array($highesttempoutside)){
$highesttemperatureOutsideJs = round($line['NajvyssiVon'],2);
} 









 $highestteplota3 = mysqli_query($con,"SELECT MAX(teplota3) AS NajvyssiVon  FROM vencurik ") or die(mysqli_error($con));
  $highestteplota3Js=0;         
           while($line = mysqli_fetch_array($highestteplota3)){
$highestteplota3Js = round($line['NajvyssiVon'],2);
} 
























 $highesttemplivingroom = mysqli_query($con,"SELECT MAX(teplota2) AS NajvyssiObyvacka  FROM vencurik") or die(mysqli_error($con));
  $highesttemperatureLivingRoomJs=0;         
           while($line = mysqli_fetch_array($highesttemplivingroom)){
$highesttemperatureLivingRoomJs = round($line['NajvyssiObyvacka'],2);
}
 $highesttempbedroom = mysqli_query($con,"SELECT MAX(vlhkost) AS NajvyssiSpalna  FROM vencurik") or die(mysqli_error($con));
  $highesttemperatureBedRoomJs=0;         
           while($line = mysqli_fetch_array($highesttempbedroom)){
$highesttemperatureBedRoomJs = round($line['NajvyssiSpalna'],2);
} 
 $highestpresoutside = mysqli_query($con,"SELECT MAX(tlak) AS NajvyssiTlak  FROM vencurik") or die(mysqli_error($con));
  $highestpressureOutsideJs=0;         
           while($line = mysqli_fetch_array($highestpresoutside)){
$highestpressureOutsideJs = round($line['NajvyssiTlak'],2);
}
 $lowesttempoutside = mysqli_query($con,"SELECT MIN(teplota1) AS NajnizsiVon  FROM vencurik") or die(mysqli_error($con));
  $lowesttemperatureOutsideJs=0;         
           while($line = mysqli_fetch_array($lowesttempoutside)){
$lowesttemperatureOutsideJs = round($line['NajnizsiVon'],2);
} 







   $lowestteplota3 = mysqli_query($con,"SELECT MIN(teplota3) AS NajnizsiVon  FROM vencurik") or die(mysqli_error($con));
  $lowestteplota3Js=0;         
           while($line = mysqli_fetch_array($lowestteplota3)){
$lowestteplota3Js = round($line['NajnizsiVon'],2);
}















 $lowesttemplivingroom = mysqli_query($con,"SELECT MIN(teplota2) AS NajnizsiObyvacka  FROM vencurik") or die(mysqli_error($con));
  $lowesttemperatureLivingRoomJs=0;         
           while($line = mysqli_fetch_array($lowesttemplivingroom)){
$lowesttemperatureLivingRoomJs = round($line['NajnizsiObyvacka'],2);
}
 $lowesttempbedroom = mysqli_query($con,"SELECT MIN(vlhkost) AS NajnizsiSpalna  FROM vencurik") or die(mysqli_error($con));
  $lowesttemperatureBedRoomJs=0;         
           while($line = mysqli_fetch_array($lowesttempbedroom)){
$lowesttemperatureBedRoomJs = round($line['NajnizsiSpalna'],2);
} 
 $lowestpresoutside = mysqli_query($con,"SELECT MIN(tlak) AS NajnizsiTlak  FROM vencurik") or die(mysqli_error($con));
  $lowestpressureOutsideJs=0;         
           while($line = mysqli_fetch_array($lowestpresoutside)){
$lowestpressureOutsideJs = round($line['NajnizsiTlak'],2);
}  ?>
<script>
var highesttemperatureOutsideTodayJs = <?=$highesttempoutsidetodayJs?>;

var highestteplota3todayJs = <?=$highestteplota3todayJs?>;


var highesttemperatureLivingRoomTodayJs = <?=$highesttemplivingroomtodayJs?>;
var highesttemperatureBedRoomTodayJs = <?=$highesttempbedroomtodayJs?>;
var highestpressureOutsideTodayJs = <?=$highestpresoutsidetodayJs?>;



var lowestteplota3todayJs = <?=$lowestteplota3todayJs?>;



var lowesttemperatureOutsideTodayJs = <?=$lowesttempoutsidetodayJs?>;
var lowesttemperatureLivingRoomTodayJs = <?=$lowesttemplivingroomtodayJs?>;
var lowesttemperatureBedRoomTodayJs = <?=$lowesttempbedroomtodayJs?>;
var lowestpressureOutsideTodayJs = <?=$lowestpresoutsidetodayJs?>;
var avgtemperatureOutsideJs = <?=$avgtemperatureOutsideJs?>;


var avgteplota3Js = <?=$avgteplota3Js?>;




var avgtemperatureLivingRoomJs = <?=$avgtemperatureLivingRoomJs?>;
var avgtemperatureBedRoomJs = <?=$avgtemperatureBedRoomJs?>;
var avgpressureOutsideJs = <?=$avgpressureOutsideJs?>;
var highesttemperatureOutsideJs = <?=$highesttemperatureOutsideJs?>;



var highestteplota3Js = <?=$highestteplota3Js?>;




var highesttemperatureLivingRoomJs = <?=$highesttemperatureLivingRoomJs?>;
var highesttemperatureBedRoomJs = <?=$highesttemperatureBedRoomJs?>;
var highestpressureOutsideJs = <?=$highestpressureOutsideJs?>;
var lowesttemperatureOutsideJs = <?=$lowesttemperatureOutsideJs?>;


var lowestteplota3Js = <?=$lowestteplota3Js?>;


var lowesttemperatureLivingRoomJs = <?=$lowesttemperatureLivingRoomJs?>;
var lowesttemperatureBedRoomJs = <?=$lowesttemperatureBedRoomJs?>;
var lowestpressureOutsideJs = <?=$lowestpressureOutsideJs?>;
</script>    








 <script src="js/hodnoty_suhrn.js"></script>
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
				<div style="padding:0 16px;">
<hr><center><h2>Dnešné maximum</h2><hr>
<div id="HighestOutsideToday_chart_div" style="width: 200px; height: 200px; display: inline-block;" title=""></div>     
<div id="HighestLivingRoomToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>




<div id="HighestTeplota3Today_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>




<div id="HighestBedRoomToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>          
<div id="HighestBaroToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<hr><center><h2>Dnešné minimum</h2><hr>
<div id="LowestOutsideToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>    
<div id="LowestLivingRoomToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>







<div id="LowestTeplota3Today_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>




<div id="LowestBedRoomToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>          
<div id="LowestBaroToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<hr><center><h2>Priemer - 7 dní</h2><hr>
<div id="AvgOutside_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>  
<div id="AvgLivingRoom_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>





<div id="AvgTepota3_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>




<div id="AvgBedRoom_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>          
<div id="AvgBaro_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
 <hr><center><h2>Najvyššie hodnoty vôbec</h2><hr> 
 <div id="HighestOutside_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<div id="HighestLivingRoom_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>





<div id="HighestTeplota3_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>





<div id="HighestBedRoom_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<div id="HighestBaro_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div> 
<hr><center><h2>Najnižšie hodnoty vôbec</h2><hr> 
 <div id="LowestOutside_chart_div" style="width: auto; height: auto; display: inline-block;"></div>
<div id="LowestLivingRoom_chart_div" style="width: auto; height: auto; display: inline-block;"></div>






<div id="LowestTeplota3_chart_div" style="width: auto; height: auto; display: inline-block;"></div>





<div id="LowestBedRoom_chart_div" style="width: auto; height: auto; display: inline-block;"></div>
<div id="LowestBaro_chart_div" style="width: auto; height: auto; display: inline-block;"></div>       
         </center>
</div>
									
								</div>
							</div>
					
						</div>	
			<!-- END MAIN CONTENT -->
		</div>
    <div style="background-color: #196F3D; border-radius: 25px; color: white;"><center>Vytvoril: <a href="https://www.facebook.com/martin.s.chlebovec"><font color="white"><u>Martin Chlebovec</u></font></a></center></div>		
		<!-- END MAIN -->
		<div class="clearfix"></div>
	
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
<?php
include ("js_files.php");
?>	
	
</body>
<?php 
include ("js_realtime.php");
?>

</html>
<?php }else{
	header("Location: ../index.php");
	
} ?>
