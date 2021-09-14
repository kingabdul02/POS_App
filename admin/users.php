<?php require_once("../includes/session.php");
      require_once("../includes/functions.php");
      include("../includes/backend/header.php");
      include("../includes/backend/sidenav.php") ?>
<?php
  $users_set = find_all_users();
?>
<?php
        if (isset($_POST["submit"])) {
           $message = "";
           $u_name = mysql_prep($_POST["u_name"]);
           $password = mysql_prep($_POST["password"]);
           $hash = password_hash($password, PASSWORD_BCRYPT);
           $name = mysql_prep($_POST["fullname"]);
           $user_type_id = $_POST["user_type_id"];

           $query = "insert into users (";
           $query .= "u_name, password, user_type_id, name";
           $query .= ") VALUES (";
           $query .= "'{$u_name}', '{$hash}', {$user_type_id}, '{$name}'";
           $query .= ")";
           $result = mysqli_query($conn, $query);
           if ($result) {
             echo "<meta http-equiv='refresh' content='0'>";
               $message = "Category successfully added.";
           }else {
             echo "<meta http-equiv='refresh' content='0'>";
                $message = "error adding category.";
           }
        }
?>
      <div class="page-wrapper">
                  <!-- ============================================================== -->
                  <!-- Bread crumb and right sidebar toggle -->
                  <!-- ============================================================== -->
                  <div class="page-breadcrumb">
                      <div class="row align-items-center">
                          <div class="col-5">
                              <h4 class="page-title">Users</h4>
                              <div class="d-flex align-items-center">
                                  <nav aria-label="breadcrumb">
                                      <ol class="breadcrumb">
                                          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                          <li class="breadcrumb-item active" aria-current="page">Users</li>
                                      </ol>
                                  </nav>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- ============================================================== -->
                  <!-- End Bread crumb and right sidebar toggle -->
                  <!-- ============================================================== -->
                  <!-- ============================================================== -->
                  <!-- Container fluid  -->
                  <!-- ============================================================== -->
                  <div class="container-fluid">
                      <!-- ============================================================== -->
                      <!-- Sales chart -->
                      <!-- ============================================================== -->
                      <div class="row">
                          <div class="col-md-12">
                            <div class="card">
                              <div class="card-header">
                                <div class="float-right">
                                  <a href="#" id="btn_add" class="btn btn-primary">Add User</a>
                                </div>
                              </div>
                                <div class="card-body">
                                  <div class="table-responsive">
                                    <table class="table table-striped" id="table">
                                      <thead>
                                        <tr>
                                          <th>Username</th>
                                          <th>Full Name</th>
                                          <th>Usertype</th>
                                          <th>Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <?php
                                          while ($user = mysqli_fetch_assoc($users_set)) {?>
                                        <tr>
                                          <td><?php echo htmlentities($user["u_name"]); ?></td>
                                          <td><?php echo htmlentities($user["name"]); ?></td>
                                          <?php $type_set = find_usertype_by_uid($user["user_type_id"]); ?>
                                          <?php while ($type = mysqli_fetch_assoc($type_set)) {?>
                                            <td><?php echo htmlentities($type["type_name"]); ?></td>
                                          <?php } ?>
                                          <td>
                                            <a  href="usersales.php?user=<?php echo urlencode($user["name"]) ?>&date=today" class="btn btn-primary btn-action mr-1" title="View Sales Today"><i class="m-r-3 mdi mdi-eye"></i></a>
                                            <a  href="delete.php?id=<?php echo urlencode($user["id"]) ?>&page=users" class="btn btn-danger btn-action delete" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS RECORD?');" data-toggle="tooltip" title="Delete" name="delete"><i class="m-r-3 mdi mdi-delete"></i></a>
                                          </td>
                                        </tr>
                                      <?php } ?>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                            </div>
                          </div>
                      </div>
                  </div>
                  <!-- ============================================================== -->
                  <!-- End Container fluid  -->
                  <!-- ============================================================== -->
              </div>
              <!-- ============================================================== -->
              <!-- End Page wrapper  -->
              <!-- Modal -->
              <div class="modal fade" id="Modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="card card-primary">
                      <div class="card-header"><h4>Add User</h4></div>
                      <div class="card-body">
                        <form action="users.php" method="post">
                          <div class="row">
                            <div class="form-group col-6">
                              <label for="u_name">Username</label>
                              <input type="text" name="u_name" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group col-6">
                              <label for="password">Password</label>
                              <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-6">
                              <label for="fullname">Username</label>
                              <input type="text" name="fullname" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="form-group col-6">
                              <label for="user_type_id">Usertype</label>
                              <select class="form-control" name="user_type_id">
                                <?php $type_set = find_all_usertype() ?>
                                <?php while ($type = mysqli_fetch_assoc($type_set) ) {?>
                                  <option value="<?php echo $type["id"] ?>"><?php echo $type["type_name"] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                          </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-submit btn-block" onclick="toastr.warning('<?php echo $message ?>');"> Add User</button>
                            </div>
                       </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
<?php include("../includes/backend/footer.php") ?>
