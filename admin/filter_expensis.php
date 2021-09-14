<?php require_once("../includes/session.php");
      require_once("../includes/functions.php");
      include("../includes/backend/header.php");
      include("../includes/backend/sidenav.php") ?>
<?php
  if (isset($_POST["submit"])) {
      $message = "";
      $from_date = mysql_prep($_POST["from_date"]);
      $to_date = mysql_prep($_POST["to_date"]);
      $counter = 0;
      $total_qty_sold = 0;
      $total_price = 0;
  }
?>
<?php
  $expensis_set = get_expensis_filtered($from_date,$to_date);
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
                                          <li class="breadcrumb-item"><a href="expensis.php">Expensis</a></li>
                                          <li class="breadcrumb-item active" aria-current="page">Expensis Today</li>
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
                                  <div class="card-body">
                                    <div class="card">
                                      <div class="card-header">
                                        <div class="float-right">
                                          <a href="#" id="btn_Print_Exp" class="btn btn-primary">Print</a>
                                        </div>
                                      </div>
                                        <div class="card-body">
                                          <div class="table-responsive">
                                            <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th>Item Name</th>
                                                  <th>Description</th>
                                                  <th>Date</th>
                                                  <th>QTY.</th>
                                                  <th>Unit Price</th>
                                                  <th>Total Price</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                  while ($exp = mysqli_fetch_assoc($expensis_set)) {?>
                                                    <?php
                                                      $total_qty_sold += $exp["qty"];
                                                      $total_price += $exp["total_price"];
                                                     ?>
                                                <tr>
                                                  <td><?php echo htmlentities($exp["item_name"]); ?></td>
                                                  <td><?php echo htmlentities($exp["short_desc"]); ?></td>
                                                  <td><?php echo htmlentities($exp["added_at"]); ?></td>
                                                  <td><?php echo htmlentities($exp["qty"]); ?></td>
                                                  <td><?php echo htmlentities($exp["unit_price"]); ?></td>
                                                  <td><?php echo htmlentities($exp["total_price"]); ?></td>
                                                </tr>
                                              <?php } ?>
                                              </tbody>
                                            </table>
                                            <div class="float-right"><h4>Total:   <span class="font-medium">&#8358;<?php echo $total_price ?></span></h4></div>
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
<?php include("../includes/backend/footer.php") ?>
