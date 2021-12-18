
<?php
require_once('../public/php/data.php');
$id = $_GET['id'];

// Check if the comment form has been submitted
if (isset($_POST['msg']) && !empty($_POST['msg'])) {
    // Insert the new comment into the "tickets_comments" table
    $frome = "staff";
    $stmt = $pdo->prepare('INSERT INTO tickets_comments (ticket_id, msg) VALUES (?, ?)');
    $stmt->execute([ $id, $_POST['msg'] ]);
    header('Location: view.php?id=' . $id);
  
    exit;
}

?>