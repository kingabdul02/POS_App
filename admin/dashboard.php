<?php require_once("../includes/session.php");
      require_once("../includes/functions.php");
      include("../includes/backend/header.php");
      include("../includes/backend/sidenav.php") ?>
<?php
  $current_date = date('j-m-Y');
  $expensis_set = find_expensis_today();
//  $top_selling_prod_set = get_top_selling_prod();
  $total_qty_sold = 0;
  $total_price = 0;
  $total_expensis = 0;
 ?>
 <style>
    #search_result {
      position: relative;
      margin: 0px auto;
      padding: 0px;
      width: 800px;
      height: 400px;
      overflow: auto;
    }

    </style>
      <div class="page-wrapper">
                  <!-- ============================================================== -->
                  <!-- Bread crumb and right sidebar toggle -->
                  <!-- ============================================================== -->
                  <div class="page-breadcrumb">
                      <div class="row align-items-center">
                          <div class="col-5">
                              <h4 class="page-title">Dashboard</h4>
                              <div class="d-flex align-items-center">
                                  <nav aria-label="breadcrumb">
                                      <ol class="breadcrumb">
                                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                                          <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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
                    <!-- Dashboard Sales -->
                    <div class="card">
                      <div class="row no-gutters">
                      	<aside class="col-md-9">
                          <div class="card-body">
                            <form>
                              <div class="form-group">
                                <label>Search Product</label>
                                <div class="input-group">
                                  <input type="text" class="form-control" name="" id="input_search" oninput="ajaxLiveSearch(this.value);" placeholder="Search Product">
                                  <span class="input-group-append">
                                    <button class="btn btn-primary">Search</button>
                                  </span>
                                </div>
                              </div>
                            </form>
                          </div>
                          <div id="search_result">
                            
                          </div>
                      	</aside> <!-- col.// -->
                      	<aside class="col-md-3 border-left">
                      		<div class="card-body">
                      			<dl class="dlist-align">
                      			  <dt>Total price:</dt>
                      			  <dd class="text-right">$69.00</dd>
                      			</dl>
                      			<dl class="dlist-align">
                      			  <dt>Discount:</dt>
                      			  <dd class="text-right text-danger">- $13.00</dd>
                      			</dl>
                      			<dl class="dlist-align">
                      			  <dt>Total:</dt>
                      			  <dd class="text-right text-dark b"><strong>$80.45</strong></dd>
                      			</dl>
                      			<hr>
                      			<a href="#" class="btn btn-primary btn-block"> Make Purchase </a>
                      			<a href="#" class="btn btn-light btn-block">Continue Shopping</a>
                      		</div> <!-- card-body.// -->
                      	</aside> <!-- col.// -->
                      </div> <!-- row.// -->
                      </div>
                    <!-- ============================================================== -->
                    <!--End Dashboard Sales -->
                    <!-- ============================================================== -->
                    <!-- Sales chart -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-md-flex align-items-center">
                                        <div>
                                            <h4 class="card-title">Sales Summary</h4>
                                            <h5 class="card-subtitle">Overview of Latest Month</h5>
                                        </div>
                                        <div class="ml-auto d-flex no-block align-items-center">
                                            <ul class="list-inline font-12 dl m-r-15 m-b-0">
                                                <li class="list-inline-item text-info"><i class="fa fa-circle"></i> Snacks</li>
                                                <li class="list-inline-item text-primary"><i class="fa fa-circle"></i> Food</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <!-- column -->
                                        <div class="col-lg-12">
                                            <div class="campaign ct-charts"></div>
                                        </div>
                                        <!-- column -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                  <div class="m-l-10 float-left">
                                      <h3 class="m-b-0"><?php echo date('l') ?></h3><strong><?php echo date('j-m-Y') ?></strong>
                                  </div>
                                    <div class="float-right">
                                      <h4 class="text-info"><i class="wi wi-day-sunny"></i></h4>
                                      <span class="d-block text-muted clock-wrapper"></span>
                                    </div>
                                    <br>
                                    <table class="table no-border mini-table m-t-20">
                                      <br><br>
                                        <tbody>
                                          <tr>
                                            <?php   $sold_item_set = get_sales_today(); ?>
                                            <?php while ($item = mysqli_fetch_assoc($sold_item_set)) {?>
                                              <?php
                                                $total_qty_sold += $item["qty"];
                                                $total_price += $item["total_price"];
                                               ?>
                                            <?php } ?>
                                            <tr>
                                              <td class="text-muted">Total Sales Amount:</td>
                                              <td class="font-medium"> <h5>&#8358;<?php echo number_format($total_price) ?></h5> </td>
                                            </tr>
                                            <td class="text-muted">Total Item Sold:</td>
                                            <td class="font-medium"><?php echo $total_qty_sold ?></td>
                                          </tr>
                                            <tr>
                                              <?php while ($exp = mysqli_fetch_assoc($expensis_set)) {?>
                                                <?php
                                                  $total_expensis += $exp["total_price"];
                                                 ?>
                                              <?php } ?>
                                              <td class="text-muted">Expensis:</td>
                                              <td class="font-medium">&#8358;<?php echo $total_expensis ?></td>
                                            </tr>

                                        </tbody>
                                    </table>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Sales chart -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Table -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <!-- column -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- title -->
                                    <div class="d-md-flex align-items-center">
                                        <div>
                                            <h4 class="card-title">Top Selling Products</h4>
                                            <h5 class="card-subtitle">Overview of Top Selling Items</h5>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="dl">
                                                <select class="custom-select">
                                                    <option value="0">Monthly</option>
                                                    <option value="1" selected>Daily</option>
                                                    <option value="2">Weekly</option>
                                                    <option value="3">Yearly</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- title -->
                                </div>
                                <div class="table-responsive">
                                    <table class="table v-middle table" id="table">
                                        <thead>
                                            <tr class="bg-light">
                                                <th class="border-top-0">Product Name</th>
                                                <th class="border-top-0">Total QTY Sold</th>
                                                <th class="border-top-0">Unite Price</th>
                                                <th class="border-top-0">Total Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php $products_set = get_top_selling_product_today() ?>
                                          <?php while ($product = mysqli_fetch_assoc($products_set)) {?>
                                            <tr>
                                              <td><?php echo $product["product_name"] ?></td>
                                              <td><?php echo $product["Quantity"] ?></td>
                                              <td>&#8358;<?php echo number_format($product["unit_price"]) ?></td>
                                              <td>&#8358;<?php echo number_format($product["Total_Amount"]) ?></td>
                                            </tr>
                                          <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- Table -->
                  </div>
                  <!-- ============================================================== -->
                  <!-- End Container fluid  -->
                  <!-- ============================================================== -->
              </div>
              <!-- ============================================================== -->
              <!-- End Page wrapper  -->
              <script>
                 new PerfectScrollbar('#search_result');
              </script>
<?php include("../includes/backend/footer.php") ?>
