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
include ("connect.php");
?>
	
</head>
<?php $stranka = "Prognoza";?>
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
					  <center> 
             <hr><h3>BETA - PROGNOZA Z NAMERANYCH DAT (validné iba s relatívnym tlakom prepočítačným na hladinu mora)</h3><hr><div style="width: 50%; border-style: solid;" >
 <b>K: </b><?php $cas = mysqli_query($con,"SELECT * FROM vencurik WHERE id=(SELECT MAX(id) FROM vencurik)") or die(mysqli_error($con));
while($line = mysqli_fetch_assoc($cas)){
    $casik = date('d. M H:i',strtotime($line['time']));	
    echo $casik."<br>";  }?></legend>
		    
		
		
	

   
 <?php  
$summer1 = strtotime("01 May");
$summer2 = strtotime("30 September");
$winter1 = strtotime("01 October");
$winter2 = strtotime("30 April");
$today = time();
//TEMP--------------------------------------------------------
$temperatureOutside = mysqli_query($con,"SELECT `teplota2`, `time` FROM `vencurik` ORDER BY `time` DESC LIMIT 1") or die(mysqli_error($con));
while($line = mysqli_fetch_assoc($temperatureOutside)){
$temperature = $line['teplota2'];
}
//PRESSURE--------------------------------------------------------------------
$pressureOutside = mysqli_query($con,"SELECT * FROM vencurik WHERE id=(SELECT MAX(id) FROM vencurik)") or die(mysqli_error($con));
while($line = mysqli_fetch_assoc($pressureOutside)){
$pressure = $line['tlak'];}
$pressureOutsidesecond = mysqli_query($con,"SELECT * FROM vencurik WHERE id=(SELECT MAX(id)-1 FROM vencurik)") or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($pressureOutsidesecond)){
$secondpressure = $row['tlak'];	
  }
