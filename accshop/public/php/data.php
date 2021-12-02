<?php
   try{
      $pdo=new PDO("mysql:host=mysql-younes.alwaysdata.net;dbname=younes_aptcshop","younes","MOLImoli1");
   }catch(PDOException $e){
      echo $e->getMessage();

   }

    
?>