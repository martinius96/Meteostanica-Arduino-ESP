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
<?php $stranka = "Dni";?>
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
					
							<!-- TABLE STRIPED -->
							<div class="panel">
							<div class="panel-body">
								<h2><font color="black">Časové riadenie v dňoch:</font></h2>
					
     <?php     if(isset($_POST['nastavrele1'])){
if (isset($_POST['Pondelok1'])) {
	 file_put_contents(__DIR__ . '/rele/Pondelok1.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Pondelok1.txt', 'Nie');
	
}
if (isset($_POST['Utorok1'])) {
	 file_put_contents(__DIR__ . '/rele/Utorok1.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Utorok1.txt', 'Nie');
	
}
if (isset($_POST['Streda1'])) {
	 file_put_contents(__DIR__ . '/rele/Streda1.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Streda1.txt', 'Nie');
	
}
if (isset($_POST['Stvrtok1'])) {
	 file_put_contents(__DIR__ . '/rele/Stvrtok1.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Stvrtok1.txt', 'Nie');
	
}
if (isset($_POST['Piatok1'])) {
	 file_put_contents(__DIR__ . '/rele/Piatok1.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Piatok1.txt', 'Nie');
	
}
if (isset($_POST['Sobota1'])) {
	 file_put_contents(__DIR__ . '/rele/Sobota1.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Sobota1.txt', 'Nie');
	
}
if (isset($_POST['Nedela1'])) {
	 file_put_contents(__DIR__ . '/rele/Nedela1.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Nedela1.txt', 'Nie');
	
}
}























      if(isset($_POST['nastavrele2'])){
if (isset($_POST['Pondelok2'])) {
	 file_put_contents(__DIR__ . '/rele/Pondelok2.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Pondelok2.txt', 'Nie');
	
}
if (isset($_POST['Utorok2'])) {
	 file_put_contents(__DIR__ . '/rele/Utorok2.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Utorok2.txt', 'Nie');
	
}
if (isset($_POST['Streda2'])) {
	 file_put_contents(__DIR__ . '/rele/Streda2.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Streda2.txt', 'Nie');
	
}
if (isset($_POST['Stvrtok2'])) {
	 file_put_contents(__DIR__ . '/rele/Stvrtok2.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Stvrtok2.txt', 'Nie');
	
}
if (isset($_POST['Piatok2'])) {
	 file_put_contents(__DIR__ . '/rele/Piatok2.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Piatok2.txt', 'Nie');
	
}
if (isset($_POST['Sobota2'])) {
	 file_put_contents(__DIR__ . '/rele/Sobota2.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Sobota2.txt', 'Nie');
	
}
if (isset($_POST['Nedela2'])) {
	 file_put_contents(__DIR__ . '/rele/Nedela2.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Nedela2.txt', 'Nie');
	
}
}











       
      if(isset($_POST['nastavrele3'])){
if (isset($_POST['Pondelok3'])) {
	 file_put_contents(__DIR__ . '/rele/Pondelok3.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Pondelok3.txt', 'Nie');
	
}
if (isset($_POST['Utorok3'])) {
	 file_put_contents(__DIR__ . '/rele/Utorok3.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Utorok3.txt', 'Nie');
	
}
if (isset($_POST['Streda3'])) {
	 file_put_contents(__DIR__ . '/rele/Streda3.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Streda3.txt', 'Nie');
	
}
if (isset($_POST['Stvrtok3'])) {
	 file_put_contents(__DIR__ . '/rele/Stvrtok3.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Stvrtok3.txt', 'Nie');
	
}
if (isset($_POST['Piatok3'])) {
	 file_put_contents(__DIR__ . '/rele/Piatok3.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Piatok3.txt', 'Nie');
	
}
if (isset($_POST['Sobota3'])) {
	 file_put_contents(__DIR__ . '/rele/Sobota3.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Sobota3.txt', 'Nie');
	
}
if (isset($_POST['Nedela3'])) {
	 file_put_contents(__DIR__ . '/rele/Nedela3.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Nedela3.txt', 'Nie');
	
}
}





   
       
      if(isset($_POST['nastavrele4'])){
if (isset($_POST['Pondelok4'])) {
	 file_put_contents(__DIR__ . '/rele/Pondelok4.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Pondelok4.txt', 'Nie');
	
}
if (isset($_POST['Utorok4'])) {
	 file_put_contents(__DIR__ . '/rele/Utorok4.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Utorok4.txt', 'Nie');
	
}
if (isset($_POST['Streda4'])) {
	 file_put_contents(__DIR__ . '/rele/Streda4.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Streda4.txt', 'Nie');
	
}
if (isset($_POST['Stvrtok4'])) {
	 file_put_contents(__DIR__ . '/rele/Stvrtok4.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Stvrtok4.txt', 'Nie');
	
}
if (isset($_POST['Piatok4'])) {
	 file_put_contents(__DIR__ . '/rele/Piatok4.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Piatok4.txt', 'Nie');
	
}
if (isset($_POST['Sobota4'])) {
	 file_put_contents(__DIR__ . '/rele/Sobota4.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Sobota4.txt', 'Nie');
	
}
if (isset($_POST['Nedela4'])) {
	 file_put_contents(__DIR__ . '/rele/Nedela4.txt', 'Ano');
	
}else{
	 file_put_contents(__DIR__ . '/rele/Nedela4.txt', 'Nie');
	
}
}






           ?>


	<div class="row">
  <div class="col-md-3">
 <center><h3><font color="black"><?php echo file_get_contents("nazvyperiferii/rele1.txt");?></font></h3></center>
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
<input type="checkbox" style="display: block;" name="Pondelok1" value="Pondelok"  <?php if(file_get_contents("rele/Pondelok1.txt") === "Ano") echo "checked"; ?>>Pondelok<br> 
 <input type="checkbox" style="display: block;" name="Utorok1" value="Utorok" <?php if(file_get_contents("rele/Utorok1.txt") === "Ano") echo "checked"; ?>> Utorok<br> 
 <input type="checkbox" style="display: block;" name="Streda1" value="Streda" <?php if(file_get_contents("rele/Streda1.txt") === "Ano") echo "checked"; ?>>Streda<br> 
  <input type="checkbox" style="display: block;" name="Stvrtok1" value="Stvrtok" <?php if(file_get_contents("rele/Stvrtok1.txt") === "Ano") echo "checked"; ?>>Štvrtok<br> 
    <input type="checkbox" style="display: block;" name="Piatok1" value="Piatok" <?php if(file_get_contents("rele/Piatok1.txt") === "Ano") echo "checked"; ?>>Piatok<br>
	    <input type="checkbox" style="display: block;" name="Sobota1" value="Sobota" <?php if(file_get_contents("rele/Sobota1.txt") === "Ano") echo "checked"; ?>>Sobota<br> 
		   <input type="checkbox" style="display: block;" name="Nedela1" value="Nedela" <?php if(file_get_contents("rele/Nedela1.txt") === "Ano") echo "checked"; ?>>Nedeľa<br> 
		   <input type="submit" name="nastavrele1" class="btn btn-info" value="Ukončiť výber pre relé">
