<?php
function pdoConnexion(){
    return new  PDO("mysql:host=mysql-younes.alwaysdata.net;dbname=younes_aptcshop","younes","MOLImoli1");

}

function NumberUsersByDate(){
    $pdo = pdoConnexion();
    $req = "SELECT id,date From aptc_shop_user";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $articles = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    sendJSON($articles);
}

function CountUsersByDate(){
    $pdo = pdoConnexion();
    $req = "SELECT COUNT(*) From aptc_shop_user";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $articles = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    sendJSON($articles);
}

function getArticleById($id){
    $pdo = pdoConnexion();
    $req = "SELECT * From article where id=:id";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $articles = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    sendJSON($articles);
}

function getUsers(){
    $pdo = pdoConnexion();
    $req = "SELECT id,username,confirme,createdate From user";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $users = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    sendJSON($users);
}

function getUsersById($id){
    $pdo = pdoConnexion();
    $req = "SELECT id,username,confirme,createdate From user where id=:id";
    $stmt = $pdo->prepare($req);
    $stmt->bindValue(":id",$id,PDO::PARAM_INT);
    $stmt->execute();
    $users = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    sendJSON($users);
}

function allusers(){
    $pdo = pdoConnexion();
    $req = "SELECT id,COUNT(*) as num FROM user";
    $stmt = $pdo->prepare($req);
    $stmt->execute();
    $users = $stmt->fetchALL(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    sendJSON($users);
}

function sendJson($infos){
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($infos,JSON_UNESCAPED_UNICODE);
}

?>
