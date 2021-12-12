<?php
session_start();
if($_SESSION["autoriser"]!='oui'){
    header('location:../auth/register.php');
}
include 'functions.php';
require_once('../public/php/data.php');
// Output message variable
$msg = '';

// Check if POST data exists (user submitted the form)
if (isset($_POST['title'], $_POST['msg'])) {
    // Validation checks... make sure the POST data is not empty
   
    if (empty($_POST['title'])  || empty($_POST['msg'])) {
        $msg = 'Please complete the form!';
      
    }  else {
        // Insert new record into the tickets table
        $stmt = $pdo->prepare('INSERT INTO tickets (title, email, msg) VALUES (?, ?, ?)');
        $stmt->execute([ $_POST['title'], $_SESSION['login'], $_POST['msg'] ]);
        // Redirect to the view ticket page, the user will see their created ticket on this page
        header('Location: view.php?id=' . $pdo->lastInsertId());
    }
}
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>APTC - create ticket</title>
    <link rel="icon" type="image/x-icon" href="../public/assets/aptc-gold.png" />

    
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../public/css/styles.css" rel="stylesheet" />
    <?php include_once('../../google.php'); ?>
</head>
<?php include('../nav.php'); ?>

<div class="content create">
    <h2>Create Ticket</h2>

    <form action="create.php" method="post">
        <label for="title">Title</label>
        <input type="text" name="title" placeholder="Title" id="title" required>
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="<?php echo $_SESSION['login']; ?>"
            value="<?php echo $_SESSION['login']; ?>" id="email" disabled required>
        <label for="msg">Message</label>
        <textarea name="msg" placeholder="Enter your message here..." id="msg" required></textarea>
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
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