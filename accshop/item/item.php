<?php
session_start();
include_once('../public/php/data.php');
$id = $_GET['id'];
$account = $pdo->prepare("SELECT * FROM account where id=$id");
$account->execute();
$acces = $account->fetchAll();

$account2 = $pdo->prepare("SELECT * FROM account LIMIT 4");
$account2->execute();
$acces2 = $account2->fetchAll();
if($_SESSION["autoriser"]!='oui'){
    header('location:../auth/register.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>APTC - Account Shop</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../public/assets/aptc-gold.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../public/css/styles.css" rel="stylesheet" />
    <?php include_once('../../google.php'); ?>
</head>

<body>
    <!-- Navigation-->
    <?php include('../nav.php') ?>
    <!-- Product section-->
    <section class="py-5">
        <form method="POST" action="item_add.php">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0"
                            src="../public/accimg/<?php echo $acces[0]['path'] ?>" alt="..." /></div>
                    <div class="col-md-6">

                        <h1 class="display-5 fw-bolder"><?php echo $acces[0]['title'] ?></h1>
                        <div class="fs-5 mb-5">
                            <!--<span class="text-decoration-line-through">DZD</span>-->
                            <span><?php echo $acces[0]['price'] ?>DZD</span>
                        </div>
                        <p class="lead"><?php echo $acces[0]['descr'] ?></p>
                        <div class="d-flex">
                            <input type="text" name="aid" value="<?php echo $acces[0]['id'] ?>" hidden>
                            <?php if($acces[0]['badge'] == 0){ 
                           ?>
                            <p style="color: red;"><strong>not in stock at the moment you can come back later</strong></p>

                            <?php
                           }else{
                            ?>
                            <button class="btn btn-outline-dark flex-shrink-0" type="submit">
                                <i class="bi-cart-fill me-1"></i>
                                Add to cart
                            </button>
                            <?php

                           } 
                           ?>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">

        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Related products</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php foreach($acces2 as $ac){ ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="../public/accimg/<?= $ac['path'] ?>" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $acces[0]['title'] ?></h5>
                                <!-- Product price-->
                                <?= $ac['price'] ?>DZD
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                    href="item.php?id=<?= $ac['id'] ?>">Add to cart</a></div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>

    </section>
    <!-- Footer-->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; APTC 2021</p>
            <p class="m-0 text-center text-white"> <a href="../../privacy.php">Terms and Conditions</a></p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../public/js/scripts.js"></script>
</body>

</html>