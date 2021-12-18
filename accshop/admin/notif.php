<?php
$stmt = $pdo->prepare('SELECT * FROM aptc_notif_client ORDER BY date DESC');
$stmt->execute();
$notif = $stmt->fetchAll(PDO::FETCH_ASSOC);
$notif_count = count($notif);

?>

<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
    <li>
        <div class="dropdown-title">You have <?= $notif_count ?> new notification</div>
    </li>
    <li>
        <div class="notif-scroll scrollbar-outer">
            <div class="notif-center">
                <?php foreach($notif as $nt){ 
                ?>
                <a href="<?= $nt['link'] ?>">
                    <div class="notif-icon notif-<?= $nt['bg'] ?>"> <i class="<?= $nt['ico'] ?>"></i> </div>
                    <div class="notif-content">
                        <span class="block">
                        <?= $nt['title'] ?>
                        </span>
                        <span class="time"><?=date('F dS, G:ia', strtotime($nt['date']))?></span>
                    </div>
                </a>
                <?php

                } ?>
                     <!--
                <a href="#">
                    <div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
                    <div class="notif-content">
                        <span class="block">
                            Rahmad commented on Admin
                        </span>
                        <span class="time">12 minutes ago</span>
                    </div>
                </a>
           
                <a href="#">
                    <div class="notif-img">
                        <img src="<?php # echo $ot; ?>assets/img/profile2.jpg" alt="Img Profile">
                    </div>
                    <div class="notif-content">
                        <span class="block">
                            Reza send messages to you
                        </span>
                        <span class="time">12 minutes ago</span>
                    </div>
                </a>
                
                <a href="#">
                    <div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
                    <div class="notif-content">
                        <span class="block">
                            Farrah liked Admin
                        </span>
                        <span class="time">17 minutes ago</span>
                    </div>
                </a>
                -->
            </div>
        </div>
    </li>
    <li>
        <a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
    </li>
</ul>