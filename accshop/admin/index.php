<?php 
session_start();
if($_SESSION['confirme']!= "yes"){
    header('location: loginadmin.php');
}

$api_url = 'http://127.0.0.34/money/MoneyPROJECTFINAL/accshop/api/numuser/1';
$get_user_number = json_decode(file_get_contents($api_url), true);
$numuser = $get_user_number[0]['COUNT(*)'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>APTC - Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="assets/img/icon.ico" type="image/x-icon" />


</head>

<body data-background-color="dark">
    <div class="wrapper overlay-sidebar">
        <div class="main-header">


            <?php include_once('header.php'); ?>
        </div>

        <?php include_once('sidebar.php'); ?>

        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <?php include_once('page_header.php'); ?>
                    <div class="mt-2 mb-4">
                        <h2 class="text-white pb-2">Welcome back, <?php echo $_SESSION['username'] ?></h2>
                        <h5 class="text-white op-7 mb-4">Yesterday I was clever, so I wanted to change the world. Today
                            I am wise, so I am changing myself.</h5>
                    </div>

					<div class="row">
						<div class="col-md-4">
							<div class="card card-dark bg-primary-gradient">
								<div class="card-body pb-0">
									<div class="h1 fw-bold float-right"></div>
									<h2 class="mb-2"><?php echo $numuser ?></h2>
									<p>Users account shop</p>
									<div class="pull-in sparkline-fix chart-as-background">
										<div id="lineChart"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-dark bg-secondary-gradient">
								<div class="card-body pb-0">
									<div class="h1 fw-bold float-right">-3%</div>
									<h2 class="mb-2">27</h2>
									<p>New Users</p>
									<div class="pull-in sparkline-fix chart-as-background">
										<div id="lineChart2"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card card-dark bg-success2">
								<div class="card-body pb-0">
									<div class="h1 fw-bold float-right">+7%</div>
									<h2 class="mb-2">213</h2>
									<p>Transactions</p>
									<div class="pull-in sparkline-fix chart-as-background">
										<div id="lineChart3"><canvas width="327" height="70" style="display: inline-block; width: 327px; height: 70px; vertical-align: top;"></canvas></div>
									</div>
								</div>
							</div>
						</div>
					</div>



                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">

                    </nav>
                    <div class="copyright ml-auto">
                        2021, made with <i class="fa fa-heart heart text-danger"></i> by <a
                            href="https://www.younes-sarni.ga">TheSpikeOne</a>
                    </div>
                </div>
            </footer>
        </div>


        <!-- End Custom template -->
    </div>

    <script>
		var foo = <?php echo $numuser; ?>;
        $('#lineChart').sparkline([0, foo], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: 'rgba(255, 255, 255, .5)',
        fillColor: 'rgba(255, 255, 255, .15)'
    });

    $('#lineChart2').sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: 'rgba(255, 255, 255, .5)',
        fillColor: 'rgba(255, 255, 255, .15)'
    });

    $('#lineChart3').sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: 'line',
        height: '70',
        width: '100%',
        lineWidth: '2',
        lineColor: 'rgba(255, 255, 255, .5)',
        fillColor: 'rgba(255, 255, 255, .15)'
    });
    </script>


</body>

</html>