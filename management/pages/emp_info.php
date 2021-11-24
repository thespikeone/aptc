<?php
include'../php/pdo.php';
include'../sidebar.php';

$sel=$pdo->prepare("select * from employe where number=? limit 1");
$sel->execute(array($_GET['empid']));
$user2=$sel->fetch();

?>

<center>
    <div class="card shadow mb-4 col-xs-12 col-md-8 border-bottom-primary">
        <div class="card-header py-3">
            <h4 class="m-2 font-weight-bold text-primary">Employees' Detail</h4>
        </div>
        <a href="employee.php" type="button" class="btn btn-primary bg-gradient-primary btn-block"> <i
                class="fas fa-flip-horizontal fa-fw fa-share"></i> Back </a>
        <div class="card-body">



            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Full Name<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                        : <?php echo $user2['first_name']; ?> <?php  echo $user2['last_name']; ?> <br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Gender<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                        : <?php  echo $user2['gender']; ?> <br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Email<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                        : <?php echo $user2['login']; ?> <br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Contact #<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                        : <?php echo $user2['phone_number']; ?> <br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Role<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                        : <?php $sel=$pdo->prepare("select type from users where number=? limit 1");
$sel->execute(array($_GET['empid']));
$user3=$sel->fetch(); echo $user3['type']; ?> <br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Hired Date<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                        : <?php echo $user2['hired_date']; ?> <br>
                    </h5>
                </div>
            </div>
            <div class="form-group row text-left">
                <div class="col-sm-3 text-primary">
                    <h5>
                        Address<br>
                    </h5>
                </div>
                <div class="col-sm-9">
                    <h5>
                        : <?php echo $user2['province']; ?>, <?php echo $user2['city']; ?> <br>
                    </h5>
                </div>
            </div>

        </div>
    </div>

    </div>
    </div>
<?php
include'../footer.php';
?>
