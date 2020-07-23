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
<?php $stranka = "Login";?>
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
			 <h2>Zmena prístupových údajov k web rozhraniu</h2>
			 <?php if(isset($_POST['zmenitprihlasovacieudaje'])){
  	$username = $_POST['username'];
	$username = trim( $username );
    $username = htmlspecialchars( $username, ENT_QUOTES );
	$password = $_POST['password'];
	$password = trim( $password );
    $password = htmlspecialchars( $password, ENT_QUOTES );  
	
	file_put_contents(__DIR__ . '/values/username.txt', sha1($username));
	file_put_contents(__DIR__ . '/values/password.txt', sha1($password));
	echo'<b>Vaše prihlasovacie údaje boli úspešne zmenené!</b> <br>';
	echo"Používateľské meno: <font color='green'>".$username."</font><br>";
	echo"Používateľské heslo: <font color='green'>".$password."</font>";
  }
  ?>
			 <form method="post" action="zmena-loginu.php">
             <input name="username" style="text-align: center; width: 50%;" placeholder="Meno" type="text">
			 <input name="password" style="text-align: center; width: 50%;" placeholder="Heslo" type="text"><br>
               <input type="submit" name="zmenitprihlasovacieudaje" class="btn btn-danger" value="Zmeniť">    </form>    </center>
									
								</div>
							</div>
					
						</div>
						
			<!-- END MAIN CONTENT -->
		</div>
    <div style="background-color: #3B67D5; border-radius: 25px; color: white;"><center>Vytvoril: <a href="https://www.facebook.com/martin.s.chlebovec"><font color="white"><u>Martin Chlebovec</u></font></a></center></div>
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
