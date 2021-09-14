<?php require_once("../includes/session.php");
      require_once("../includes/functions.php");
      include("../includes/backend/header.php");
      include("../includes/backend/sidenav.php") ?>
 <?php
    $filter_set = get_sales_today();
    $counter = 0;
    $total_qty_sold = 0;
    $total_price = 0;
    $display_date = 'Sales Report '.date('Y-m-d');
 ?>
      <div class="page-wrapper">
                  <!-- ============================================================== -->
                  <!-- Bread crumb and right sidebar toggle -->
                  <!-- ============================================================== -->
                  <div class="page-breadcrumb">
                      <div class="row align-items-center">
                          <div class="col-5">
                              <h4 class="page-title">Report</h4>
                              <div class="d-flex align-items-center">
                                  <nav aria-label="breadcrumb">
                                      <ol class="breadcrumb">
                                          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                          <li class="breadcrumb-item"><a href="report.php">Report</a></li>
                                          <li class="breadcrumb-item active" aria-current="page">Filter Report</li>
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
                      <div class="row" id="prnt">
                          <div class="col-md-12">
                            <h2 class="text-center">Golden Grill</h2>
                              <div class="card">
                                <div class="card-header">
                                  <div class="float-left">
                                    <h3 class="text-center"><?php echo $display_date ?></h3>
                                  </div>
                                  <div class="float-right">
                                    <button id="print" class="btn btn-primary">Print</button>
                                  </div>
                                </div>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Item Name</th>
                                            <th>Date</th>
                                            <th>QTY.</th>
                                            <th>Unit Price</th>
                                            <th>Total Amount</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            while ($sold_item = mysqli_fetch_assoc($filter_set)) {?>
                                              <?php
                                                $counter++;
                                                $total_qty_sold += $sold_item["qty"];
                                                $total_price += $sold_item["total_price"];
                                               ?>
                                          <tr>
                                            <td><?php echo $counter ?></td>
                                            <td><?php echo htmlentities($sold_item["product_name"]); ?> </td>
                                            <td><?php echo htmlentities($sold_item["sold_at"]); ?> </td>
                                            <td><?php echo htmlentities($sold_item["qty"]); ?> </td>
                                            <td>&#8358;<?php echo htmlentities($sold_item["unit_price"]); ?></td>
                                            <td>&#8358;<?php echo htmlentities($sold_item["total_price"]); ?></td>
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
                  <!-- ============================================================== -->
                  <!-- End Container fluid  -->
                  <!-- ============================================================== -->
              </div>
              <!-- ============================================================== -->
              <!-- End Page wrapper  -->
<?php include("../includes/backend/footer.php") ?>