//END PRESSURE--------------------------------------------------------------------  
if($summer1 <= $today && $today <= $summer2)
{  echo 'Obdobie: 1. máj - 30. september - leto/jeseň<br />'; 
echo 'Nameraná hodnota: ';   
   echo '<b>'.$pressure.'</b>';      
   echo  '<br />';       
$burky = range(900,999.99, 0.01);
$nepriaznivo_prehanky_veterno_chladno = range(1000,1011.99, 0.01);
$striedavo_oblacno_sklon_k_zrazkam_pri_vyssej_teplote = range(1012,1014.99, 0.01);
$striedavo_zlepsenie = range(1015,1020.99, 0.01);
$oblacno_mala_pravdepodobnost_zrazok = range(1021,1027.99, 0.01);
$pekne_sucho = range(1028,1100, 0.01);
//KONIEC INSTANCII
if(MIN($burky) <= $pressure && $pressure <=  MAX($burky))  //0
{
if($pressure>=$secondpressure) {echo 'Očakáva sa búrka';}
if($pressure<$secondpressure) {echo 'Zvrat počasia, búrky, ochladenie';}
}
if(MIN($nepriaznivo_prehanky_veterno_chladno) <= $pressure && $pressure <=  MAX($nepriaznivo_prehanky_veterno_chladno))    //1
{
if($pressure>=$secondpressure) {echo 'Sklon k búrkam, zmena počasia málo pravdepodobná';}
if($pressure<$secondpressure) {echo 'Oblačnosť, veľké teplo, sklon k zrážkam, búrkam, zvrat pravdepodobný';}
}
if(MIN($striedavo_oblacno_sklon_k_zrazkam_pri_vyssej_teplote) <= $pressure && $pressure <=  MAX($striedavo_oblacno_sklon_k_zrazkam_pri_vyssej_teplote)) //2
{
if($pressure>=$secondpressure) {echo 'Striedavo/oblacno, sklon k zražkam pri vyššej teplote, pri vysokej teplote burky';}
if($pressure<$secondpressure) {echo 'Striedavo/oblačno, sucho, pri teplote vyššej burky';}

}
if(MIN($striedavo_zlepsenie) <= $pressure && $pressure <=  MAX($striedavo_zlepsenie))   //3
{
if($pressure>=$secondpressure) {echo 'Polojasno, možné prehánky i búrky';}
if($pressure<$secondpressure) {echo 'Polojasno, sklon k prehánkam i búrkam';}

}
if(MIN($oblacno_mala_pravdepodobnost_zrazok) <= $pressure && $pressure <=  MAX($oblacno_mala_pravdepodobnost_zrazok))  //4
{
if($pressure>=$secondpressure) {echo 'Malá pravdepodobnosť zrážok, chladnejšie';}
if($pressure<$secondpressure) {echo 'Striedavo/oblačno, miestami slabé prehánky, búrky';}

}
if(MIN($pekne_sucho) <= $pressure && $pressure <=  MAX($pekne_sucho))   //5
{
if($pressure>=$secondpressure) {echo 'Pekné počasie, teplota normálna';}
 if($pressure<$secondpressure) {echo 'Jasno, sucho, teplota normál';}

}
}
else
{   echo 'Obdobie: 1. október - 30. apríl - zima/jar <br />';     
$burky = range(900,986.99, 0.01);
$zamracene_zrazky_pri_rychlom_stupani_tlaku_zlepsenie = range(987,999.99, 0.01);
$zamracene_sklon_k_zrazkam_pri_rychlom_stupani_tlaku_zlepsenie_ochladenie = range(1000,1012.99, 0.01);
$hmly_pretrvava_doterajsie_pocasie_mala_pravdepodobnost_zrazok = range(1013,1027.99, 0.01);
$bez_zrazok_mrazy_pri_pomalom_stupani_zrazky_pri_rychlom_zlepsenie_pri_pomalom_zhorsenie_zrazky = range(1028,1100, 0.01);
if(MIN($burky) <= $pressure && $pressure <=  MAX($burky))
{
if($pressure>=$secondpressure) {echo 'Búrky/Silný vietor - víchrica';}
 if($pressure<$secondpressure) {echo 'Búrky/Silný vietor - víchrica';}
}
if(MIN($zamracene_zrazky_pri_rychlom_stupani_tlaku_zlepsenie) <= $pressure && $pressure <=  MAX($zamracene_zrazky_pri_rychlom_stupani_tlaku_zlepsenie))
{
if($pressure>=$secondpressure) {echo 'Zamračené, zrážky, zlepšenie počasia';}
 if($pressure<$secondpressure) {echo 'Oteplenie, odmäk, môžnosť zrážok, veterno';}
}
if(MIN($zamracene_sklon_k_zrazkam_pri_rychlom_stupani_tlaku_zlepsenie_ochladenie) <= $pressure && $pressure <=  MAX($zamracene_sklon_k_zrazkam_pri_rychlom_stupani_tlaku_zlepsenie_ochladenie))
{
if($pressure>=$secondpressure) {echo 'Sklon k zrážkam, mierne zlepšenie';}
 if($pressure<$secondpressure) {echo 'Malá zmena počasia, oteplenie, veterno';}
}
if(MIN($hmly_pretrvava_doterajsie_pocasie_mala_pravdepodobnost_zrazok) <= $pressure && $pressure <=  MAX($hmly_pretrvava_doterajsie_pocasie_mala_pravdepodobnost_zrazok))
{
if($pressure>=$secondpressure) {echo 'Ustálené počasie, hmly';}
 if($pressure<$secondpressure) {echo 'Oblačnosť, bez silnejších zrážok, oteplenie, hmly';}
}
if(MIN($bez_zrazok_mrazy_pri_pomalom_stupani_zrazky_pri_rychlom_zlepsenie_pri_pomalom_zhorsenie_zrazky) <= $pressure && $pressure <=  MAX($bez_zrazok_mrazy_pri_pomalom_stupani_zrazky_pri_rychlom_zlepsenie_pri_pomalom_zhorsenie_zrazky))
{
if($pressure>=$secondpressure) {echo 'Bez zrážok, mrazy, za slabého vetra hmly';}
 if($pressure<$secondpressure) {echo 'Bez zrážok, ustálené počasie, hmly.';}
}
}
?>
			
			  </div>
			  </center>
									
								</div>
							</div>
					
						</div>
			<!-- END MAIN CONTENT -->
		</div>
    			 <div style="background-color: #5DADE2; border-radius: 25px; color: white;"><center>Vytvoril: <a href="https://www.facebook.com/martin.s.chlebovec"><font color="white"><u>Martin Chlebovec</u></font></a></center></div>
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
