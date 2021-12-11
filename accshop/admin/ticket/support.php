<?php
$stmt = $pdo->prepare('SELECT * FROM tickets ORDER BY created DESC');
$stmt->execute();
$tickets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <div class="card-head-row">
                <div class="card-title">Support Tickets</div>
                <div class="card-tools">
                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-today" data-toggle="pill" href="#pills-today"
                                role="tab" aria-selected="true">Today</a>
                        </li>
                        <!--
                        <li class="nav-item">
                            <a class="nav-link " id="pills-week" data-toggle="pill" href="#pills-week" role="tab"
                                aria-selected="false">Week</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab"
                                aria-selected="false">Month</a>
                        </li>
                        -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php foreach ($tickets as $ticket): ?>
            <a style="text-decoration: none;" href="view.php?id=<?=$ticket['id']?>">
                <div class="d-flex">
                    <!--class="avatar avatar-online" // class="avatar avatar-offline"  //  class="avatar avatar-away"-->
                    <div class="avatar avatar-online">
                        <span class="avatar-title rounded-circle border border-white bg-info">
                    <?php $stmt = $pdo->prepare("SELECT username FROM aptc_shop_user where login=?");
                    $stmt->execute(array($ticket['email']));
                    $username = $stmt->fetchColumn();
                    $first = substr($username, 0, 1);
                    echo strtoupper($first); ?></span>
                    </div>
                    <div class="flex-1 ml-3 pt-1">

                        <h6 class="text-uppercase fw-bold mb-1"> 
                            <?php 
                    echo $username
                    ?> <span
                                class="text-<?php if($ticket['status'] == "open"){ echo "success";}elseif($ticket['status'] == "closed"){ echo "danger";}else{ echo "muted";} ?> pl-3"><?= $ticket['status'] ?></span>
                        </h6>
                        <span class="text-muted"> <strong>Title:<span
                                    class="title"><?=htmlspecialchars($ticket['title'], ENT_QUOTES)?></span></strong>
                        </span>
                        <br>
                        <span class="text-muted"> <strong>msg:</strong> <span
                                class="msg"><?=htmlspecialchars($ticket['msg'], ENT_QUOTES)?></span></span>
                    </div>
                    <div class="float-right pt-1">
                        <small class="text-muted"><?=date('F dS, G:ia', strtotime($ticket['created']))?></small>
                    </div>
                </div>
            </a>

            <div class="separator-dashed"></div>
            <?php endforeach; ?>
        </div>