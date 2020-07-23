<?php
error_reporting(0);
    session_start();
  $_SESSION['login']===false;
  session_unset(); 

// destroy the session 
session_destroy(); 
   header('LOCATION: ../index.php'); die();
?>