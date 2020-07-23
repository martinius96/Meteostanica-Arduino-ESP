<?php
include 'connect.php';
$today = date("Y-m-d H:i:s");







$casik = mysqli_query($con,"SELECT time FROM vencurik ORDER BY id DESC LIMIT 1") or die(mysqli_error($con));
		while($line = mysqli_fetch_assoc($casik)){
		
		
			$was =$line['time'];

		}

$vypocet =(strtotime($today)-strtotime($was));
if($vypocet>=350){
	  echo "<img src='https://image.flaticon.com/icons/svg/190/190406.svg' title='Odpojené' height='32px' width='32px'>" ;
	  	
}else{
 echo "<img src='https://image.flaticon.com/icons/svg/190/190411.svg' title='Pripojené' height='32px' width='32px'>";
	
} 
?>