<?php
session_start();
if($_SESSION["autoriser"]!='oui'){
    header('location:../auth/register.php');
}
include 'functions.php';
// Connect to MySQL using the below function
require_once('../public/php/data.php');
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
    $stmt = $pdo->prepare('INSERT INTO tickets_comments (ticket_id, msg) VALUES (?, ?)');
    $stmt->execute([ $_GET['id'], $_POST['msg'] ]);
    header('Location: view.php?id=' . $_GET['id']);
    exit;
}
$stmt = $pdo->prepare('SELECT * FROM tickets_comments WHERE ticket_id = ? ORDER BY created ASC');
$stmt->execute([ $_GET['id'] ]);
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>APTC - Ticket</title>
    <link rel="icon" type="image/x-icon" href="../public/assets/aptc-gold.png" />


    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../public/css/styles.css" rel="stylesheet" />
</head>
<?php include('../nav.php'); ?>

<div class="content view">

    <h2><?=htmlspecialchars($ticket['title'], ENT_QUOTES)?> <span
            class="<?=$ticket['status']?>">(<?=$ticket['status']?>)</span></h2>

    <div class="ticket">
        <p class="created"><?=date('F dS, G:ia', strtotime($ticket['created']))?></p>
        <p class="msg"><strong></strong><?=nl2br(htmlspecialchars($ticket['msg'], ENT_QUOTES))?></p>


    </div>

    <div class="btns">
        <?php if($ticket['status'] == "open"){
          
          ?>
        <a href="view.php?id=<?=$_GET['id']?>&status=closed" class="btn red">Close</a>
        <a href="view.php?id=<?=$_GET['id']?>&status=resolved" class="btn">Resolve</a>
        <?php
          }else {
           
              ?>


        <?php
          } ?>


    </div>

    <div class="comments">
        <?php foreach($comments as $comment): ?>
        <div class="comment">
            <div>
                <i class="fas fa-comment fa-2x"></i>
            </div>

            <p>

                <?php if($comment['frome'] == "client"){
            ?>
                <span><?=date('F dS, G:ia', strtotime($comment['created']))?></span>
                <strong>you:</strong> <?=nl2br(htmlspecialchars($comment['msg'], ENT_QUOTES))?>
                <?php
        }else{

        ?>
                <span><?=date('F dS, G:ia', strtotime($comment['created']))?></span>
                <strong> staff:</strong> <?=nl2br(htmlspecialchars($comment['msg'], ENT_QUOTES))?>
                <?php 

        } ?>
            </p>
        </div>
        <?php endforeach; ?>
        <?php if($ticket['status'] == "open"){
          
        ?>
        <form action="" method="post">
            <textarea name="msg" placeholder="Enter your comment..."></textarea>
            <input type="submit" value="Post Comment">
        </form>
        <?php
        }else {
         
            ?>


        <?php
        } ?>

    </div>

</div>
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; APTC 2021</p>
        <p class="m-0 text-center text-white"> <a href="../../privacy.php">Terms and Conditions</a></p>
    </div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="../public/js/scripts.js"></script>

<?=template_footer()?>