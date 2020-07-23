<?php
include 'connect.php';

 	$teplota1 = mysqli_query($con,"SELECT teplota1 FROM vencurik ORDER BY id DESC LIMIT 1") or die(mysqli_error($con));
		while($line = mysqli_fetch_assoc($teplota1)){
		
			echo $line['teplota1'];

		}  ?>

