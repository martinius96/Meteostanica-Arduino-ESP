<!DOCTYPE html>

<html><head><meta http-equiv="Content-Type" charset=UTF-8">
<meta name="robots" content="index, follow">
<meta name='revisit-after' content='2 days'>
<meta name="description" content="Projekt meteostanice postavenej na webovom rozhraní. Meteostanica zbiera informácie cez platformu ESP8266 / ESP32 / Arduino + Ethernet a odosiela ich na internet do MySQL databázy.">
<meta name="keywords" content="esp8266, nodemcu, arduino, meteo, meteorologická, stanica, meteostanica, WiFi, teplota, tlak, vlhkosť, atmosféra, predpoveď, prognóza, ethernet, esp32, w5100, w5500">
<title>Meteostanica - Šuňava - Arduino / ESP powered</title>
<meta name="author" content="Martin Chlebovec">    
    <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta charset="UTF-8">
   <link rel="icon" type="image/png" href="icon.png" />
    <link rel="stylesheet" href="css/misc.css">
	<link id="pre-load-login-css" rel="stylesheet" href="css/loader.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script type="text/javascript">
    window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', 'db50efe9fff280a17db52b82be221240cbbd3dbe');
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76290977-2', 'auto');
  ga('send', 'pageview');

</script>
</head>

<body class="light-mode">




<div class="login-container" style="height: 800px;">
    <div class="login-container__login-bg">
    </div>
    <div class="login-container__logo-container">
       
    
     
    </div>
    <div class="login-container__login-window">
        <div class="login-window__icon-container">
            <img class="icon-container__img" src="https://www.pcrevue.sk/files/photo/2016-02/10398/afab34/obr-c-1.jpg" style="border-radius: 50px;">
        </div>
           <?php
  
//Page Variables 
  $online='<td style="background-color:#00FF00; padding:5px;">' . "Beží". '</td>';
 
    $offline='<td style="background-color:#FF0000; padding:5px;">' .  "Nebeží" . '</td>';
//Functions 
    function servercheck($server,$port){ 
        //Check that the port value is not empty 
        if(empty($port)){ 
            $port=80; 
        } 
        //Check that the server value is not empty 
        if(empty($server)){ 
            $server='http://www.arduino.php5.sk'; 
        } 
        //Connection 
        $fp=@fsockopen($server, $port, $errno, $errstr, 1); 
            //Check if connection is present 
            if($fp){ 
                //Return Alive 
                return 1; 
            } else{ 
                //Return Dead 
                return 0; 
            } 
        //Close Connection 
        fclose($fp); 
    } 
//Ports and Services to check 
$services=array( 
    "HTTP" => array('arduino.php5.sk' => 80), 
    "HTTPS" => array('arduino.php5.sk' => 443),
    "DATABASE" => array('localhost' => 3306)  
   
); 
?>     
        
   
           <?php    
      error_reporting(0);
session_start();
	$usernamevsysteme = file_get_contents('system/values/username.txt');
	$passwordvsysteme = file_get_contents('system/values/password.txt');
	if ($_SESSION['login']===true){?>
<form class="login-window__login-form">


        <center>
		<h2><font color="red">Používateľ stále prihlásený!</font></h2>
		<a href="system" class="btn btn-success">Späť do administrácie</a>
		<br><br>
		<a href="system/logout.php" class="btn btn-danger">Odhlásiť sa z administrácie</a>
       
        </form>
		 
	
	  </center>
		<?php
		
		
	}else{
	error_reporting(0);
	session_start();
      if(isset($_POST['odoslat'])){
       $username = $_POST['username'];
    $username = trim( $username );
    $username = htmlspecialchars( $username, ENT_QUOTES );
	$usernamesha1 = sha1($username);
    $password = $_POST['password']; 
    $password = trim( $password );
    $password = htmlspecialchars( $password, ENT_QUOTES );  
	$passwordsha1 = sha1($password);
        if(($usernamesha1 == $usernamevsysteme && $passwordsha1 == $passwordvsysteme)){
          $_SESSION['login'] = true; 
		  header('LOCATION: system'); die();
        } else{
           echo "<center>Údaje nie sú správne! Váš pokus bol uložený do logu!</center>";
   $ip = "";

if (!empty($_SERVER["HTTP_CLIENT_IP"]))
{
 //check for ip from share internet
 $ip = $_SERVER["HTTP_CLIENT_IP"];
}
elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"]))
{
 // Check for the Proxy User                    
 $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
}
else
{
 $ip = $_SERVER["REMOTE_ADDR"];
}
$t = file_get_contents("logy/neuspesneprihlasenia.txt");
      $today = date("Y-m-d H:i:s");
     
       $t .= $today." Pouzivatel z ip ".$ip." sa neprihlasil, zadal zle prihlasovacie informacie, meno: ".$username." a heslo: ".$password."\r\n";
      file_put_contents("logy/neuspesneprihlasenia.txt",$t);
    }
        }

	
	?>
	<form class="login-window__login-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="login-form__title"><h4>Webové rozhranie meteostanice</h4></div>
        <input id="username" name="username" type="text" class="login-form__username" autocorrect="off" autocapitalize="off" spellcheck="false" required>
        <input id="password" name="password" type="text" class="login-form__password" required>
   <br>
        <button type="submit" name="odoslat" class="login-form__connect-button"><font color="white"><b>VSTÚPIŤ!</b></font></button>
       
        </form>
	<?php  }  ?>
          <?php
             include("system/connect.php");
             $register1 = mysqli_query($con,"SELECT * FROM `vencurik`") or die(mysqli_error($con));
 	 echo "<center><h4>Počet záznamov: <font color='black'>".mysqli_num_rows($register1)."</font></h4></center>";    ?>
   <table width="300px"> 
<?php 
//Check All Services 
foreach($services as $name => $server){ 
?> 
    <tr> 
    <td><h4><?php echo $name; ?></h4></td> 
<?php 
    foreach($server as $host => $port){ 
        if(servercheck($host,$port)){ echo $online; }else{ echo $offline; } 
    } 
?> 
    </tr> 
<?php 
} 
?>
 
</table>
<div class="alert alert-danger">
Vytvoril: <a href="https://www.facebook.com/martin.s.chlebovec">Martin Chlebovec</a>
</div>
        
        
           
  
     
  
     
     

        <div class="login-window__loader-container hidden">
            <div class="loader-container__spinner"></div>
            <div class="loader-container__text-container">
                <div class="text-container__title"></div>
                <div class="text-container__subtitle"></div>
            </div>
        </div>
    </div>


  </div>


</body></html>