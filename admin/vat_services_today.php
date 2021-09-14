<?php require_once("../includes/session.php");
      require_once("../includes/functions.php");
      include("../includes/backend/header.php");
      include("../includes/backend/sidenav.php") ?>
 <?php
    $result_set = get_vat_services_today();
    $counter = 0;
    $total_price = 0;
 ?>
      <div class="page-wrapper">
                  <!-- ============================================================== -->
                  <!-- Bread crumb and right sidebar toggle -->
                  <!-- ============================================================== -->
                  <div class="page-breadcrumb">
                      <div class="row align-items-center">
                          <div class="col-5">
                              <h4 class="page-title">VAT/Services</h4>
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
                      <div class="row">
                          <div class="col-md-12">
                              <div class="card">
                                <div class="card-header">
                                  <div class="float-right">
                                    <a href="vat_services_today.php" class="btn btn-primary">Today</a>
                                    <a href="#" id="btn_add" class="btn btn-primary">Print</a>
                                  </div>
                                </div>
                                  <div class="card-body">
                                    <div class="table-responsive">
                                      <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>VAT/Service</th>
                                            <th>Inovoice No.</th>
                                            <th>Date</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <?php
                                            while ($result = mysqli_fetch_assoc($result_set)) {?>
                                              <?php
                                                $counter++;
                                                $total_price += $result["vat_services"];
                                               ?>
                                          <tr>
                                            <td><?php echo $counter ?></td>
                                            <td>&#8358;<?php echo htmlentities($result["vat_services"]); ?> </td>
                                            <td><?php echo htmlentities($result["invoice_no"]); ?> </td>
                                            <td><?php echo htmlentities($result["date"]); ?> </td>
                                          </tr>
                                        <?php } ?>
                                        </tbody>
                                      </table><hr>
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
