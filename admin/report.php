<?php require_once("../includes/session.php");
      require_once("../includes/functions.php");
      include("../includes/backend/header.php");
      include("../includes/backend/sidenav.php") ?>
<?php
  $sales_report_set = get_sales_report();
  $current_date = date('Y-m-j');
?>
      <div class="page-wrapper">
                  <!-- ============================================================== -->
                  <!-- Bread crumb and right sidebar toggle -->
                  <!-- ============================================================== -->
                  <div class="page-breadcrumb">
                      <div class="row align-items-center">
                          <div class="col-5">
                              <h4 class="page-title">Sales Report</h4>
                              <div class="d-flex align-items-center">
                                  <nav aria-label="breadcrumb">
                                      <ol class="breadcrumb">
                                          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                          <li class="breadcrumb-item active" aria-current="page">Sales Report</li>
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
                                            <div class="button-group">
                                              <a href="filter_report_today.php" class="btn btn-primary">Today</a>
                                              <a href="#" id="btn_add" class="btn btn-primary">Filter Report By Date</a>
                                            </div>
                                          </div>
                                        </div>
                                          <div class="card-body">
                                            <div class="table-responsive">
                                              <table class="table table-striped" id="table">
                                                <thead>
                                                  <tr>
                                                    <th>Item Name</th>
                                                    <th>QTY.</th>
                                                    <th>Unit Price</th>
                                                    <th>Total Amount</th>
                                                    <th>Date</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <?php
                                                    while ($sold_item = mysqli_fetch_assoc($sales_report_set)) {?>
                                                  <tr>
                                                    <td><?php echo htmlentities($sold_item["product_name"]); ?> </td>
                                                    <td><?php echo htmlentities($sold_item["qty"]); ?> </td>
                                                    <td>&#8358;<?php echo htmlentities($sold_item["unit_price"]); ?></td>
                                                    <td>&#8358;<?php echo htmlentities($sold_item["total_price"]); ?></td>
                                                    <td><?php echo htmlentities($sold_item["sold_at"]); ?> </td>
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
                      <div class="card-header"><h4>Filter Report By Date<</h4></div>
                       <div class="card-body">
                            <form class="" action="filter_report.php" method="post">
                              <div class="row">
                              <div class="form-group col-6">
                                <label for="from_date">From Date</label>
                                <input type="date" name="from_date" id="from_date" class="form-control" required placeholder="yyyy-mm-dd">
                              </div>
                              <div class="form-group col-6">
                                <label for="to_date">To Date</label>
                                <input type="date" name="to_date" id="to_date" class="form-control" required placeholder="yyyy-mm-dd">
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
            </div>
          </div>
<?php include("../includes/backend/footer.php") ?>
