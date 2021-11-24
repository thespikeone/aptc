<?php
include'../php/pdo.php';
?>
<?php
              $firstname = $_POST['firstname'];
              $last_name = $_POST['lastname'];
              $gen = $_POST['gender'];
              $type = $_POST['type'];
              $login= $_POST['email'];
              $phone = $_POST['phonenumber'];
              $username = $_POST['username'];
              $hired_date = $_POST['hireddate'];
              $prov = $_POST['province'];
              $city = $_POST['city'];
              $password = $_POST['password'];
              $number = $_POST['number'];
          

              $ins=$pdo->prepare("insert into users(username,password,type,number) values(?,?,?,?)");
              $ins->execute(array($username,md5($password),$type,$number));
              $ins2=$pdo->prepare("insert into employe(number,first_name,last_name,gender,login,phone_number,province,city,hired_date) values(?,?,?,?,?,?,?,?,?)");
              $ins2->execute(array($number,$first_name,$last_name,$gen,$login,$phone,$prov,$city,$hired_date));

              
           header('location:employee.php');
            ?>