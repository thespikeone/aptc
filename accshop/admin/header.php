	<!-- Fonts and icons -->
	<?php

$page_name = str_replace(dirname($_SERVER['PHP_SELF']).'/', '', $_SERVER['PHP_SELF']); 

$index = "index.php";
$support = "ticket.php";
$view = "view.php";

$ot = "";

if($page_name != $index){
    $ot = "../";
}else{
    $ot = "";
}
?>

	<script src="<?php echo $ot; ?>assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
WebFont.load({
    google: {
        "families": ["Lato:300,400,700,900"]
    },
    custom: {
        "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
            "simple-line-icons"
        ],
        urls: ['<?php echo $ot; ?>assets/css/fonts.min.css']
    },
    active: function() {
        sessionStorage.fonts = true;
    }
});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
	    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php echo $ot; ?>assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->

	<!-- Logo Header -->
	<div class="logo-header" data-background-color="dark2">

	    <a href="<?php echo $ot; ?>index.php" class="logo">
	        <img src="<?php echo $ot; ?>assets/img/logo.png" alt="navbar brand" class="navbar-brand">
	    </a>
	    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse"
	        aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon">
	            <i class="icon-menu"></i>
	        </span>
	    </button>
	    <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
	    <div class="nav-toggle">
	        <button class="btn btn-toggle sidenav-overlay-toggler">
	            <i class="icon-menu"></i>
	        </button>
	    </div>
	</div>
	<!-- End Logo Header -->
	<!-- Navbar Header -->
	<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">

	    <div class="container-fluid">
	        <div class="collapse" id="search-nav">
	            <form class="navbar-left navbar-form nav-search mr-md-3">
	                <div class="input-group">
	                    <div class="input-group-prepend">
	                        <button type="submit" class="btn btn-search pr-1">
	                            <i class="fa fa-search search-icon"></i>
	                        </button>
	                    </div>
	                    <input type="text" placeholder="Search ..." class="form-control">
	                </div>
	            </form>
	        </div>
	        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
	            <li class="nav-item toggle-nav-search hidden-caret">
	                <a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false"
	                    aria-controls="search-nav">
	                    <i class="fa fa-search"></i>
	                </a>
	            </li>
	            <li class="nav-item dropdown hidden-caret">
	                <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown"
	                    aria-haspopup="true" aria-expanded="false">
	                    <i class="fa fa-envelope"></i>
	                </a>
	               <?php require_once('inbox.php') ?>
	            </li>
	            <li class="nav-item dropdown hidden-caret">
	                <a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown"
	                    aria-haspopup="true" aria-expanded="false">
	                    <i class="fa fa-bell"></i>
	                    <span class="notification">4</span>
	                </a>
	                <?php require_once('notif.php') ?>
	            </li>
	            <li class="nav-item dropdown hidden-caret">
	                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
	                    <i class="fas fa-layer-group"></i>
	                </a>
	                <?php require_once('actions.php') ?>
	            </li>
	            <li class="nav-item dropdown hidden-caret">
	                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
	                    <div class="avatar-sm">
	                        <img src="<?php echo $ot; ?>assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
	                    </div>
	                </a>
	                <ul class="dropdown-menu dropdown-user animated fadeIn">
	                    <div class="dropdown-user-scroll scrollbar-outer">
	                        <li>
	                            <div class="user-box">
	                                <div class="avatar-lg"><img src="<?php echo $ot; ?>assets/img/profile.jpg" alt="image profile"
	                                        class="avatar-img rounded"></div>
	                                <div class="u-text">
	                                    <h4><?php echo $_SESSION['username'] ?></h4>
	                                    <p class="text-muted"><?php echo $_SESSION['login'] ?></p><a href="<?php echo $ot; ?>session/profile.php?number=<?php echo $_SESSION['number'] ?>"
	                                        class="btn btn-xs btn-secondary btn-sm">View Profile</a>
	                                </div>
	                            </div>
	                        </li>
	                        <li>
	                            <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="#">My Profile</a>
	                            <a class="dropdown-item" href="#">My Balance</a>
	                            <a class="dropdown-item" href="#">Inbox</a>
	                            <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="#">Account Setting</a>
	                            <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="<?php echo $ot; ?>logout.php">Logout</a>
	                        </li>
	                    </div>
	                </ul>
	            </li>
	        </ul>
	    </div>
	</nav>
	<!-- End Navbar -->
	<!--   Core JS Files   -->
	<script src="<?php echo $ot; ?>assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?php echo $ot; ?>assets/js/core/popper.min.js"></script>
	<script src="<?php echo $ot; ?>assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="<?php echo $ot; ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="<?php echo $ot; ?>assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="<?php echo $ot; ?>assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="<?php echo $ot; ?>assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="<?php echo $ot; ?>assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Chart Circle -->
	<script src="<?php echo $ot; ?>assets/js/plugin/chart-circle/circles.min.js"></script>

	<!-- Datatables -->
	<script src="<?php echo $ot; ?>assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="<?php echo $ot; ?>assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="<?php echo $ot; ?>assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="<?php echo $ot; ?>assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	<!-- Sweet Alert -->
	<script src="<?php echo $ot; ?>assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="<?php echo $ot; ?>assets/js/atlantis.min.js"></script>
	<script src="<?php echo $ot; ?>assets/js/demo.js"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script>
$('#lineChart').sparkline([102, 109, 120, 99, 110, 105, 115], {
    type: 'line',
    height: '70',
    width: '100%',
    lineWidth: '2',
    lineColor: '#177dff',
    fillColor: 'rgba(23, 125, 255, 0.14)'
});

$('#lineChart2').sparkline([99, 125, 122, 105, 110, 124, 115], {
    type: 'line',
    height: '70',
    width: '100%',
    lineWidth: '2',
    lineColor: '#f3545d',
    fillColor: 'rgba(243, 84, 93, .14)'
});

$('#lineChart3').sparkline([105, 103, 123, 100, 95, 105, 115], {
    type: 'line',
    height: '70',
    width: '100%',
    lineWidth: '2',
    lineColor: '#ffa534',
    fillColor: 'rgba(255, 165, 52, .14)'
});
	</script>