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
<?php $stranka = "Zapojenie";?>
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
 <h2>Arduino + BMP280 + DHT22 + DS18B20:</h2>
 <img src="https://i.imgur.com/sMJskFE.png" style="display: block; max-width: 100%; height: auto;" alt="Schéma zapojenia - meteostanica - Arduino (Ethernet W5100/W5500) + BMP280 + DS18B20" title="Schéma zapojenia - meteostanica - Arduino (Ethernet W5100/W5500) + BMP280 + DS18B20">
 <table style="width: 100%;" class="flat-table flat-table-1">
      <tr><th>Periféria</th><th>Arduino</th></tr>
      <tr><td>DS18B20</td><td>D8</td></tr>
      <tr><td>DHT22</td><td>D2</td></tr>
      <tr><td>BMP280 - SDA</td><td>A4 (Hardware SDA)</td></tr>
      <tr><td>BMP280 - SCL</td><td>A5 (Hardware SCL)</td></tr>
      </table>
      <h2>Arduino + BME280 + DS18B20:</h2>
       <img src="https://i.imgur.com/z2254a7.png" style="display: block; max-width: 100%; height: auto;" alt="Schéma zapojenia - meteostanica - Arduino (Ethernet W5100/W5500) + BME280 + DS18B20 + DHT22" title="Schéma zapojenia - meteostanica - Arduino (Ethernet W5100/W5500) + BME280 + DS18B20 + DHT22">
  <table style="width: 100%;" class="flat-table flat-table-1">
      <tr><th>Periféria</th><th>Arduino</th></tr>
      <tr><td>DS18B20</td><td>D8</td></tr>
      <tr><td>BME280 - SDA</td><td>A4 (Hardware SDA)</td></tr>
      <tr><td>BME280 - SCL</td><td>A5 (Hardware SCL)</td></tr>
      </table>
 <h2>NodeMCU + BMP280 + DHT22 + DS18B20:</h2>
 <img src="https://i.imgur.com/AyyBSra.png" style="display: block; max-width: 100%; height: auto;" alt="Schéma zapojenia - meteostanica - ESP8266 + BMP280 + DS18B20" title="Schéma zapojenia - meteostanica - ESP8266 + BMP280 + DS18B20">
   <table style="width: 100%;" class="flat-table flat-table-2">
      <tr><th>Periféria</th><th>ESP8266 (NodeMCU)</th></tr>
      <tr><td>DS18B20</td><td>D3 (GPIO 0)</td></tr>
      <tr><td>DHT22</td><td>D5 (GPIO 14)</td></tr>
      <tr><td>BMP280 - SDA</td><td>D2 (GPIO 4) (Hardware SDA)</td></tr>
      <tr><td>BMP280 - SCL</td><td>D1 (GPIO 5) (Hardware SCL)</td></tr>
      </table>
       <h2>NodeMCU + BME280 + DS18B20:</h2>
        <img src="https://i.imgur.com/gL3FFpP.png" style="display: block; max-width: 100%; height: auto;" alt="Schéma zapojenia - meteostanica - ESP8266 + BME280 + DS18B20 + DHT22" title="Schéma zapojenia - meteostanica - ESP8266 + BME280 + DS18B20 + DHT22">
       <table style="width: 100%;" class="flat-table flat-table-2">
      <tr><th>Periféria</th><th>ESP8266 (NodeMCU)</th></tr>
      <tr><td>DS18B20</td><td>D3 (GPIO 0)</td></tr>
      <tr><td>BME280 - SDA</td><td>D2 (GPIO 4) (Hardware SDA)</td></tr>
      <tr><td>BME280 - SCL</td><td>D1 (GPIO 5) (Hardware SCL)</td></tr>
      </table>
<h2>ESP32 + BMP280 + DHT22 + DS18B20:</h2>
<img src="https://i.imgur.com/OCqmDPv.png" style="display: block; max-width: 100%; height: auto;" alt="Schéma zapojenia - meteostanica - ESP32 + BMP280 + DS18B20" title="Schéma zapojenia - meteostanica - ESP32 + BMP280 + DS18B20">
 <table style="width: 100%;" class="flat-table flat-table-3">
      <tr><th>Periféria</th><th>ESP32 (Devkit v1)</th></tr>
      <tr><td>DS18B20</td><td>D23</td></tr>
      <tr><td>DHT22</td><td>D19</td></tr>
      <tr><td>BMP280 - SDA</td><td>D21 (Hardware SDA)</td></tr>
      <tr><td>BMP280 - SCL</td><td>D22 (Hardware SCL)</td></tr>
      </table>    
<h2>ESP32 + BME280 + DS18B20:</h2>
<img src="https://i.imgur.com/ehTWE0m.png" style="display: block; max-width: 100%; height: auto;" alt="Schéma zapojenia - meteostanica - ESP32 + BME280 + DS18B20 + DHT22" title="Schéma zapojenia - meteostanica - ESP32 + BME280 + DS18B20 + DHT22">
     <table style="width: 100%;" class="flat-table flat-table-3">
      <tr><th>Periféria</th><th>ESP32 (Devkit v1)</th></tr>
      <tr><td>DS18B20</td><td>D23</td></tr>
      <tr><td>BME280 - SDA</td><td>D21 (Hardware SDA)</td></tr>
      <tr><td>BME280 - SCL</td><td>D22 (Hardware SCL)</td></tr>
      </table>
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