</form>
  </div>
<div class="col-md-3">
 <center><h3><font color="black"><?php echo file_get_contents("nazvyperiferii/rele2.txt");?></font></h3></center>
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
<input type="checkbox" style="display: block;" name="Pondelok2" value="Pondelok" <?php if(file_get_contents("rele/Pondelok2.txt") === "Ano") echo "checked"; ?>>Pondelok<br> 
 <input type="checkbox" style="display: block;" name="Utorok2" value="Utorok" <?php if(file_get_contents("rele/Utorok2.txt") === "Ano") echo "checked"; ?>> Utorok<br> 
 <input type="checkbox" style="display: block;" name="Streda2" value="Streda" <?php if(file_get_contents("rele/Streda2.txt") === "Ano") echo "checked"; ?>>Streda<br> 
  <input type="checkbox" style="display: block;" name="Stvrtok2" value="Stvrtok" <?php if(file_get_contents("rele/Stvrtok2.txt") === "Ano") echo "checked"; ?>>Štvrtok<br> 
    <input type="checkbox" style="display: block;" name="Piatok2" value="Piatok" <?php if(file_get_contents("rele/Piatok2.txt") === "Ano") echo "checked"; ?>>Piatok<br>
	    <input type="checkbox" style="display: block;" name="Sobota2" value="Sobota" <?php if(file_get_contents("rele/Sobota2.txt") === "Ano") echo "checked"; ?>>Sobota<br> 
		   <input type="checkbox" style="display: block;" name="Nedela2" <?php if(file_get_contents("rele/Nedela2.txt") === "Ano") echo "checked"; ?>>Nedeľa<br> 
		   <input type="submit" name="nastavrele2" class="btn btn-danger" value="Ukončiť výber pre relé">
