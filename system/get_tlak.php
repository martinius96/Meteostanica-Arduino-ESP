<?php
include 'connect.php';

 	$tlak = mysqli_query($con,"SELECT tlak FROM vencurik ORDER BY id DESC LIMIT 1") or die(mysqli_error($con));
		while($line = mysqli_fetch_assoc($tlak)){
		
			echo $line['tlak'];

		}  ?>

