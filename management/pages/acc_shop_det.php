<?php
include'../php/pdo.php';
include'../sidebar.php';

$sel=$pdo2->prepare("select * from aptc_shop_user where login=? limit 1");
$sel->execute(array($_GET['ucid']));
$user2=$sel->fetch();
$ucid= $_GET['ucid'];
$account4 = $pdo2->prepare("SELECT * FROM aptc_shop_cart where login=? and confirme = 1 ");
$account4->execute(array($_GET['ucid']));
$acces4 = $account4->fetchAll();

if(isset($_POST['delete_command'])){
    exit;
  
}
?>

<center>
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">User shop detail</h4>
        </div>
        <a href="acc_shop.php" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i
                class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
        <div class="card-body">



            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Full Name<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                        : <?php echo $user2['first_name']; ?> <?php  echo $user2['last_name']; ?> <br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        username:<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                        : <?php  echo $user2['username']; ?> <br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Email<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                        : <?php echo $user2['login']; ?> <br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Contact #<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                        : <?php echo $user2['phone_number']; ?> <br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        social account:<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                        : <?php echo $user2['social_media']; ?> <br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        account created Date<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                        : <?php echo $user2['date']; ?> <br>
                    </h5>
                </div>
            </div>


        </div>
    </div>

    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Cart Detail</h4>
        </div>




        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th class="text-center">Price</th>
                    <th>date</th>

                </tr>
            </thead>
            <form method="POST" >
                <tbody>
                    <?php foreach($acces4 as $ac){  ?>
                    <tr>
                        <td class="col-sm-8 col-md-6">
                            <div class="media">
                                <img class="media-object" <?php 
                                    $account3 = $pdo2->prepare("SELECT * FROM account where id=? ");
                                    $account3->execute(array($ac['account_id']));
                                    $acces3 = $account3->fetchAll();
                                    
                                    $total = 0;
                                
                                    ?> src="https://aptc.ga/accshop/public/accimg/<?php  echo $acces3['0']['path'] ?>"
                                    style="width: 72px; height: 72px;">

                                <div class="media-body">

                                    <h5 class="media-heading">
                                        <?php echo $acces3['0']['title'] ?></h5>


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
                            if(count($acces4)== 0){

                            }else{
                               
                                $tot = $pdo2->prepare("SELECT SUM(price) FROM aptc_shop_cart where login=? and confirme = 1 ");
                                $tot->execute(array($_GET['ucid']));
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
    
        
        <div class="card-body">
            <input type="submit" name="delete_command">
      
            </form>
        </div>
    </div>

    </div>
    </div>
    <?php
include'../footer.php';
?>