</form>
  </div>
    <div class="col-md-3">
	 <center><h3><font color="black"><?php echo file_get_contents("nazvyperiferii/rele3.txt");?></font></h3></center>
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
<input type="checkbox" style="display: block;" name="Pondelok3" value="Pondelok" <?php if(file_get_contents("rele/Pondelok3.txt") === "Ano") echo "checked"; ?>>Pondelok<br> 
 <input type="checkbox" style="display: block;" name="Utorok3" value="Utorok" <?php if(file_get_contents("rele/Utorok3.txt") === "Ano") echo "checked"; ?>> Utorok<br> 
 <input type="checkbox" style="display: block;" name="Streda3" value="Streda" <?php if(file_get_contents("rele/Streda3.txt") === "Ano") echo "checked"; ?>>Streda<br> 
  <input type="checkbox" style="display: block;" name="Stvrtok3" value="Stvrtok" <?php if(file_get_contents("rele/Stvrtok3.txt") === "Ano") echo "checked"; ?>>Štvrtok<br> 
    <input type="checkbox" style="display: block;" name="Piatok3" value="Piatok" <?php if(file_get_contents("rele/Piatok3.txt") === "Ano") echo "checked"; ?>>Piatok<br>
	    <input type="checkbox" style="display: block;" name="Sobota3" value="Sobota" <?php if(file_get_contents("rele/Sobota3.txt") === "Ano") echo "checked"; ?>>Sobota<br> 
		   <input type="checkbox" style="display: block;" name="Nedela3" <?php if(file_get_contents("rele/Nedela3.txt") === "Ano") echo "checked"; ?>>Nedeľa<br> 
		  	   <input type="submit" name="nastavrele3" class="btn btn-warning" value="Ukončiť výber pre relé">
</form> 
  </div>
<div class="col-md-3">
 <center><h3><font color="black"><?php echo file_get_contents("nazvyperiferii/rele4.txt");?></font></h3></center>
<form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?> method="post">
 <input type="checkbox" style="display: block;" name="Pondelok4" value="Pondelok" <?php if(file_get_contents("rele/Pondelok4.txt") === "Ano") echo "checked"; ?>>Pondelok<br> 
 <input type="checkbox" style="display: block;" name="Utorok4" value="Utorok" <?php if(file_get_contents("rele/Utorok4.txt") === "Ano") echo "checked"; ?>> Utorok<br> 
 <input type="checkbox" style="display: block;" name="Streda4" value="Streda" <?php if(file_get_contents("rele/Streda4.txt") === "Ano") echo "checked"; ?>>Streda<br> 
  <input type="checkbox" style="display: block;" name="Stvrtok4" value="Stvrtok" <?php if(file_get_contents("rele/Stvrtok4.txt") === "Ano") echo "checked"; ?>>Štvrtok<br> 
    <input type="checkbox" style="display: block;" name="Piatok4" value="Piatok" <?php if(file_get_contents("rele/Piatok4.txt") === "Ano") echo "checked"; ?>>Piatok<br>
	    <input type="checkbox" style="display: block;" name="Sobota4" value="Sobota" <?php if(file_get_contents("rele/Sobota4.txt") === "Ano") echo "checked"; ?>>Sobota<br> 
		   <input type="checkbox" style="display: block;" name="Nedela4" <?php if(file_get_contents("rele/Nedela4.txt") === "Ano") echo "checked"; ?>>Nedeľa<br> 
		  	   <input type="submit" name="nastavrele4" class="btn btn-success" value="Ukončiť výber pre relé">
</form> 
  </div>
  </div>
</div>
							</div>
					
						</div>
						
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2018 <a href="https://www.themeineed.com" target="_blank">Smart Home</a></p>
			</div>
		</footer>
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
