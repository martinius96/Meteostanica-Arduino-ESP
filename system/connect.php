<?php 
 $con = mysqli_connect("localhost","POUZIVATEL","PASSWORD","NAZOV_DB");
     mysqli_set_charset($con,"utf8");
     
if (mysqli_connect_errno())
  {
  echo "Problém s napojením na MySQL: " . mysqli_connect_error();
  } ?>
