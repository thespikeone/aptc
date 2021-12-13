<?php
require_once('../public/php/data.php');
$id = $_GET['id'];


$stmt = $pdo->query("SELECT * FROM tickets_comments WHERE ticket_id =$id ORDER BY created ASC");



while($commentss = $stmt->fetch()){

    ?>
<div class="comment">
<br>
    <div>
        <i class="fas fa-comment fa-2x"></i>
    </div>
    <p>
        <?php if($commentss['frome'] == "client"){
            ?>
        <span><?=date('F dS, G:ia', strtotime($commentss['created']))?></span>
        <strong>you:</strong> <?=nl2br(htmlspecialchars($commentss['msg'], ENT_QUOTES))?>
        <?php
        }else{

        ?>
        <span><?=date('F dS, G:ia', strtotime($commentss['created']))?></span>
        <strong> staff:</strong> <?=nl2br(htmlspecialchars($commentss['msg'], ENT_QUOTES))?>
        <?php 

        } ?>
    </p>
</div>

<?php
}
?>