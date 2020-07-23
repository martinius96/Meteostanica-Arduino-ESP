<?php
include 'connect.php';

 	$teplota3 = mysqli_query($con,"SELECT teplota3 FROM vencurik ORDER BY id DESC LIMIT 1") or die(mysqli_error($con));
		while($line = mysqli_fetch_assoc($teplota3)){
		
			echo $line['teplota3'];

		}  ?>

