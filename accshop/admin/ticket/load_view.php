<?php
require_once('../../public/php/data.php');
$id = $_GET['id'];


$stmt = $pdo->query("SELECT * FROM tickets_comments WHERE ticket_id =$id ORDER BY created ASC");



while($commentss = $stmt->fetch()){

    ?>

<div class="tab-pane fade active show" id="pills-profile-nobd" role="tabpanel" aria-labelledby="pills-profile-tab-nobd">
    <?php if($commentss['frome'] == "staff"){  
                                            ?>
    <p class="col-md-4 text-info">


        <strong><span><?=date('F dS, G:ia', strtotime($commentss['created']))?></span></strong>
        <br>
        <strong class="text-success"> staff:</strong>
        <?=nl2br(htmlspecialchars($commentss['msg'], ENT_QUOTES))?>
    </p>

    <?php
                                    }else{

                                    ?>
    <p class="col-md-4 text-primary">
        <strong>
            <span><?=date('F dS, G:ia', strtotime($commentss['created']))?></span></strong>
        <br>
        <strong class="text-warning">Client:</strong>
        <?=nl2br(htmlspecialchars($commentss['msg'], ENT_QUOTES))?>
    </p>
    <?php 

                                  } ?>
</div>

<?php
}
?>