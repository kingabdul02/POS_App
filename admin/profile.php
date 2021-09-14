<?php require_once("../includes/session.php");
      require_once("../includes/functions.php");
      include("../includes/backend/header.php");
      include("../includes/backend/sidenav.php") ?>
<?php if (isset($_SESSION['u_id'])) {
  $id = $_SESSION['u_id'];
} ?>
<?php
  if (isset($_POST["submit"])) {
    $message = "";
    $u_name = mysql_prep($_POST["u_name"]);
    $password = mysql_prep($_POST["password"]);
    $c_password = mysql_prep($_POST["c_password"]);
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $name = mysql_prep($_POST["fullname"]);
    if ($password == $c_password) {
      $query = "UPDATE users SET ";
      $query .= "u_name = '{$u_name}', ";
      $query .= "password = '{$hash}', ";
      $query .= "name = '{$name}' ";
      $query .= "WHERE id = {$id}";
         $result = mysqli_query($conn, $query);
         if ($result) {
             $message = "Record successfully updated.";
         }else {
             $error = "Error updating record.";
         }
    }else {
       $error = "Password do not match.";
    }
  }
 ?>

      <?php $users_set = find_user_by_id($id) ?>
      <div class="page-wrapper">
                  <!-- ============================================================== -->
                  <!-- Bread crumb and right sidebar toggle -->
                  <!-- ============================================================== -->
                  <div class="page-breadcrumb">
                      <div class="row align-items-center">
                          <div class="col-5">
                              <h4 class="page-title">Profile</h4>
                              <div class="d-flex align-items-center">
                                  <nav aria-label="breadcrumb">
                                      <ol class="breadcrumb">
                                          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                          <li class="breadcrumb-item active" aria-current="page">Profile</li>
                                      </ol>
                                  </nav>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="../assets/backend/images/users/1.jpg" class="rounded-circle" width="150" />
                                    <h4 class="card-title m-t-10"><?php echo $_SESSION["username"] ?></h4>
                                    <div class="row text-center justify-content-md-center">
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                                    </div>
                                </center>                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <?php while ($user = mysqli_fetch_assoc($users_set)) {?>
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                      <?php if (isset($error)) {?>
                        <div class="alert alert-danger" id="alert">
                          <a href="#" class="close" id="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                          <strong>Error: </strong> <?php echo $error ?>.
                        </div>
                      <?php }elseif (isset($message)) {?>
                        <div class="alert alert-success" id="alert">
                          <a href="#" class="close" id="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                          <strong>Successful</strong> <?php echo $message ?>.
                        </div>
                      <?php } ?>
                        <div class="card">
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="Profile.php" method="post">
                                    <div class="form-group">
                                        <label class="col-md-12">Full Name</label>
                                        <div class="col-md-12">
                                            <input type="text" name="fullname" placeholder="Fullname" class="form-control form-control-line" value="<?php echo $user["name"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-md-12">Username</label>
                                        <div class="col-md-12">
                                            <input type="text" placeholder="john" name="u_name" class="form-control form-control-line" name="username" required value="<?php echo $user["u_name"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="password" class="form-control form-control-line" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">Confirm Password</label>
                                        <div class="col-md-12">
                                            <input type="password" name="c_password" class="form-control form-control-line" placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <input type="submit" name="submit" class="btn btn-success" value="Upload Profile">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                  <?php } ?>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
          </div>
          <!-- ============================================================== -->
          <!-- End Page wrapper  -->
<?php include("../includes/backend/footer.php") ?>
