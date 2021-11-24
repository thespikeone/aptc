<?php
var_dump($_POST);
session_start();
include'../php/pdo.php';
//status 0 delte
//status 1 waiting
            $title = $_POST['title'];
            $status = "1";
    

              $ins=$pdo->prepare("insert into todo(title,statu,byy) values(?,?,?)");
              $ins->execute(array($title,$status,$_SESSION['login']));
      

              
           header('location:todo.php');
?>

