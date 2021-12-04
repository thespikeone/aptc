<?php
session_start();
include_once('../public/php/data.php');
$account2 = $pdo->prepare("SELECT * FROM aptc_shop_cart where confirme = 0 ");
$account2->execute();
$acces2 = $account2->fetchAll();
$account4 = $pdo->prepare("SELECT * FROM aptc_shop_cart where confirme = 1 ");
$account4->execute();
$acces4 = $account4->fetchAll();
if($_SESSION["autoriser"]!='oui'){
    header('location:../index.php');
}
if(isset($_POST['confirme'])){
    foreach($acces2 as $ac){
        $id = $ac['id'];
        $cc = $pdo->prepare("UPDATE aptc_shop_cart SET confirme=1 WHERE id=$id");
        $cc->execute();
        header("Refresh:0");
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APTC - Mycommand</title>
    <link rel="icon" type="image/x-icon" href="../public/assets/aptc-gold.png" />
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../public/css/styles.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../public/js/scripts.js"></script>
</head>

<body>
    <?php include_once('../nav.php') ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>

                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($acces2 as $ac){  ?>
                        <tr>
                            <td class="col-sm-8 col-md-6">
                                <div class="media">
                                    <a class="thumbnail pull-left" href="#"> <img class="media-object" <?php 
                                    $account3 = $pdo->prepare("SELECT * FROM account where id=? ");
                                    $account3->execute(array($ac['account_id']));
                                    $acces3 = $account3->fetchAll();
                                    $total = 0;
                                
                                    ?> src="../public/accimg/<?php  echo $acces3['0']['path'] ?>"
                                            style="width: 72px; height: 72px;"> </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="#">account:
                                                <?php echo $acces3['0']['title'] ?></a></h4>


                                    </div>
                                </div>
                            </td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                1
                            </td>
                            <td class="col-sm-1 col-md-1 text-center">
                                <strong>DZD<?php echo $acces3['0']['price'] ?></strong>
                            </td>

                            <td class="col-sm-1 col-md-1">
                                <a href="command_del.php?id=<?= $ac['id']?>" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                </a>

                            </td>
                        </tr>


                        <?php }?>


                        <tr>
                            <td>   </td>
                            <td>   </td>

                            <td>
                                <h3>Total</h3>
                            </td>

                            <td class="text-right">
                                <h3><strong>DZD <?php  
                            if(count($acces2)== 0){

                            }else{
                                $tot = $pdo->prepare("SELECT SUM(price) FROM aptc_shop_cart where confirme = 0 ");
                                $tot->execute();
                                $total = $tot->fetchColumn();

                            echo $total; }  ?></strong></h3>
                            </td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>

                            <td>
                                <form action="" method="POST">
                                    <button type="submit" name="confirme" class="btn btn-success">
                                        Confirme <span class="glyphicon glyphicon-play"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <h3><strong> Product in progrees we will contact you </strong></h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th class="text-center">Price</th>

                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($acces4 as $ac){  ?>
                        <tr>
                            <td class="col-sm-8 col-md-6">
                                <div class="media">
                                    <a class="thumbnail pull-left" href="#"> <img class="media-object" <?php 
                                    $account3 = $pdo->prepare("SELECT * FROM account where id=? ");
                                    $account3->execute(array($ac['account_id']));
                                    $acces3 = $account3->fetchAll();
                                    $total = 0;
                                
                                    ?> src="../public/accimg/<?php  echo $acces3['0']['path'] ?>"
                                            style="width: 72px; height: 72px;"> </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="#">account:
                                                <?php echo $acces3['0']['title'] ?></a></h4>


                                    </div>
                                </div>
                            </td>
                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                1
                            </td>
                            <td class="col-sm-1 col-md-1 text-center">
                                <strong>DZD<?php echo $acces3['0']['price'] ?></strong>
                            </td>

                            <td class="col-sm-1 col-md-1">
                                <?= $ac['date'] ?>

                            </td>
                        </tr>


                        <?php }?>


                        <tr>
                            <td>   </td>
                            <td>   </td>

                            <td>
                                <h3>Total</h3>
                            </td>

                            <td class="text-right">
                                <h3><strong>DZD <?php  
                            if(count($acces2)== 0){

                            }else{
                                $tot = $pdo->prepare("SELECT SUM(price) FROM aptc_shop_cart where login=? and confirme = 1 ");
                                $tot->execute(array($_SESSION['login']));
                                $total = $tot->fetchColumn();

                            echo $total; }  ?></strong></h3>
                            </td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td>   </td>

                            <td>
                                <form action="" method="POST">
                                    
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</body>

</html>