<?php

function pdoConnexion(){
    return new  PDO("mysql:host=mysql-younes.alwaysdata.net;dbname=younes_stockmanager","younes","MOLImoli1");
}
function setting_update(){
    $pdo = pdoConnexion();
  
    $password= md5($_POST['password']);
    #get number
    $vef=$pdo->prepare("select number from users where password=? limit 1");
    $vef->execute(array($password));
    $verif2=$vef->fetchColumn();

    #verif if mdp match with database
    $vef=$pdo->prepare("select id from users where password=? limit 1");
    $vef->execute(array($password));
    $verif=$vef->fetchColumn();

    if($verif == $_POST['id']){
        $username =$_POST['username'];
        $req = $pdo->prepare("UPDATE users SET username=? WHERE id = ?");
        $req->execute(array($username,$verif));
        $first_name=$_POST['firstname'];
        $last_name=$_POST['lastname'];
        $gender=$_POST['gender'];
        $login=$_POST['email'];
        $phone_number=$_POST['phone'];
        $province=$_POST['province'];
        $city=$_POST['city'];
        $req = $pdo->prepare("UPDATE employe SET first_name=?,last_name=?,gender=?,login=?,phone_number=?,province=?,city=? WHERE number= ?");
        $req->execute(array($first_name,$last_name,$gender,$login,$phone_number,$province,$city,$verif2));
       

    }else{
       
    }
  
}
?>