<?php
$stmt = $pdo->prepare('SELECT * FROM aptc_notif_client ORDER BY date DESC');
$stmt->execute();
$notif4 = $stmt->fetchAll(PDO::FETCH_ASSOC);
$notif4_count = count($notif4);

?>

<div class="col-md-<?php if($notif3 == $page_name){ echo "12";}else{ echo "6"; } ?>">
    <div class="card">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title">Notification</div>
              
            </div>
        </div>
        <div class="card-body">
        <?php foreach($notif4 as $nt4){ 
                ?>
            <a style="text-decoration: none;" href="<?php if($notif3 == $page_name){ echo "";}else{ echo "notif/"; } ?>notif_view.php?id=<?= $nt4['id'] ?>">
                <div class="d-flex">
                    <!--class="avatar avatar-online" // class="avatar avatar-offline"  //  class="avatar avatar-away"-->
                    <div class="avatar ">
                        <span class="avatar-title rounded-circle border border-white bg-info">
                        <div class="notif-icon <?= $nt4['bg'] ?>"> <i class="<?= $nt4['ico'] ?>"></i> </div>
                 </span>
                    </div>
                    <div class="flex-1 ml-3 pt-1">

                        <h6 class="text-uppercase fw-bold mb-1"> 
                        <?= $nt4['title'] ?> 
                        </h6>
                        <span class="text-muted"> <strong>Description: <span
                                    class="title"><?= $nt4['descr'] ?></span></strong>
                        </span>
                   
                    </div>
                    <div class="float-right pt-1">
                        <small class="text-muted"><?=date('F dS, G:ia', strtotime($nt4['date']))?></small>
                    </div>
                </div>
            </a>

            <div class="separator-dashed"></div>
            <?php

} ?>
     
        </div>