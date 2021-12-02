<?php
include'../php/pdo.php';
include'../sidebar.php';
include'func_settings.php';
$acc = $pdo->prepare("
SELECT u.username, u.type, u.number, e.number, u.id, e.first_name, e.last_name, e.gender,
e.login, e.phone_number, e.province, e.city, e.hired_date 
FROM users u LEFT JOIN employe e ON u.number = e.number");
$acc->execute();
$eacc = $acc->fetch();

if(isset($_POST['update'])){
    setting_update();
}



?>
  <div class="card shadow mb-4 col-xs-12 col-md-12 border-bottom-primary">
            <div class="card-header py-3">
              <h4 class="m-2 font-weight-bold text-primary">Edit Account Info</h4>
            </div>
            <div class="card-body">
      

            <form role="form" method="post">
              <input type="hidden" name="id" value="<?php echo $eacc['id'] ?>" />

              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 First Name:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="First Name" name="firstname" value="<?php echo $eacc['first_name'];  ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Last Name:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Last Name" name="lastname" value="<?php echo $eacc['last_name'] ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Gender:
                </div>
                <div class="col-sm-9">
                  <select class='form-control' name='gender' required>
                    <option value="" disabled selected hidden>Select Gender</option>
                    <option value="MEN">MEN</option>
                    <option value="WOMEN">WOMEN</option>
                  </select>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Username:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Username" name="username" value="<?php echo $eacc['username'] ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Password:
                </div>
                <div class="col-sm-9">
                  <input type="password" class="form-control" placeholder="Password" name="password" value="" required>
                  enter your current password.
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Email:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Email" name="email" value="<?php echo $eacc['login'] ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Contact #:
                </div>
                <div class="col-sm-9">
                   <input class="form-control" placeholder="Contact #" name="phone" value="<?php echo $eacc['phone_number'] ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Role:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Role" name="role" value="<?php echo $eacc['type']  ?>" readonly>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Hired Date:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Hired Date" name="hireddate" value="<?php echo $eacc['hired_date'] ?>" readonly>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 Province:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="Province" name="province" value="<?php echo $eacc['province']  ?>" required>
                </div>
              </div>
              <div class="form-group row text-left text-primary">
                <div class="col-sm-3" style="padding-top: 5px;">
                 City / Municipality:
                </div>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="City / Municipality" name="city" value="<?php echo $eacc['city']  ?>" required>
                </div>
              </div>
              
              <hr>

                <button type="submit" name="update" class="btn btn-primary btn-block"><i class="fa fa-edit fa-fw"></i>Update</button>    
                <button type="submit" name="change_pass" class="btn btn-danger btn-block"><i class="fa fa-edit fa-fw"></i>change password</button>    
              </form>  
            </div>
          </div>        

<?php
include'../footer.php';
?>