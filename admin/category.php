<?php require_once("../includes/session.php");
      require_once("../includes/functions.php");
      include("../includes/backend/header.php");
      include("../includes/backend/sidenav.php") ?>
<?php
  $cat_set = find_all_categories();
?>
<?php
  if (isset($_POST["submit"])) {
     $message = "";
     $category_name = mysql_prep($_POST["cat_name"]);
     $description = mysql_prep($_POST["short_desc"]);

     $query = "insert into category (";
     $query .= "category_name, short_desc";
     $query .= ") VALUES (";
     $query .= "'{$category_name}', '{$description}'";
     $query .= ")";
     $result = mysqli_query($conn, $query);
     if ($result) {
       echo "<meta http-equiv='refresh' content='0'>";
         $message = "Category successfully added.";
     }else {
       echo "<meta http-equiv='refresh' content='0'>";
          $error = "error adding category.";
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
                              <h4 class="page-title">Category</h4>
                              <div class="d-flex align-items-center">
                                  <nav aria-label="breadcrumb">
                                      <ol class="breadcrumb">
                                          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                          <li class="breadcrumb-item active" aria-current="page">Category</li>
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
                                <div class="card-header">
                                  <div class="float-right">
                                    <a href="#" id="btn_add" class="btn btn-primary">Add Category</a>
                                  </div>
                                </div>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table table-striped" id="table">
                                        <thead>
                                          <tr>
                                            <th>Category</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            while ($cat = mysqli_fetch_assoc($cat_set)) {?>
                                          <tr>
                                            <td><?php echo htmlentities($cat["category_name"]); ?></td>
                                            <td><?php echo htmlentities($cat["short_desc"]); ?></td>
                                            <td>
                                              <a  href="edit.php?id=<?php echo urlencode($cat["id"]) ?>&page=category" class="btn btn-primary btn-action mr-1" title="Edit"><i class="m-r-3 mdi mdi-pencil"></i></a>
                                              <a  href="delete.php?id=<?php echo urlencode($cat["id"]) ?>&page=category" class="btn btn-danger btn-action delete" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS RECORD?');" data-toggle="tooltip" title="Delete" name="delete"><i class="m-r-3 mdi mdi-delete"></i></a>
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
                      <div class="card-header"><h4>Add Category</h4></div>
                       <div class="card-body">
                        <form action="category.php" method="post">
                          <div class="row">
                            <div class="form-group col-6">
                              <label for="cat_name">Category Name</label>
                              <input type="text" name="cat_name" class="form-control" placeholder="Category Name" required>
                            </div>
                            <div class="form-group col-6">
                              <label for="short_desc">Description</label>
                              <input type="text" name="short_desc" class="form-control" placeholder="Description">
                            </div>
                          </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-submit btn-block" onclick="toastr.warning('<?php echo $message ?>');"> Add Category</button>
                            </div>
                       </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
<?php include("../includes/backend/footer.php") ?>
