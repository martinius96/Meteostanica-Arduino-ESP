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
<?php $stranka = "Log";?>
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
					<div class="row">
						<div class="col-md-12">
							<!-- TABLE STRIPED -->
							<div class="panel">
							<div class="panel-body">
								<h2><font color="black">Neúspešné prihlásenia</font></h2>
							
								  <?php 
             echo nl2br(file_get_contents('../logy/neuspesneprihlasenia.txt'));     
             ?>
         
			<center> 
		
			<a href="zmazatlog.php" class="btn btn-success">Zmazať log prihlásení</a>	</center>
									
								</div>
							</div>
					
						</div>
			<!-- END MAIN CONTENT -->
		</div>
    <div style="background-color: #641E16; border-radius: 25px; color: white;"><center>Vytvoril: <a href="https://www.facebook.com/martin.s.chlebovec"><font color="white"><u>Martin Chlebovec</u></font></a></center></div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
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
