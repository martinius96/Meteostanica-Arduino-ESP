<?php
include 'connect.php';

 	$cas = mysqli_query($con,"SELECT time FROM vencurik ORDER BY id DESC LIMIT 1") or die(mysqli_error($con));
		while($line = mysqli_fetch_assoc($cas)){
		
		$casik = date('d. M H:i',strtotime($line['time']));	
			 echo $casik;

		}  ?>

