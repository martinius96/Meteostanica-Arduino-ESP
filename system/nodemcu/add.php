<?php 
$con = mysqli_connect("localhost","POUZIVATEL","PASSWORD","NAZOV_DB");
     mysqli_set_charset($con,"utf8");
                             
if (mysqli_connect_errno())
  {
  echo "Problem s napojenim na MySQL: " . mysqli_connect_error();
  }
 // $zmazat = mysqli_query($con,"DELETE FROM vencurik WHERE date(time) < CURDATE() - INTERVAL 30 day") or die(mysqli_error($con));
 $teplota1 = mysqli_real_escape_string($con, $_GET['teplota1']);
 $teplota2 = mysqli_real_escape_string($con, $_GET['teplota2']);
 $teplota3 = mysqli_real_escape_string($con, $_GET['teplota3']);
 $tlak = mysqli_real_escape_string($con, $_GET['tlak']);
 $vlhkost = mysqli_real_escape_string($con, $_GET['vlhkost']);
$ins = mysqli_query($con,"INSERT INTO `vencurik` (`teplota1`,`teplota2`,`teplota3`,`tlak`,`vlhkost`) VALUES ('$teplota1', '$teplota2', '$teplota3', '$tlak', '$vlhkost')") or die (mysqli_error($con));
   
?>
