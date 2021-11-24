<?php
var_dump($_GET);

include'../php/pdo.php';
$id=$_GET['id'];
$statu= "0";
//status 0 delte
//status 
$ins=$pdo->prepare("Update todo SET statu=? WHERE id=$id");
$ins->execute(array($statu));

         
           header('location:todo.php');
?>

