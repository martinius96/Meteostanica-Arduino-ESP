<?php
error_reporting(0);
session_start();
  if ($_SESSION['login']===true){
?>
<!doctype html>
<html lang="sk">

<head>
<?php 
include ("meta.php");
?>
	
</head>
<?php $stranka = "Zmena";?>
<body>
	<!-- WRAPPER -->
	<div id="wrapper">
	
	<?php 
include ("menu.php");
?>	
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
							<!-- TABLE STRIPED -->
							<div class="panel">
							<div class="panel-body">
							<h2><font color="black">Zmena názvov pre periférie</font></h2>  
              <?php  
              if(isset($_POST['zmenbarometer'])){
                $barometer = $_POST['barometer'];
                file_put_contents(__DIR__ . '/nazvyperiferii/barometer.txt', $barometer);
              echo '<div class="alert alert-success"><strong>Názov  pre barometer úspešne zmenený!</strong></div>';
              }   
              if(isset($_POST['zmenvlhkomer'])){
                $vlhkomer = $_POST['vlhkomer'];
                file_put_contents(__DIR__ . '/nazvyperiferii/vlhkomer.txt', $vlhkomer);
                echo '<div class="alert alert-success"><strong>Názov pre vlhkomer úspešne zmenený!</strong></div>';
              }
              if(isset($_POST['zmenteplotu1'])){
                $teplota1 = $_POST['teplota1'];
                file_put_contents(__DIR__ . '/nazvyperiferii/teplomer1.txt', $teplota1);
                echo '<div class="alert alert-success"><strong>Názov pre teplomer č. 1 úspešne zmenený!</strong></div>';
              }
              if(isset($_POST['zmenteplotu2'])){
                $teplota2 = $_POST['teplota2'];
                file_put_contents(__DIR__ . '/nazvyperiferii/teplomer2.txt', $teplota2);
                echo '<div class="alert alert-success"><strong>Názov pre teplomer č. 2 úspešne zmenený!</strong></div>';
              }
              if(isset($_POST['zmenteplotu3'])){
                $teplota3 = $_POST['teplota3'];
                file_put_contents(__DIR__ . '/nazvyperiferii/teplomer3.txt', $teplota3);
                echo '<div class="alert alert-success"><strong>Názov pre teplomer č. 3 úspešne zmenený!</strong></div>';
              }
            ?>   
               <div class="row">
               <div class="col-md-4">
               <center>      
               <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
               <input name="teplota1" style="text-align: center" placeholder="<?php echo file_get_contents("nazvyperiferii/teplomer1.txt"); ?>" type="text" required><br>
               <input type="submit" name="zmenteplotu1" class="btn btn-success" value="Zmeniť">    
               </form>    
               </center>  
               </div>
               <div class="col-md-4">
               <center>      
               <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
               <input name="teplota2" style="text-align: center" placeholder="<?php echo file_get_contents("nazvyperiferii/teplomer2.txt"); ?>" type="text" required><br>
               <input type="submit" name="zmenteplotu2" class="btn btn-success" value="Zmeniť">          
               </form>
               </center>
               </div>
               <div class="col-md-4">
               <center>      
               <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
               <input name="teplota3" style="text-align: center" placeholder="<?php echo file_get_contents("nazvyperiferii/teplomer3.txt"); ?>" type="text" required><br>
               <input type="submit" name="zmenteplotu3" class="btn btn-success" value="Zmeniť">          
               </form>    
               </center> 
               </div>
               </div>
               <br>
               <hr>
               <div class="row">
               <div class="col-md-4">
               <center> 
               <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
               <input name="barometer" style="text-align: center" placeholder="<?php echo file_get_contents("nazvyperiferii/barometer.txt"); ?>" type="text" required><br>
               <input type="submit" name="zmenbarometer" class="btn btn-danger" value="Zmeniť">          
               </form>     
               </center>
               </div>
               <div class="col-md-4">
               </div>
               <div class="col-md-4">
               <center>
               <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
               <input name="vlhkomer" style="text-align: center" placeholder="<?php echo file_get_contents("nazvyperiferii/vlhkomer.txt"); ?>" type="text" required><br>
               <input type="submit" name="zmenvlhkomer" class="btn btn-danger" value="Zmeniť">
               </form>
               </center>								
						   </div>
               </div>
							 </div>
					
						</div>
			<div style="background-color: #7D3C98; border-radius: 25px; color: white;"><center>Vytvoril: <a href="https://www.facebook.com/martin.s.chlebovec"><font color="white"><u>Martin Chlebovec</u></font></a></center></div>			
			<!-- END MAIN CONTENT -->
		<!-- END MAIN -->
		<div class="clearfix"></div>
  </div>
  </div>
  </div>
  </div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
<?php
include ("js_files.php");
?>	
	
</body>
<script>
       setInterval(function(){
    $.get('get_cas.php', function(data){
        $('#poslednateplotacas').text(data)
    });
},2000);   
</script>
<?php 
include ("js_realtime.php");
?>

</html>
<?php }else{
	header("Location: ../index.php");
	
} ?>
