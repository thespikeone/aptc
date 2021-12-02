<?php
include_once('../public/php/data.php');
?>
<?php
              session_start();
              $login = $_SESSION['login'];
              $account_id = $_POST['aid'];
              $account2 = $pdo->prepare("SELECT price FROM account where id=$account_id ");
              $account2->execute();
              $acces2 = $account2->fetchColumn();
         
              $ins=$pdo->prepare("insert into aptc_shop_cart(login,account_id,price) values(?,?,?)");
              $ins->execute(array($login,$account_id,$acces2));
           

              
           header("location:command.php");
            ?>