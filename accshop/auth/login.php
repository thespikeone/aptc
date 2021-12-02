<?php 
session_start();
include_once('../public/php/data.php');

@$login=$_POST["login"];
@$pass=md5($_POST["pass"]);


  

   $erreur="";
   if(isset($_POST['aptc_shop_login'])){
                 /* collect data */
            $sel=$pdo->prepare("select * from aptc_shop_user where login=? and password=? limit 1");
            $sel->execute(array($login,$pass));
            $user=$sel->fetchAll();
             /* Stock data on session */
            if (count($user)>0) {
                $_SESSION["login"]=(strtolower($user[0]["login"]));
                $_SESSION["username"]=(strtolower($user[0]["username"]));
                $_SESSION["fname"]=(strtolower($user[0]["first_name"]));
                $_SESSION["lname"]=(strtolower($user[0]["last_name"]));
                $_SESSION["phone"]=(strtolower($user[0]["phone_number"]));
                $_SESSION["social"]=(strtolower($user[0]["social_media"]));
                $_SESSION["password"]=(strtolower($user[0]["password"]));
                $_SESSION["id"]=(strtolower($user[0]["id"]));
                $_SESSION["autoriser"]="oui";
                sleep(3);
                header("Refresh:1");
                
                header("location:../index.php");
            }

                                /* systeme de cookie */
            }  else {
                $erreur="Wrong Password or Login !";
            }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sergey Pozhilov (GetTemplate.com)">

    <title>Sign in - APTC Shop</title>

    <link rel="shortcut icon" href="assets/images/aptc-gold.png">

    <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Custom styles for our template -->
    <link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
    <link rel="stylesheet" href="assets/css/main.css">


</head>

<body>




    <!-- container -->
    <div class="container">

        <ol class="breadcrumb">
            <li><a href="../index.php">Home</a></li>
            <li class="active">User access</li>
        </ol>

        <div class="row">

            <!-- Article main content -->
            <article class="col-xs-12 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Sign in</h1>
                </header>

                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <h3 class="thin text-center">Sign in to your account</h3>
                            <p class="text-center text-muted">You dont have account ? <a
                                    href="register.php">Register</a> </p>
                            <hr>

                            <form method="POST">
                                <div class="top-margin">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input name="login" type="email" class="form-control">
                                </div>
                                <div class="top-margin">
                                    <label>Password <span class="text-danger">*</span></label>
                                    <input name="pass" type="password" class="form-control">
                                </div>

                                <hr>

                                <div class="row">
                                    <div class="col-lg-8">
                                        <b><a href="">Forgot password?</a></b>
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <button class="btn btn-action" name="aptc_shop_login" type="submit">Sign in</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>

            </article>
            <!-- /Article -->

        </div>
    </div> <!-- /container -->







    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/headroom.min.js"></script>
    <script src="assets/js/jQuery.headroom.min.js"></script>
    <script src="assets/js/template.js"></script>
</body>

</html>