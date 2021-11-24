<?php 
require_once('../session/session.php');
require_once('pdo.php');
@$pass=md5($_POST["pass"]);
@$username=$_POST["user"];
$erreur= "";
  

   if(isset($_POST['btnlogin'])){
                 /* collect data */
            $sel=$pdo->prepare("select * from users where username=? and password=? limit 1");
            $sel->execute(array($username,$pass));
            $user=$sel->fetchAll();

            $sel=$pdo->prepare("select * from employe where number=? limit 1");
            $sel->execute(array($user[0]['number']));
            $user2=$sel->fetchAll();
        
             /* Stock data on session */
            if (count($user)>0) {
              $erreur="";
                $_SESSION["username"]=(strtolower($user[0]["username"]));
                $_SESSION["type"]=(strtolower($user[0]["type"]));
                $_SESSION["number"]=(strtolower($user[0]["number"]));
                $_SESSION["first_name"]=(strtolower($user2[0]["first_name"]));
                $_SESSION["last_name"]=(strtolower($user2[0]["last_name"]));
                $_SESSION["gender"]=(strtolower($user2[0]["gender"]));
                $_SESSION["login"]=(strtolower($user2[0]["login"]));
                $_SESSION["phone_number"]=(strtolower($user2[0]["phone_number"]));
                $_SESSION["hired_date"]=(strtolower($user2[0]["hired_date"]));
                $_SESSION["autoriser"]="oui";
            
              
                header("location:../index.php");
                sleep(3);
                header("Refresh:1");
                


            }else{
              $erreur = '<span style="color: red; font-color: red;">Wrong password Or emaill try again!</span>';
            }

                                /* systeme de cookie */
            }  else {
              $eror = "true";
                
            }

?>