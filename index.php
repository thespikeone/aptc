<?php 
$data = $_SERVER['SERVER_NAME'];
if($data == "admin.aptc.ga"){
	header('location: https://aptc.ga/management');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="APTC team">
	<title>APTC - Algerian platform for trading crypto</title>
	<link rel="shortcut icon" href="assets/images/logo-only.png">
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">
	<?php include_once('google.php'); ?>
</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.html"><img src="assets/images/logo.png" alt="Progressus HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="about.html">About</a></li>
					
					<li><a href="contact.html">Contact</a></li>
					
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">Algerian platform for trading crypto</h1>
				<p class="tagline">Aptc: trading crypto, e-commerce </p>
				<p> <a class="btn btn-action btn-lg" href="accshop/index.php" role="button">Account Shop</a></p>
			</div>
		</div>
	</header>
	<!-- /Header -->

	<!-- Intro -->
	<div class="container text-center">
		<br> <br>
		<h2 class="thin">The best place to tell people why we are here</h2>
		<p class="text-muted">
			The difference between involvement and commitment is like an eggs-and-ham breakfast:<br> 
			the chicken was involved; the pig was committed.
		</p>
	</div>
	<!-- /Intro-->
		
	
	<footer id="footer" class="top-space">

<div class="footer1">
	<div class="container">
		<div class="row">
			
			<div class="col-md-3 widget">
				<h3 class="widget-title">Contact</h3>
				<div class="widget-body">
					<p>+213 56 048 0184<br>
						<a href="mailto:contact@aptc.ga">contact@aptc.ga</a><br>
						<br>
						Algeria, Oran, 31000
					</p>	
				</div>
			</div>

			<div class="col-md-3 widget">
				<h3 class="widget-title">Follow us</h3>
				<div class="widget-body">
					<p class="follow-me-icons">
						<a href="https://www.instagram.com/aptc_2/"><i class="fa fa-instagram fa-2"></i></a>
					
					</p>	
				</div>
			</div>

			<div class="col-md-6 widget">
				<h3 class="widget-title">Information</h3>
				<div class="widget-body">
					<a href="privacy.php">Terms and Conditions</a>
				</div>
			</div>

		</div> <!-- /row of widgets -->
	</div>
</div>

<div class="footer2">
	<div class="container">
		<div class="row">
			
			<div class="col-md-6 widget">
				<div class="widget-body">
					<p class="simplenav">
						<a href="#">Home</a> | 
						<b><a href="accshop/index.php">Account Shop</a></b>
					</p>
				</div>
			</div>

			<div class="col-md-6 widget">
				<div class="widget-body">
					<p class="text-right">
						Copyright &copy; 2021, APTC. Designed by Younes
					</p>
				</div>
			</div>

		</div> <!-- /row of widgets -->
	</div>
</div>

</footer>	

	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>