<?php
include 'connect.php';

 	$vlhkost = mysqli_query($con,"SELECT vlhkost FROM vencurik ORDER BY id DESC LIMIT 1") or die(mysqli_error($con));
		while($line = mysqli_fetch_assoc($vlhkost)){
		
			echo $line['vlhkost'];

		}  ?>

