<?php
session_start();
if($_SESSION["autoriser"]!='oui'){
    header('location:../auth/register.php');
}
include 'functions.php';
// Connect to MySQL using the below function
require_once('../public/php/data.php');
// MySQL query that retrieves  all the tickets from the databse
$stmt = $pdo->prepare('SELECT * FROM tickets where email=? ORDER BY created DESC');
$stmt->execute(array($_SESSION['login']));
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>APTC - Ticket support</title>
    <link rel="icon" type="image/x-icon" href="../public/assets/aptc-gold.png" />

    
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../public/css/styles.css" rel="stylesheet" />
</head>
<?php include('../nav.php'); ?>

<div class="content home">

    <h2>Tickets</h2>
    <div class="btns">
        <a href="create.php" class="btn">Create Ticket</a>
    </div>
    <div class="tickets-list">
        <?php foreach ($tickets as $ticket): ?>
        <div class="container">
            <div class="list-group">
                <a href="view.php?id=<?=$ticket['id']?>" class="list-group-item">
                    <span class="con">
                        <?php if ($ticket['status'] == 'open'): ?>
                        <i style="color: blue;" class="far fa-clock fa-2x"></i>
                        <?php elseif ($ticket['status'] == 'resolved'): ?>
                        <i style="color: green;" class="fas fa-check fa-2x"></i>
                        <?php elseif ($ticket['status'] == 'closed'): ?>
                        <i style="color: red;" class="fas fa-times fa-2x"></i>
                        <?php endif; ?>
                    </span>
                    <span class="con">
                        <span class="title"><?=htmlspecialchars($ticket['title'], ENT_QUOTES)?></span>
                        <span class="msg"><?=htmlspecialchars($ticket['msg'], ENT_QUOTES)?></span>
                    </span>
                    <span
                        class="con created"><strong><?=date('F dS, G:ia', strtotime($ticket['created']))?></strong></span>
                </a>
                <br>
            </div>
        </div>
        <?php endforeach; ?>
        
    </div>
</div>

<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="../public/js/scripts.js"></script>
<?=template_footer()?>
