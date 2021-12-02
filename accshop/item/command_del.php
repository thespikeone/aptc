<?php
include_once('../public/php/data.php');
?>
<?php
            session_start();
            $id = $_GET['id'];
            
            $req = $pdo->prepare("DELETE FROM aptc_shop_cart WHERE id=$id and login=? LIMIT 1");
            $req->execute(array($_SESSION['login']));
         
           

              
           header("location:command.php");
            ?>