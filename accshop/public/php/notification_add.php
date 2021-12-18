<?php
function pdoConnexion(){
    return new  PDO("mysql:host=mysql-younes.alwaysdata.net;dbname=younes_aptcshop","younes","MOLImoli1");
}
function cmd_confirm(){
    $pdo = pdoConnexion();
    $icon = "fas fa-shopping-basket";
    $bg = "notif-primary";
    $title = "Command Confirme";
    $descr =  $_SESSION['username'] . " " . "has been confirme her command email:" . " ". $_SESSION['login'];
    $link = "";
    $verif_avatar = $pdo->prepare("INSERT INTO aptc_notif_client(ico,bg,title,descr,link) VALUES (?,?,?,?,?)");
    $verif_avatar->execute(array($icon,$bg,$title,$descr,$link));
}

?>