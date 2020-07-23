<?php
include 'connect.php';

 	$teplota1 = mysqli_query($con,"SELECT teplota1 FROM vencurik ORDER BY id DESC LIMIT 1") or die(mysqli_error($con));
		while($line = mysqli_fetch_assoc($teplota1)){
		
			$prvateplota = $line['teplota1'];

		}
		$teplota1druha = mysqli_query($con,"SELECT teplota1 FROM vencurik WHERE id=(SELECT MAX(id)-1 FROM vencurik)") or die(mysqli_error($con));
		while($line = mysqli_fetch_assoc($teplota1druha)){
		
			$druhateplota =$line['teplota1'];

		} 
		 if($prvateplota<$druhateplota) {
  $result = abs($prvateplota - $druhateplota);  
    $result = round($result, 2);
  $down = '<img src="http://www.stickpng.com/assets/images/58f8bd2e0ed2bdaf7c128309.png" alt="Down" title="Klesajúca tendencia o: ' 
. $result . '°C" height="32" width="32">';
   
  echo $down; }
   if($prvateplota>$druhateplota) {
   $result = abs($prvateplota - $druhateplota);
     $result = round($result, 2);
   $up = '<img src="https://cdn3.iconfinder.com/data/icons/musthave/256/Stock%20Index%20Up.png"alt="Up" title="Stúpajúca - tendencia o: ' 
. $result . '°C" height="32" width="32">';
   
echo $up;
  }
if($prvateplota==$druhateplota) { 
  $tie = '<img src="https://image.flaticon.com/icons/svg/179/179385.svg" alt="Tie" title="Ustálená - Rozdiel 0°C" height="32" width="32">';  
  echo $tie; }
?>


 