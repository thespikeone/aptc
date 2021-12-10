<?php
session_start();
include_once('../public/php/data.php');
@$login=$_POST["login"];
@$username=$_POST["username"];
@$first_name=$_POST["fname"];
@$last_name=$_POST["lname"];
@$phone =$_POST["phone"];
@$social_media=$_POST["social"];
@$pass=$_POST["pass"];
@$pass2=$_POST["pass2"];

$erreur="";
   if(isset($_POST['aptc_register'])){

      if(empty($login)) $erreur="Login left blank!";
      elseif(empty($username)) $erreur="username Left blank!";
      elseif(empty($pass)) $erreur="Password left blank!";
      elseif($pass!=$pass2) $erreur="Passwords are not the same!";
      else{
       
         $sel=$pdo->prepare("select id from aptc_shop_user where login=?  limit 1");
         $sel->execute(array($login));
         $tab=$sel->fetchAll();
         
         if (count($tab)>0) {
             $erreur="Login existe déjà!";
         } else{

        $sels=$pdo->prepare("select id from aptc_shop_user where username=? limit 1");
        $sels->execute(array($username));
        $tabs=$sels->fetchAll();

        if (count($tabs)>0) {
            $erreur="username existe déjà!";
        }else{
            
        
            
            $ins=$pdo->prepare("insert into aptc_shop_user(login,username,first_name,last_name,phone_number,social_media,password) values(?,?,?,?,?,?,?)");
            if($ins->execute(array($login,$username,$first_name,$last_name,$phone,$social_media,md5($pass)))){
 
                header("location:login.php");
            }else{
                echo "error";
            }
                
              
               
         }   
      }
    }
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Sign up - APTC Shop</title>

	<link rel="shortcut icon" href="assets/images/aptc-gold.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="../index.php">Home</a></li>
			<li class="active">Registration</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Registration</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Register a new account</h3>
							<p class="text-center text-muted">You have already an account ?, <a href="login.php">Login</a> </p>
							<hr>

							<form method="POST">
								<div class="top-margin">
									<label>First Name</label>
									<input name="fname" type="text" class="form-control" required>
								</div>
								<div class="top-margin">
									<label>Last Name</label>
									<input name="lname" type="text" class="form-control" required>
								</div>
								<div class="top-margin">
									<label>Username</label>
									<input name="username" type="text" class="form-control" required>
								</div>
								<div class="top-margin">
									<label>Email Address <span class="text-danger">*</span></label>
									<input name="login" type="text" class="form-control" required>
								</div>
								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Phone number <span class="text-danger">*</span></label>
										<input name="phone" type="text" class="form-control" required>
									</div>
									<div class="col-sm-6">
										<label>Social media url <span class="text-danger">*</span></label>
										<input name="social" type="url" class="form-control" required>
									</div>
								</div>
								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Password <span class="text-danger">*</span></label>
										<input name="pass" type="text" class="form-control" required>
									</div>
									<div class="col-sm-6">
										<label>Confirm Password <span class="text-danger">*</span></label>
										<input name="pass2" type="text" class="form-control" required>
									</div>
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<label class="checkbox">
											<input type="checkbox" required> 
											I've read the <a href="../../privacy.php">Terms and Conditions</a>
										</label>                        
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" name="aptc_register" type="submit">Register</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	


		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>