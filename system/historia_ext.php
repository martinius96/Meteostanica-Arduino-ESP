<?php
session_start();
  if ($_SESSION['login']===true){
?>
<!doctype html>
<html lang="sk">

<head>
<?php 
include ("meta.php");
?>
	<?php


	//$zmazat = mysqli_query($con,"DELETE FROM parketstyle WHERE time < CURRENT_TIMESTAMP - 14*24*3600") or die(mysqli_error($con));
?>

</head>
<?php $stranka = "Historia";?>
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
							<h2><font color="black">História záznamov - kompletný</font></h2>
								
	  
	<table style="width: 100%;" class="flat-table flat-table-3">
									 <tr>
									 <th style="width: 16.66%;">Čas</th>
									 <th style="width: 16.66%;"><?php echo file_get_contents("nazvyperiferii/teplomer1.txt");?></th>
									 <th style="width: 16.66%;"><?php echo file_get_contents("nazvyperiferii/teplomer2.txt");?></th>
									 <th style="width: 16.66%;"><?php echo file_get_contents("nazvyperiferii/teplomer3.txt");?></th>
									 <th style="width: 16.66%;"><?php echo file_get_contents("nazvyperiferii/barometer.txt");?></th>
									 <th style="width: 16.66%;"><?php echo file_get_contents("nazvyperiferii/vlhkomer.txt");?></th>
									 
									 </tr>
<?php
 	$teploty = mysqli_query($con,"SELECT * FROM vencurik ORDER BY id DESC") or die(mysqli_error($con));   
  $teploty2 = mysqli_query($con,"SELECT * FROM vencurik ORDER BY id DESC") or die(mysqli_error($con));   
		mysqli_fetch_assoc($teploty2);
    while(($line = mysqli_fetch_assoc($teploty))&&($line2 = mysqli_fetch_assoc($teploty2))){
			echo "<tr>";
				$casik = date('d. M H:i',strtotime($line['time']));			
       echo "<td><i>". $casik . "</i></td>";
       $vysledok1 = $line['teplota1']- $line2['teplota1'];
       if($vysledok1==0.00){
         $vysledok1 = "<img src='https://image.flaticon.com/icons/svg/179/179385.svg' height='32px' width='32px' title='Ustálená hodnota: ".number_format((float)$vysledok1, 2, '.', '')." °C'>";
       }else if($vysledok1>0.00){  
           $vysledok1 = "<img src='https://cdn3.iconfinder.com/data/icons/musthave/256/Stock%20Index%20Up.png' height='32px' width='32px' title='Stúpajúca tendencia o: ".number_format((float)$vysledok1, 2, '.', '')." °C'>";
       }else if($vysledok1<0.00){
          $vysledok1 = "<img src='http://www.stickpng.com/assets/images/58f8bd2e0ed2bdaf7c128309.png' height='32px' width='32px' title='Klesajúca tendencia o: ".number_format((float)$vysledok1, 2, '.', '')." °C'>";
       }
       $vysledok2 = $line['teplota2']- $line2['teplota2'];
       if($vysledok2==0.00){
         $vysledok2 = "<img src='https://image.flaticon.com/icons/svg/179/179385.svg' height='32px' width='32px' title='Ustálená hodnota: ".number_format((float)$vysledok2, 2, '.', '')." °C'>";
       }else if($vysledok2>0.00){  
           $vysledok2 = "<img src='https://cdn3.iconfinder.com/data/icons/musthave/256/Stock%20Index%20Up.png' height='32px' width='32px' title='Stúpajúca tendencia o: ".number_format((float)$vysledok2, 2, '.', '')." °C'>";
       }else if($vysledok2<0.00){
          $vysledok2 = "<img src='http://www.stickpng.com/assets/images/58f8bd2e0ed2bdaf7c128309.png' height='32px' width='32px' title='Klesajúca tendencia o: ".number_format((float)$vysledok2, 2, '.', '')." °C'>";
       }
       $vysledok3 = $line['teplota3']- $line2['teplota3'];
       if($vysledok3==0.00){
         $vysledok3 = "<img src='https://image.flaticon.com/icons/svg/179/179385.svg' height='32px' width='32px' title='Ustálená hodnota: ".number_format((float)$vysledok3, 2, '.', '')." °C'>";
       }else if($vysledok3>0.00){  
           $vysledok3 = "<img src='https://cdn3.iconfinder.com/data/icons/musthave/256/Stock%20Index%20Up.png' height='32px' width='32px' title='Stúpajúca tendencia o: ".number_format((float)$vysledok3, 2, '.', '')." °C'>";
       }else if($vysledok3<0.00){
          $vysledok3 = "<img src='http://www.stickpng.com/assets/images/58f8bd2e0ed2bdaf7c128309.png' height='32px' width='32px' title='Klesajúca tendencia o: ".number_format((float)$vysledok3, 2, '.', '')." °C'>";
       }
       $vysledokt = $line['tlak']- $line2['tlak'];
       if($vysledokt==0.00){
         $vysledokt = "<img src='https://image.flaticon.com/icons/svg/179/179385.svg' height='32px' width='32px' title='Ustálená hodnota: ".number_format((float)$vysledokt, 2, '.', '')." hPa'>";
       }else if($vysledokt>0.00){  
           $vysledokt = "<img src='https://cdn3.iconfinder.com/data/icons/musthave/256/Stock%20Index%20Up.png' height='32px' width='32px' title='Stúpajúca tendencia o: ".number_format((float)$vysledokt, 2, '.', '')." hPa'>";
       }else if($vysledokt<0.00){
          $vysledokt = "<img src='http://www.stickpng.com/assets/images/58f8bd2e0ed2bdaf7c128309.png' height='32px' width='32px' title='Klesajúca tendencia o: ".number_format((float)$vysledokt, 2, '.', '')." hPa'>";
       }
       $vysledokh = $line['vlhkost']- $line2['vlhkost'];
       if($vysledokh==0.00){
         $vysledokh = "<img src='https://image.flaticon.com/icons/svg/179/179385.svg' height='32px' width='32px' title='Ustálená hodnota: ".number_format((float)$vysledokh, 2, '.', '')." %'>";
       }else if($vysledokh>0.00){  
           $vysledokh = "<img src='https://cdn3.iconfinder.com/data/icons/musthave/256/Stock%20Index%20Up.png' height='32px' width='32px' title='Stúpajúca tendencia o: ".number_format((float)$vysledokh, 2, '.', '')." %'>";
       }else if($vysledokh<0.00){
          $vysledokh = "<img src='http://www.stickpng.com/assets/images/58f8bd2e0ed2bdaf7c128309.png' height='32px' width='32px' title='Klesajúca tendencia o: ".number_format((float)$vysledokh, 2, '.', '')." %'>";
       }
			echo "<td><i>" . $line['teplota1'] . " °C " .$vysledok1. "</i></td>"; 
      echo "<td><i>" . $line['teplota2'] . " °C " .$vysledok2. "</i></td>"; 
	  echo "<td><i>" . $line['teplota3'] . " °C " .$vysledok3. "</i></td>"; 
	  echo "<td><i>" . $line['tlak'] . " hPa "  .$vysledokt.  "</i></td>";
	  echo "<td><i>" . $line['vlhkost'] . " % "  .$vysledokh.  "</i></td>";
			echo "</tr>";
		}  ?> </tbody></table>
								
								</div>
							</div>
					
						</div>
			<!-- END MAIN CONTENT -->
		</div>
    				<div style="background-color: #FF6800; border-radius: 25px; color: white;"><center>Vytvoril: <a href="https://www.facebook.com/martin.s.chlebovec"><font color="white"><u>Martin Chlebovec</u></font></a></center></div>	
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
