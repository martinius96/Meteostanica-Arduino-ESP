<title>Webprostredie riadenia domácnosti</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<script type="text/javascript">
    window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='https://rec.smartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', 'db50efe9fff280a17db52b82be221240cbbd3dbe');
</script>
    <!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-76290977-2"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-76290977-2');
</script>
<?php 
include 'connect.php';
?>
<style>
.flat-table {
		margin-bottom: 20px;
		border-collapse:collapse;
		font-family: 'Lato', Calibri, Arial, sans-serif;
  border: none;
                border-radius: 50px;
               -webkit-border-radius: 50px;
               -moz-border-radius: 50px;
	}
	.flat-table th, .flat-table td {
		box-shadow: inset 0 -1px rgba(0,0,0,0.25), 
			inset 0 1px rgba(0,0,0,0.25);
	}
	.flat-table th {
		font-weight: normal;
		-webkit-font-smoothing: antialiased;
		padding: 1em;
		color: #fff;
    font-weight: bold;
		text-shadow: 0 0 1px rgba(0,0,0,0.1);
		font-size: 1.5em;
	}
	.flat-table td {
		color: #f7f7f7;
		padding: 0.7em 1em 0.7em 1.15em;
		text-shadow: 0 0 1px rgba(255,255,255,0.1);
		font-size: 1.4em;
	}
	.flat-table tr {
		-webkit-transition: background 0.3s, box-shadow 0.3s;
		-moz-transition: background 0.3s, box-shadow 0.3s;
		transition: background 0.3s, box-shadow 0.3s;
	}
	.flat-table-1 {
		background: #2874A6;
	}
	.flat-table-1 tr:hover {
		background: rgba(0,0,0,0.19);
	}
	.flat-table-2 tr:hover {
		background: rgba(0,0,0,0.1);
	}
	.flat-table-2 {
		background: #C0392B;
	}
	.flat-table-3 {
		background: #229954;
	}
	.flat-table-3 tr:hover {
		background: rgba(0,0,0,0.1);
	}
</style>	