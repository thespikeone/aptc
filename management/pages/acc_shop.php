<?php
include'../php/pdo.php';
include'../sidebar.php';
$cart = $pdo2->prepare("SELECT login,phone_number from aptc_shop_user");
$cart->execute();
$ccart = $cart->fetchAll();

if(isset($_POST['update_account_number'])){
    $spotifyu = $_POST['number_spotify'];
    $netflix = $_POST['number_netflix'];
    $deezer = $_POST['number_deezer'];
    $tidal = $_POST['number_tidal'];
    $crunchyroll = $_POST['number_crunchyroll'];
$up = $pdo2->prepare("UPDATE account SET badge=? WHERE title='spotify'");
$up->execute(array($spotifyu));
$up = $pdo2->prepare("UPDATE account SET badge=? WHERE title='netflix'");
$up->execute(array($netflix));
$up = $pdo2->prepare("UPDATE account SET badge=? WHERE title='deezer'");
$up->execute(array($deezer));
$up = $pdo2->prepare("UPDATE account SET badge=? WHERE title='tidal'");
$up->execute(array($tidal));
$up = $pdo2->prepare("UPDATE account SET badge=? WHERE title='crunchyroll'");
$up->execute(array($crunchyroll));


}


?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">User Cart account shop&nbsp;</h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>login</th>
                        <th>phone</th>
                        <th>cart</th>
                        <th>price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach($ccart as $em){ 
                    ?>
                <tbody>


                    <td>
                        <?= $em['login'] ?>
                    </td>
                    <td>
                        <?= $em['phone_number'] ?>
                    </td>
                    <td>
                        <?php 
                    $account3 = $pdo2->prepare("SELECT COUNT(*) FROM aptc_shop_cart where login=? and confirme=1 ");
                    $account3->execute(array($em['login']));
                    $acces3 = $account3->fetchColumn();
                   echo $acces3;
                   ?>
                    </td>
                    <td>
                        <?php 
                    $account5 = $pdo2->prepare("SELECT SUM(price) FROM aptc_shop_cart where login=? and confirme=1 ");
                    $account5->execute(array($em['login']));
                    $acces5 = $account5->fetchColumn();
                  
                    echo $acces5;
                   ?>
                    </td>

                    <td align="right">
                        <div class="btn-group">

                            <a type="button" class="btn btn-primary bg-gradient-primary"
                                href="acc_shop_det.php?ucid=<?= $em['login'] ?>"><i class="fas fa-fw fa-list-alt"></i>
                                Details</a>

                        </div>
                    </td>

                    </tr>



                </tbody>
                <?php
                  } ?>
            </table>
        </div>
    </div>
</div>


<div class="card shadow mb-4 col-xs-12 col-md-12 border-bottom-primary">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Edit Account stock</h4>
    </div>
    <div class="card-body">


        <form role="form" method="post">


            <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Spotify:
                </div>
                <div class="col-sm-9">
                    <input class="form-control" placeholder="account number of spotify" name="number_spotify" value="<?php 
                        $spotify = $pdo2->prepare("SELECT badge FROM account WHERE title = 'spotify'  ");
                         $spotify->execute();
                         $sRows = $spotify->fetchColumn();
                        echo $sRows;
                     ?>" required>
                </div>
            </div>
            <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Netflix:
                </div>
                <div class="col-sm-9">
                    <input class="form-control" placeholder="account number of netflix" name="number_netflix" value="<?php 
                        $spotify = $pdo2->prepare("SELECT badge FROM account WHERE title = 'netflix'  ");
                         $spotify->execute();
                         $sRows = $spotify->fetchColumn();
                        echo $sRows;
                     ?>"
                        required>
                </div>
            </div>

            <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                    Deezer:
                </div>
                <div class="col-sm-9">
                    <input class="form-control" placeholder="account number of deezer" name="number_deezer" value="<?php 
                        $spotify = $pdo2->prepare("SELECT badge FROM account WHERE title = 'deezer'  ");
                         $spotify->execute();
                         $sRows = $spotify->fetchColumn();
                        echo $sRows;
                     ?>"
                        required>
                </div>
            </div>


            <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                    tidal:
                </div>
                <div class="col-sm-9">
                    <input class="form-control" placeholder="account number of tidal" name="number_tidal" value="<?php 
                        $spotify = $pdo2->prepare("SELECT badge FROM account WHERE title = 'tidal'  ");
                         $spotify->execute();
                         $sRows = $spotify->fetchColumn();
                        echo $sRows;
                     ?>"
                        required>
                </div>
            </div>


            <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                    crunchyroll:
                </div>
                <div class="col-sm-9">
                    <input class="form-control" placeholder="account number of crunchyroll" name="number_crunchyroll"
                        value="<?php 
                        $spotify = $pdo2->prepare("SELECT badge FROM account WHERE title = 'crunchyroll'  ");
                         $spotify->execute();
                         $sRows = $spotify->fetchColumn();
                        echo $sRows;
                     ?>" required>
                </div>
            </div>

            <hr>

            <button type="submit" name="update_account_number" class="btn btn-primary btn-block"><i
                    class="fa fa-edit fa-fw"></i>Update</button>

        </form>
    </div>
</div>

<?php
include'../footer.php';
?>