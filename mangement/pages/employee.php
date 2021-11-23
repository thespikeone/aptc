<?php
include'../php/pdo.php';
include'../sidebar.php';
$employe = $pdo->prepare("
SELECT u.username, u.type, u.number, e.number, e.first_name, e.last_name, e.gender,
e.login, e.phone_number, e.province, e.city, e.hired_date 
FROM users u LEFT JOIN employe e ON u.number = e.number");
$employe->execute();
$employee = $employe->fetchAll();

?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h4 class="m-2 font-weight-bold text-primary">Employee&nbsp;<a href="#" data-toggle="modal"
                data-target="#employeeModal" type="button" class="btn btn-primary bg-gradient-primary"
                style="border-radius: 0px;"><i class="fas fa-fw fa-plus"></i></a></h4>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <?php foreach($employee as $em){ 
                    ?>
                <tbody>

            
                    <td>
                        <?= $em['first_name'] ?>
                    </td>
                    <td>
                        <?= $em['last_name'] ?>
                    </td>
                    <td>
                        <?= $em['type'] ?>
                    </td>

                    <td align="right">
                        <div class="btn-group">

                            <a type="button" class="btn btn-primary bg-gradient-primary"
                                href="emp_info.php?empid=<?= $em['number'] ?>"><i class="fas fa-fw fa-list-alt"></i>
                                Details</a>
                            <div class="btn-group">
                                <a type="button" class="btn btn-primary bg-gradient-primary dropdown no-arrow"
                                    data-toggle="dropdown" style="color:white;">
                                    ... <span class="caret"></span></a>
                                <ul class="dropdown-menu text-center" role="menu">
                                    <li>
                                        <a type="button" class="btn btn-warning bg-gradient-warning btn-block"
                                            style="border-radius: 0px;" href="emp_edit.php?empid=<?= $em['number'] ?>">
                                            <i class="fas fa-fw fa-edit"></i> Edit
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>

                    </tr>



                </tbody>
                <?php
                  } ?>
            </table>
        </div>
    </div>
</div>

<?php
include'../footer.php';
?>