<?php
include 'connect.php';

 	$teplota2 = mysqli_query($con,"SELECT teplota2 FROM vencurik ORDER BY id DESC LIMIT 1") or die(mysqli_error($con));
		while($line = mysqli_fetch_assoc($teplota2)){
		
			echo $line['teplota2'];

		}  ?>

