<?php
  require('session/session.php');
  confirm_logged_in();
?>
<?php $page_name = str_replace(dirname($_SERVER['PHP_SELF']).'/', '', $_SERVER['PHP_SELF']); 

$index = "index.php";
$emp = "employee.php";
$todo = "todo.php";
$ashop = "acc_shop.php";
$ot = "";

if($page_name != $index){
    $ot = "../";
}else{
    $ot = "";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.5);
  z-index: 2;
  cursor: pointer;
}
#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
}
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>APTC System</title>
  <link rel="icon" href="<?php echo $ot; ?>assets/img/logo/aptc-gold.png">

  <!-- Custom fonts for this template-->
  <link href="<?php echo $ot; ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?php echo $ot; ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="<?php echo $ot; ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
          
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon ">
          <img src="<?php echo $ot; ?>assets/img/logo/aptc-gold.png" style="width: 40px;" alt="">
        </div>
        <div class="sidebar-brand-text mx-3">APTC System</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item <?php if($page_name == $index){ echo "active"; } ?>">
        <a class="nav-link" href="<?php echo $ot; ?>index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Home</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Action
      </div>
      <!-- Tables Buttons -->
      <li class="nav-item  <?php if($page_name == $todo){ echo "active"; } ?>">
        <a class="nav-link" href="<?php echo $ot; ?>pages/todo.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Todo</span></a>
      </li>

      <li class="nav-item <?php if($page_name == $emp){ echo "active"; } ?>">
        <a class="nav-link" href="<?php echo $ot; ?>pages/employee.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Employee</span></a>
      </li>

      <li class="nav-item <?php if($page_name == $ashop){ echo "active"; } ?>">
        <a class="nav-link" href="<?php echo $ot; ?>pages/acc_shop.php">
        <i class="fas fa-money-check"></i>
          <span>ACC-Shop</span></a>
      </li>
      
 
     
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
    <?php include_once 'topbar.php'; ?>
