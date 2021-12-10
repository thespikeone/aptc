<?php
//https://www.youtube.com/watch?v=OxQRnuD0JXk
require_once("./api.php");
try{
    if(!empty($_GET['request'])){
        $url = explode("/", filter_var($_GET['request'],FILTER_SANITIZE_URL));
        switch($url[0]){
            case "numuser":
                if (empty($url[1])) {
                    NumberUsersByDate();
                }else{
                    CountUsersByDate($url[1]);
                }
            break;

            case "article":
                if(!empty($url[1])){
                    getArticleById($url[1]);
                }else{
                    throw new Exception("bad request number of article don defined");
                }
               
            break;

            default: throw new Exception("request not valid, try to verify URL");
        }
    }else{
        throw new Exception("error requeste data");
    }
}catch(Exception $e){
    $erreur =[
        "message" => $e->getMessage(),
        "code"=> $e->getCode()
    ];
    print_r($erreur);
}
?>