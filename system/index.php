<?php
error_reporting(0);
?>
<!doctype html>
<html lang="sk">

<head>
<?php 
include ("meta.php");
?>
</head>
<?php $stranka = "Dashboard";?>
<body onload="myFunction()">
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
								<div class="alert alert-danger">
  <strong>Vo verzii projektu zdarma nie je funkcionalita automatickej obnovy nameraných údajov v prehľade dostupná. 
Musíte vykonávať manuálny refresh pre získanie aktuálne nameraných údajov.</strong> V prípade záujmu o kúpu verzie bez obmedzení: martinius96@gmail.com
</div>	
									<h2>Údaje</h2>
                  <table class="table table-striped flat-table flat-table-1" style="color: black;">									
										<thead>
										<tr>
    <th><strong>Umiestnenie</strong></th>
    <th><strong>Hodnota</strong></th>
	<th><strong>Čas</strong></th>
	<th><strong>Tendencia</strong></th>
  </tr>
   <tr>
    <td><h3 ><font color="black"><img src="https://image.flaticon.com/icons/svg/603/603463.svg" width=32px height=32px> <b id="nazovteplomer1"></b></font></h3></td>
    <td id="stavteplota1"> </td>
	<td id="casteplota1"> </td>
	<td id="tendenciateplota1"> </td>
  </tr>
  <tr>
    <td><h3 ><font color="black"><img src="https://image.flaticon.com/icons/svg/603/603463.svg" width=32px height=32px> <b id="nazovteplomer2"></b></font></h3></td>
    <td id="stavteplota2"> </td>
	<td id="casteplota2"> </td>
	<td id="tendenciateplota2"> </td>
  </tr>    
  <tr>
    <td><h3 ><font color="black"><img src="https://image.flaticon.com/icons/svg/603/603463.svg" width=32px height=32px> <b id="nazovteplomer3"></b></font></h3></td>
    <td id="stavteplota3"> </td>
	<td id="casteplota3"> </td>
	<td id="tendenciateplota3"> </td>
  </tr>
   <tr>
    <td><h3 ><font color="black"><img src="https://image.flaticon.com/icons/svg/291/291468.svg" width=32px height=32px> <b id="nazovbarometer"></b></font></h3></td>
    <td id="stavbarometer"> </td>
	<td id="casbarometer"> </td>
	<td id="tendenciabarometer"> </td>
  </tr>
   <tr>
    <td><h3 ><font color="black"><img src="https://image.flaticon.com/icons/svg/728/728093.svg" width=32px height=32px> <b id="nazovvlhkomer"></b></font></h3></td>
    <td id="stavvlhkomer"> </td>
	<td id="casvlhkomer"> </td>
	<td id="tendenciavlhkomer"> </td>
  </tr>
  
										<tr>
    <td><font color="black"><h5><img src="https://image.flaticon.com/icons/svg/173/173039.svg" width=32px height=32px> <b>Arduino / ESP</b></font></h5></td>
    <td>ISP: <img src="https://static-s.aa-cdn.net/img/ios/582997807/a380f7067f35e3661eb41a242ee7b252?v=1" width=32px height=32px style="border-radius: 50px;" title="Slovak Telekom 120/12Mbps DW/UP optika" alt="Slovak Telekom 120/12Mbps DW/UP optika"></td>
    <td id="poslednateplotacas"></td>
  <td id="stavnodemcu"></td>
  </tr></table>
									</tbody>
									</table>
								</div>
							</div>
					
						</div>
			<!-- END MAIN CONTENT -->
		</div>
    	<div style="background-color: #C0392B; border-radius: 25px; color: white;"><center>Vytvoril: <a href="https://www.facebook.com/martin.s.chlebovec"><font color="white"><u>Martin Chlebovec</u></font></a></center></div>					
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

