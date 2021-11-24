<?php

use function PHPSTORM_META\type;

require("pdo.php");
@$username=$_POST["user"];
@$login=$_POST["login"];
@$password=$_POST["password"];
@$type=$_POST["type"];
@$first_name=$_POST["first_name"];
@$last_name=$_POST["last_name"];
@$gender=$_POST["gender"];
@$phone_number=$_POST["phone_number"];
@$number=$_POST["number"];

@$file_url = 'upload/' .$nom;
$php = 'index.php';
$erreur="";
   if(isset($_POST['btnadd'])){
   
    $hired_date = date("Y/m/d");  

            $ins=$pdo->prepare("insert into users(username,password,type,number) values(?,?,?,?)");
            $ins->execute(array($username,md5($password),$type,$number));
            $ins=$pdo->prepare("insert into employe(number,first_name,last_name,gender,login,phone_number,province,city,hired_date) values(?,?,?,?,?,?,?,?,?)");
            $ins->execute(array($number,$first_name,$last_name,$gender,$login,$phone_number,$hired_date));
           
            
             

      
}
   
?>
<?php require('../session/session.php');?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inventory Manager Register</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row shadow">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome to Our Big Project Brother!</h1>
                                    </div>
                                    <form class="user" role="form" action="" method="post">
                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="Username"
                                                name="user" type="text" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="login"
                                                name="login" type="text" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="Password"
                                                name="password" type="password" value="">
                                        </div>

                                        <div class="form-group">
                                            <P>Type account</P>
                                            <select name="type" id="pet-select">
                                                <option value="">--Please choose an option--</option>
                                                <option value="admin">admin</option>
                                                <option value="manager">manager</option>
                                                <option value="comptable">comptable</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="first_name"
                                                name="first_name" type="text" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="last_name"
                                                name="last_name" type="text" autofocus>
                                        </div>
                                        <div class="form-group">
                                            <p>gender</p>
                                            <select name="gender" id="pet-select">
                                                <option value="">--Please choose an option--</option>
                                                <option value="MEN">MEN</option>
                                                <option value="WOMEN">WOMEN</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="phone_number"
                                                name="phone_number" type="text" autofocus>
                                        </div>

                                        <div class="form-group">
                                            <input class="form-control form-control-user" placeholder="number"
                                                name="number" type="text" autofocus>
                                        </div>

                                        <button class="btn btn-primary btn-user btn-block" type="submit"
                                            name="btnadd">ADD</button>
                                        <hr>
                                        <!-- <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div> -->
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>