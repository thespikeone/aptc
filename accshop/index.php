<?php
session_start();
include_once('public/php/data.php');
$account = $pdo->prepare("SELECT * FROM account");
$account->execute();
$acces = $account->fetchAll();

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
    <link rel="icon" type="image/x-icon" href="public/assets/aptc-gold.png" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="public/css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <?php include('nav.php'); ?>
    <!-- Header-->
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Shop in style</h1>
                <p class="lead fw-normal text-white-50 mb-0">With this shop you can buy account with low price</p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                <?php foreach($acces as $ac){ ?>
                <div class="col mb-5">
                    <div class="card h-100">
                   
                        <!-- Product image-->
                        <img class="card-img-top" src="public/accimg/<?= $ac['path'] ?>" alt="..." />
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?= $ac['badge'] ?></div>
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?= $ac['title'] ?></h5>
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                <?= $ac['price'] ?>DZD
                            </div>

                        </div>
                        <!-- Product actions-->
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="item/item.php?id=<?= $ac['id'] ?>">Add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

                




            </div>

        </div>
        </div>
    </section>
    <!-- Footer-->
    <style>
        
.bg-black {
  --bs-bg-opacity: 1;

  background-image: url("assets/bg_header.jpg")!important;
}
    </style>
    <footer class="py-5 bg-dark">
        <div class="container">
        
            <p class="m-0 text-center text-white">Copyright &copy; APTC Shop 2021</p>
            <p class="m-0 text-center text-white"> <a href="../privacy.php">Terms and Conditions</a></p>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="public/js/scripts.js"></script>
</body>

</html>