<?php 
include_once('../public/php/data.php');

session_start();
if($_SESSION["autoriser"]!='oui'){
    header('location:../index.php');
}
if(isset($_POST['update'])){
        $login = $_POST['login'];
        $username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $social = $_POST['social'];
        $phone = $_POST['phone'];
        $id=$_SESSION['id'];
        $cc = $pdo->prepare("UPDATE aptc_shop_user SET login=?, username=?, first_name=?,last_name=?,phone_number=?,social_media=? WHERE id=$id");
        $cc->execute(array($login,$username,$fname,$lname,$phone,$social));
        $_SESSION["login"]=(strtolower($login));
        $_SESSION["username"]=(strtolower($username));
        $_SESSION["fname"]=(strtolower($fname));
        $_SESSION["lname"]=(strtolower($lname));
        $_SESSION["phone"]=(strtolower($phone));
        $_SESSION["social"]=(strtolower($social));
        header("Refresh:0");
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>account setting APTC - Shop</title>
    <link rel="icon" type="image/x-icon" href="../public/assets/aptc-gold.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../public/css/styles.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../public/js/scripts.js"></script>
</head>

<body>
    <?php include_once('../nav.php'); ?>
    <div class="container">

        <div class="row gutters">

            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <form method="POST">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">First name</label>
                                        <input type="text" class="form-control" id="fullName" name="fname"
                                            value="<?php echo $_SESSION['fname'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="fullName">Last name</label>
                                        <input type="text" class="form-control" id="fullName" name="lname"
                                            value="<?php echo $_SESSION['lname'] ?>">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="fullName">Username</label>
                                        <input type="text" class="form-control" id="fullName" name="username"
                                            value="<?php echo $_SESSION['username'] ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="eMail">Email</label>
                                        <input type="email" name="login" class="form-control" id="eMail"
                                            value="<?php echo $_SESSION['login'] ?> ">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone"
                                            value="<?php echo $_SESSION['phone'] ?> ">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="website">Social media to contact you</label>
                                        <input type="text" class="form-control" name="social" id="website"
                                            value="<?php echo $_SESSION['social'] ?> ">
                                    </div>
                                </div>
                            </div>

                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">

                                        <button type="submit" id="submit" name="update"
                                            class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <style type="text/css">
    .account-settings .user-profile {
        margin: 0 0 1rem 0;
        padding-bottom: 1rem;
        text-align: center;
    }

    .account-settings .user-profile .user-avatar {
        margin: 0 0 1rem 0;
    }

    .account-settings .user-profile .user-avatar img {
        width: 90px;
        height: 90px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
    }

    .account-settings .user-profile h5.user-name {
        margin: 0 0 0.5rem 0;
    }

    .account-settings .user-profile h6.user-email {
        margin: 0;
        font-size: 0.8rem;
        font-weight: 400;
        color: #9fa8b9;
    }

    .account-settings .about {
        margin: 2rem 0 0 0;
        text-align: center;
    }

    .account-settings .about h5 {
        margin: 0 0 15px 0;
        color: #007ae1;
    }

    .account-settings .about p {
        font-size: 0.825rem;
    }

    .form-control {
        border: 1px solid #cfd1d8;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        font-size: .825rem;
        background: #ffffff;
        color: #2e323c;
    }

    .card {
        background: #ffffff;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 0;
        margin-bottom: 1rem;
    }
    </style>

    <script type="text/javascript">

    </script>
</body>

</html>