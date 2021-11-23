<?php
   try{
      $pdo=new PDO("mysql:host=mysql-younes.alwaysdata.net;dbname=younes_stockmanager","younes","MOLImoli1");
   }catch(PDOException $e){
      echo $e->getMessage();

   }

    
?>