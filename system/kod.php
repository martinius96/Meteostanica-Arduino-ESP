<?php
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
<?php $stranka = "Kod";?>
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
							<hr> 
              <h2><font color="black">Zdrojové kódy na vyskúšanie (odoslanie na webstránku)  - HTTP protokol</font></h2>
							<hr>        
   <div class="alert alert-info">
   <h4><font color="black">Projekt je dostupný zdarma pod MIT licenciou!</font></h4>
  <strong><font color="red">Stiahnutím a používaním projektu súhlasíte s licenciou a zaväzujete sa ju dodržiavať. V prípade porušenia si uvedomujete právne následky.</font></strong>
</div>
   <div class="alert alert-success">
  <strong>Projekt je dostupný v archíve na Githube: </strong> <a href="https://github.com/martinius96/Meteostanica-Arduino-ESP">TU</a>
</div>
							</div>
							</div>
					
						</div>
		<!-- END MAIN CONTENT -->			
    </div>
    		<div style="background-color: #F5B041; border-radius: 25px; color: white;"><center>Vytvoril: <a href="https://www.facebook.com/martin.s.chlebovec"><font color="white"><u>Martin Chlebovec</u></font></a></center></div>	
		<!-- END MAIN -->
		<div class="clearfix"></div>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
<?php
include ("js_files.php");
?>	
	
</body>

<?php 
include ("js_realtime.php");
?>

</html>
<?php }else{
	header("Location: ../index.php");
	
} ?>
