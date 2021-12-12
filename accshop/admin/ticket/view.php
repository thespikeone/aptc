<?php 
session_start();
if($_SESSION['confirme']!= "yes"){
    header('location: loginadmin.php');
}
require_once('../../public/php/data.php');

#$api_url = 'http://127.0.0.34/money/MoneyPROJECTFINAL/accshop/api/numuser/1';
#$get_user_number = json_decode(file_get_contents($api_url), true);
#$numuser = $get_user_number[0]['COUNT(*)'];





include 'functions.php';
// Connect to MySQL using the below function

// Check if the ID param in the URL exists
if (!isset($_GET['id'])) {
    exit('No ID specified!');
}
// MySQL query that selects the ticket by the ID column, using the ID GET request variable
$stmt = $pdo->prepare('SELECT * FROM tickets WHERE id = ?');
$stmt->execute([ $_GET['id'] ]);
$ticket = $stmt->fetch(PDO::FETCH_ASSOC);
// Check if ticket exists
if (!$ticket) {
    exit('Invalid ticket ID!');
}
// Update status
if (isset($_GET['status']) && in_array($_GET['status'], array('open', 'closed', 'resolved'))) {
    $stmt = $pdo->prepare('UPDATE tickets SET status = ? WHERE id = ?');
    $stmt->execute([ $_GET['status'], $_GET['id'] ]);
    header('Location: view.php?id=' . $_GET['id']);
    exit;
}
// Check if the comment form has been submitted
if (isset($_POST['msg']) && !empty($_POST['msg'])) {
    // Insert the new comment into the "tickets_comments" table
    $frome = "staff";
    $stmt = $pdo->prepare('INSERT INTO tickets_comments (ticket_id, msg, frome) VALUES (?, ?, ?)');
    $stmt->execute([ $_GET['id'], $_POST['msg'],  $frome]);
    header('Location: view.php?id=' . $_GET['id']);
    exit;
}
$stmt = $pdo->prepare('SELECT * FROM tickets_comments WHERE ticket_id = ? ORDER BY created ASC');
$stmt->execute([ $_GET['id'] ]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>APTC - Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.png" type="image/x-icon" />


</head>

<body data-background-color="dark">
    <div class="wrapper overlay-sidebar">
        <div class="main-header">


            <?php include_once('../header.php'); ?>
        </div>

        <?php include_once('../sidebar.php'); ?>

        <div class="main-panel">
            <div class="content">
                <div class="page-inner">
                    <?php include_once('../page_header.php'); ?>
                    <div class="mt-2 mb-4">
                        <h2 class="text-white pb-2">Welcome back, <?php echo $_SESSION['username'] ?></h2>
                        <h5 class="text-white op-7 mb-4">Yesterday I was clever, so I wanted to change the world. Today
                            I am wise, so I am changing myself.</h5>
                    </div>
                    <div class="row">


                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><?=htmlspecialchars($ticket['title'], ENT_QUOTES)?> <span
                                            class="<?=$ticket['status']?>"> (<?=$ticket['status']?>)</span> <span>From:
                                            <?=$ticket['email']?></span> </h4>
                           
                                    <a href="view.php?id=<?=$_GET['id']?>&status=closed" class="btn btn-danger col-sm-6 col-md-3">Close</a>
                                    <a href="view.php?id=<?=$_GET['id']?>&status=resolved" class="btn btn-warning col-sm-6 col-md-3">Resolve</a>
                                    <a href="view.php?id=<?=$_GET['id']?>&status=open" class="btn btn-success col-sm-6 col-md-3">Open</a>
                              
                               </div>
                                <div class="card-body">


                                    <?php foreach($comments as $comment): ?>
                                    <div class="tab-pane fade active show" id="pills-profile-nobd" role="tabpanel"
                                        aria-labelledby="pills-profile-tab-nobd">
                                        <?php if($comment['frome'] == "staff"){  
                                            ?>
                                        <p class="col-md-4 text-info">


                                            <strong><span><?=date('F dS, G:ia', strtotime($comment['created']))?></span></strong>
                                            <br>
                                            <strong class="text-success"> staff:</strong>
                                            <?=nl2br(htmlspecialchars($comment['msg'], ENT_QUOTES))?>
                                        </p>

                                        <?php
                                    }else{

                                    ?>
                                        <p class="col-md-4 text-primary">
                                            <strong>
                                                <span><?=date('F dS, G:ia', strtotime($comment['created']))?></span></strong>
                                            <br>
                                            <strong class="text-warning">Client:</strong>
                                            <?=nl2br(htmlspecialchars($comment['msg'], ENT_QUOTES))?>
                                        </p>
                                        <?php 

                                  } ?>
                                    </div>
                                    <?php endforeach; ?>

                                    <?php if($ticket['status'] == "open"){
          
                                     ?>
                                    <form action="" method="post">
                                        <textarea name="msg" class="form-control" placeholder="Enter your comment..."
                                            id="comment"></textarea>
                                        <button type="submit" value="Post Comment" class="btn btn-secondary">
                                            <span class="btn-label">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                            Post Comment
                                        </button>
                                    
                                    </form>
                                    <?php
                                    }else {
                                    
                                        ?>


                                    <?php
                                      } ?>
                                </div>
                            </div>
                        </div>



                    </div>




                </div>
            </div>

        </div>


        <!-- var foo = <?php #echo $numuser; ?>; End Custom template -->
    </div>

    <script>
    $('#lineChart').sparkline([0, 4], {
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

    <style>
    .open {
        color: #38b673;
    }

    .closed {
        color: #b63838;
    }

    .resolved{
       color: #ffad46!important;
    }

    </style>
</body>

</html>