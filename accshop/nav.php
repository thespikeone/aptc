<?php

$page_name = str_replace(dirname($_SERVER['PHP_SELF']).'/', '', $_SERVER['PHP_SELF']); 

$index = "index.php";


$ot = "";

if($page_name != $index){
    $ot = "../";
}else{
    $ot = "";
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">APTC SHOP</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?php echo $ot; ?>index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">About</a></li>

            </ul>
            <form class="d-flex">
                <?php if($_SESSION["autoriser"]=='oui'){ ?>
                    <a class="btn btn-outline-dark" href="<?php echo $ot; ?>item/account.php">
                    <i class="bi bi-person-fill me-1"></i>
                    account: <?php echo $_SESSION['username'] ?>
                </a>
                <a style="margin-left: 10px;" class="btn btn-outline-dark" href="<?php echo $ot; ?>item/command.php">
                    <i class="bi bi-basket-fill me-1"></i>
                    My command
                </a>
               
                <?php }else{ ?>
                <a class="btn btn-outline-dark" href="<?php echo $ot; ?>auth/login.php">
                    <i class="bi bi-person-fill me-1"></i>
                    Login/register
                </a>
                <?php } ?>
                 
            </form>
            

        </div>
    </div>
</nav>