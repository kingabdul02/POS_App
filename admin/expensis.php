<?php require_once("../includes/session.php");
      require_once("../includes/functions.php");
      include("../includes/backend/header.php");
      include("../includes/backend/sidenav.php") ?>
<?php
  $expensis_set = find_all_expensis();
?>
<?php
        if (isset($_POST["submit"])) {
           $message = "";
           $item_name = mysql_prep($_POST["item_name"]);
           $description = mysql_prep($_POST["short_desc"]);
           $qty = $_POST["qty"];
           $unit_price = $_POST["unit_price"];
           $total_price = $qty * $unit_price;

           $query = "insert into expensis (";
           $query .= "item_name, short_desc, qty, unit_price, total_price";
           $query .= ") VALUES (";
           $query .= "'{$item_name}', '{$description}', {$qty}, {$unit_price}, {$total_price}";
           $query .= ")";
           $result = mysqli_query($conn, $query);
           if ($result) {
             echo "<meta http-equiv='refresh' content='0'>";
               $message = "Item successfully added.";
           }else {
             echo "<meta http-equiv='refresh' content='0'>";
                $error = "error adding Item.";
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
                              <h4 class="page-title">Expensis</h4>
                              <div class="d-flex align-items-center">
                                  <nav aria-label="breadcrumb">
                                      <ol class="breadcrumb">
                                          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                          <li class="breadcrumb-item active" aria-current="page">Expensis</li>
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
                                  <div class="card-body">
                                    <div class="card">
                                      <div class="card-header">
                                        <div class="float-left">
                                          <a href="filter_exp_today.php" class="btn btn-primary">Today</a>
                                          <a href="#" id="btn_filter_exp"  class="btn btn-primary">Filter Exp. by Date</a>
                                        </div>
                                        <div class="float-right">
                                          <a href="#" id="btn_add" class="btn btn-primary">Add Item</a>
                                        </div>
                                      </div>
                                        <div class="card-body">
                                          <div class="table-responsive">
                                            <table class="table table-striped" id="table">
                                              <thead>
                                                <tr>
                                                  <th>Item Name</th>
                                                  <th>Description</th>
                                                  <th>QTY.</th>
                                                  <th>Unit Price</th>
                                                  <th>Total Price</th>
                                                  <th>Date</th>
                                                  <?php if ($_SESSION['user_type'] == 1) {?>
                                                    <th>Actions</th>
                                                  <?php } ?>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                  while ($exp = mysqli_fetch_assoc($expensis_set)) {?>
                                                <tr>
                                                  <td><?php echo htmlentities($exp["item_name"]); ?></td>
                                                  <td><?php echo htmlentities($exp["short_desc"]); ?></td>
                                                  <td><?php echo htmlentities($exp["qty"]); ?></td>
                                                  <td><?php echo htmlentities($exp["unit_price"]); ?></td>
                                                  <td><?php echo htmlentities($exp["total_price"]); ?></td>
                                                  <td><?php echo htmlentities($exp["added_at"]); ?></td>
                                                  <?php if ($_SESSION['user_type'] == 1) {?>
                                                    <td>
                                                      <a  href="edit.php?id=<?php echo urlencode($exp["id"]) ?>&page=expensis" class="btn btn-primary btn-action mr-1" title="Edit"><i class="m-r-3 mdi mdi-pencil"></i></a>
                                                      <a  href="delete.php?id=<?php echo urlencode($exp["id"]) ?>&page=expensis" class="btn btn-danger btn-action delete" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS RECORD?');" data-toggle="tooltip" title="Delete" name="delete"><i class="m-r-3 mdi mdi-delete"></i></a>
                                                    </td>
                                                  <?php } ?>
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
                      <div class="card-header"><h4>Add Item</h4></div>
                      <div class="card-body">
                        <form action="expensis.php" method="post">
                          <div class="row">
                            <div class="form-group col-6">
                              <label for="item_name">Item Name</label>
                              <input type="text" name="item_name" class="form-control" placeholder="Item Name" required>
                            </div>
                            <div class="form-group col-6">
                              <label for="short_desc">Description</label>
                              <input type="text" name="short_desc" class="form-control" placeholder="Description">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-6">
                              <label for="qty">QTY.</label>
                              <input type="number" name="qty" class="form-control" placeholder="Qauntity" required>
                            </div>
                            <div class="form-group col-6">
                              <label for="unit_price">Unit Price</label>
                              <input type="number" name="unit_price" class="form-control" placeholder="Unit Price" required>
                            </div>
                          </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-submit btn-block" onclick="toastr.warning('<?php echo $message ?>');"> Add Expensis</button>
                            </div>
                       </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="modal fade" id="Modal_filter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="card card-primary">
                      <div class="card-header"><h4>Filter Expensis By Date</h4></div>
                       <div class="card-body">
                            <form class="" action="filter_expensis.php" method="post">
                              <div class="row">
                              <div class="form-group col-6">
                                <label for="from_date">From Date</label>
                                <input type="text" name="from_date" id="from_date" class="form-control" required placeholder="yyyy-mm-dd">
                              </div>
                              <div class="form-group col-6">
                                <label for="to_date">To Date</label>
                                <input type="text" name="to_date" id="to_date" class="form-control" required placeholder="yyyy-mm-dd">
                              </div>
                            </div>
                              <div class="form-group">
                                  <button type="submit" name="submit" id="submit" class="btn btn-submit btn-block"> Filter</button>
                              </div>
                            </form>
                          </div>
                    </div>
                  </div>
                </div>
              </div>
<?php include("../includes/backend/footer.php") ?>
