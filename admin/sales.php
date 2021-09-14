<?php require_once("../includes/session.php");
      require_once("../includes/functions.php");
      include("../includes/backend/header.php");
      include("../includes/backend/sidenav.php") ?>
<?php
  $stock_set = get_items_from_stock();
  $docket_set = get_sales_by_user($_SESSION["username"]);
  $user_sales_count = 1;
  $invoice_no_set = get_invoice_no();
  while ($invoice = mysqli_fetch_assoc($invoice_no_set)) {
      $invoice_no = $invoice["invoice_code"]+1;
      $receipt_no = $invoice["receipt_no"]+1;
  }
  while ($docket = mysqli_fetch_assoc($docket_set)) {
      $docket_no = $docket["docket"]+1;
  }
?>
      <div class="page-wrapper">
                  <!-- ============================================================== -->
                  <!-- Bread crumb and right sidebar toggle -->
                  <!-- ============================================================== -->
                  <div class="page-breadcrumb">
                      <div class="row align-items-center">
                          <div class="col-5">
                              <h4 class="page-title">Sales</h4>
                              <div class="d-flex align-items-center">
                                  <nav aria-label="breadcrumb">
                                      <ol class="breadcrumb">
                                          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                          <li class="breadcrumb-item active" aria-current="page">Sales</li>
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
                          <div class="col-md-7">
                              <div class="card">
                                  <div class="card-body">
                                      <div class="card">
                                          <div class="card-body">
                                            <div class="table-responsive">
                                              <table class="table table-striped" id="table">
                                                <thead>
                                                  <tr>
                                                    <th>Item Name</th>
                                                    <th>QTY.</th>
                                                    <th>Unit Price</th>
                                                    <th>Action</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                  <?php
                                                    while ($stock = mysqli_fetch_assoc($stock_set)) {?>
                                                  <tr>
                                                    <?php $products_set = find_product_byId($stock["product_id"]); ?>
                                                    <?php while ($product = mysqli_fetch_assoc($products_set)) {?>
                                                      <td><?php echo htmlentities($product["product_name"]); ?> <input type="hidden" id="item<?php echo $product["id"] ?>_name" value="<?php echo htmlentities($product["product_name"]); ?>"> </td>
                                                      <td>
                                                        <input type="number" class="qtyinput" name="qty" id="item<?php echo $product["id"] ?>_qty" value="1" min="0" max="<?php echo $stock["qty"] ?>">
                                                      </td>
                                                      <td>&#8358;<?php echo htmlentities($product["unit_price"]); ?> <input type="hidden" id="item<?php echo $product["id"] ?>_price" value="<?php echo htmlentities($product["unit_price"]); ?>"></td>
                                                      <input type="hidden" name="hidden_invoice_no" id="item<?php echo $product["id"] ?>_invoice_no" value="<?php echo $invoice_no ?>">
                                                      <input type="hidden" name="hidden_qty_rmvd_vall" id="item<?php echo $product["id"] ?>_qty_rmvd_val" value="0">
                                                      <td>
                                                          <button type="button" class="btn btn-success btn-action mr-1" onclick="cart('item<?php echo $product["id"] ?>', <?php echo $product["id"] ?>)"><i class="m-r-3 mdi mdi-plus"></i></button>
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
                          <div class="col-md-5">
                            <form id="item_form" method="post">
                              <div class="card">
                                  <div class="card-body">
                                      <h4 class="card-title">Cart</h4>
                                        <div class="table-responsive feed-widget cart">
                                            <table class="table" id="shopping-cart-table">
                                              <thead>
                                                <tr>
                                                  <th>Item Name</th>
                                                  <th>QTY.</th>
                                                  <th>Unit Price</th>
                                                  <th>Amount</th>
                                                  <th>Action</th>
                                                </tr>
                                              </thead>
                                              <tbody id="mycart">

                                              </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <div class="float-right">
                                            <b>Total: &#8358;</b>
                                            <b><span id="final_total_amt">0</span></b>
                                      </div>
                                  </div>
                                <div class="card-footer">
                                    <div class="float-left">
                                      <input type="button" name="clearCart" id="clearCart" class="btn btn-danger" onclick="return confirm('ARE YOU SURE YOU WANT TO EMPTY CART?');" value="Clear">
                                      </div>
                                      <div class="float-right">
                                        <input type="submit" name="insert" class="btn btn-success" value="Post">
                                    </div>
                                </div>
                              </form>
                              </div>
                          </div>

                          <div class="col-md-4" id="print_div">
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="" style="text-align: center">Golden Grill</h2>
                                    <hr>
				<div class="" style="text-align: center">
                                    <h4 class="">*** Customer Invoice ***</h4>
                                    <input type="hidden" name="" id="receipt_no" value="<?php echo $receipt_no ?>">


                                        <small> User: <?php echo $_SESSION["username"]; ?> </small><br>

                                     <input type="hidden" name="" id="invoice_no" value="<?php echo $invoice_no ?>">
                                       <b><h4> Invoice No: <?php echo $invoice_no ?> </h4></b><br>
                                       <b><h5> Docket No: <?php echo $docket_no ?> </h5></b><br>
										<span class="m-b-0">Date: <?php echo date('l') ?></span><strong> <?php echo date('j-m-Y') ?></strong>
                                  </div>
                                  <br>
                                      <div class="feed-widget cart">
                                        <table>
                                          <thead>
                                            <tr>
                                              <th>Item</th>
                                              <th>Qty.</th>
                                              <th>U/Price</th>
                                              <th>Amount</th>
                                            </tr>
                                          </thead>
                                          <tbody id="print_content">


                                          </tbody>
                                        </table>
                                      </div>

                                      <div class="float-right">
					                                   <b>VAT/Service: <span style="text-align: right; float: right">7.5%</span></b><br><hr>
                                             <!-- 7.5%/100 * amount -->
                                             <input type="hidden" id="vat_services" value="">
                                          <b>Sub Total: </b>
                                          <b style="float: right;">&#8358; <span id="r_final_total_amt">0</span></b>
                                    </div><br>
                                    <div class="float-right">
                                      <b>Grand Total: </b>
                                      <b style="float: right;">&#8358; <span id="grand_total">0</span></b>
                                    </div>
                                  <hr>
                          				<h2 class="" style="text-align: center">  THANK YOU </h2>
                          			       <div class="" style="text-align: center">
                          				<i><b>Please Come Again!</b></i>
                          				<i><h2>07080000078</h2></i>
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
