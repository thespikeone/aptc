<?php 
session_start();
if($_SESSION['confirme']!= "yes"){
    header('location: loginadmin.php');
}
require_once('../../public/php/data.php');

#$api_url = 'http://127.0.0.34/money/MoneyPROJECTFINAL/accshop/api/numuser/1';
#$get_user_number = json_decode(file_get_contents($api_url), true);
#$numuser = $get_user_number[0]['COUNT(*)'];





include 'functions.php';
// Connect to MySQL using the below function

// Check if the ID param in the URL exists


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>APTC - Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.png" type="image/x-icon" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

</head>

<body data-background-color="dark">
    <div class="wrapper overlay-sidebar">
        <div class="main-header">


            <?php include_once('../header.php'); ?>
        </div>

        <?php include_once('../sidebar.php'); ?>

        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <?php include_once('../page_header.php'); ?>
                    <div class="mt-2 mb-4">
                        <h2 class="text-white pb-2">Welcome back, <?php echo $_SESSION['username'] ?></h2>
                        <h5 class="text-white op-7 mb-4">Yesterday I was clever, so I wanted to change the world. Today
                            I am wise, so I am changing myself.</h5>
                    </div>
                    <div class="row">


                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title" align="center"> <strong>SUPPORT TICKET </strong> </h3>


                                </div>
                                <div class="card-body">


                                  <?php
                                    include_once('support.php')
                                  ?>
                                
                                  
                                    


                                </div>
                            </div>
                        </div>



                    </div>




                </div>
            </div>

        </div>


        <!-- var foo = <?php #echo $numuser; ?>; End Custom template -->
    </div>

    
    <style>
    .open {
        color: #38b673;
    }

    .closed {
        color: #b63838;
    }

    .resolved {
        color: #ffad46 !important;
    }
    </style>

    
</body>


</html>