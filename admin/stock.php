<?php require_once("../includes/session.php");
      require_once("../includes/functions.php");
      include("../includes/backend/header.php");
      include("../includes/backend/sidenav.php") ?>
<?php
  update_stock();
  $stock_set = find_all_stock();
  $user_id = $_SESSION['u_id'];
?>
<?php
              if (isset($_POST["submit"])) {
                 $message = "";
                 $product_id = $_POST["product_id"];
                 $qty = $_POST["qty"];
                 $size = $_POST["size"];
                 $reorder_level = $_POST["reorder_level"];

                 $products_set = find_product_byId($product_id);
                 while ($product = mysqli_fetch_assoc($products_set)) {
                   $unit_price = $product["unit_price"];
                   $total_price = $qty * $unit_price;
                 }

                 $query = "insert into stock (";
                 $query .= "product_id, qty, size, reorder_level, unit_price, total_price";
                 $query .= ") VALUES (";
                 $query .= "{$product_id}, {$qty}, '{$size}', {$reorder_level}, {$unit_price}, {$total_price}";
                 $query .= ")";
                 $result = mysqli_query($conn, $query);
                 if ($result) {
                   $query = "insert into stock_log (";
                   $query .= "product_id, user_id, qty, size, unit_price, total_price";
                   $query .= ") VALUES (";
                   $query .= "{$product_id}, {$user_id}, {$qty}, '{$size}', {$unit_price}, {$total_price}";
                   $query .= ")";
                   $result = mysqli_query($conn, $query);
                   if ($result) {
                     echo "<meta http-equiv='refresh' content='0'>";
                       $message = "Stock successfully updated.";
                   }
                 }else {
                   echo "<meta http-equiv='refresh' content='0'>";
                      $error = "error updating stock.";
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
                              <h4 class="page-title">Stock</h4>
                              <div class="d-flex align-items-center">
                                  <nav aria-label="breadcrumb">
                                      <ol class="breadcrumb">
                                          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                          <li class="breadcrumb-item active" aria-current="page">Stock</li>
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
                                        <div class="float-right">
                                          <a href="#" id="btn_add" class="btn btn-primary">Add Product To Stock</a>
                                        </div>
                                      </div>
                                        <div class="card-body">
                                          <div class="table-responsive">
                                            <table class="table table-striped" id="table">
                                              <thead>
                                                <tr>
                                                  <th>Product</th>
                                                  <th>Unit Price</th>
                                                  <th>QTY.</th>
                                                  <th>Total Price</th>
                                                  <th>Size</th>
                                                  <th>Updated at</th>
                                                  <th>Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                  while ($stock = mysqli_fetch_assoc($stock_set)) {?>
                                                <tr>
                                                  <?php $products_set = find_product_byId($stock["product_id"]); ?>
                                                  <?php while ($product = mysqli_fetch_assoc($products_set)) {?>
                                                    <td><?php echo htmlentities($product["product_name"]); ?></td>
                                                    <td><?php echo htmlentities($product["unit_price"]); ?></td>
                                                  <?php } ?>
                                                  <td><?php echo htmlentities($stock["qty"]); ?></td>
                                                  <td>&#8358;<?php echo htmlentities(number_format($stock["total_price"] * $stock["qty"])); ?></td>
                                                  <td><?php echo htmlentities($stock["size"]); ?></td>
                                                  <td><?php echo htmlentities($stock["updated_at"]); ?></td>
                                                  <td>
                                                    <a  href="edit.php?id=<?php echo urlencode($stock["id"]) ?>&page=stock" class="btn btn-primary btn-action mr-1" title="Edit"><i class="m-r-3 mdi mdi-pencil"></i></a>
                                                    <a  href="delete.php?id=<?php echo urlencode($stock["id"]) ?>&page=stock" class="btn btn-danger btn-action delete" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS RECORD?');" data-toggle="tooltip" title="Delete" name="delete"><i class="m-r-3 mdi mdi-delete"></i></a>
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
                      <div class="card-header"><h4>Add Product To Stock</h4></div>
                      <div class="card-body">
                        <form action="stock.php" method="post">
                          <div class="row">
                            <div class="form-group col-6">
                              <label for="product_id">Product Name</label>
                              <select class="form-control" name="product_id">
                                <?php $products_set = find_all_products() ?>
                                <?php while ($product = mysqli_fetch_assoc($products_set) ) {?>
                                  <option value="<?php echo $product["id"] ?>"><?php echo $product["product_name"] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group col-6">
                              <label for="qty">Qauntity</label>
                              <input type="number" name="qty" class="form-control" placeholder="Qauntity" min="1">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-6">
                              <label for="size">Siz</label>
                              <input type="text" name="size" class="form-control" placeholder="Size">
                            </div>
                            <div class="form-group col-6">
                              <label for="reorder_level">Reorder Level</label>
                              <input type="number" name="reorder_level" class="form-control" placeholder="Reorder Level" min="1">
                            </div>
                          </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-submit btn-block" onclick="toastr.warning('<?php echo $message ?>');"> Add To Stock</button>
                            </div>
                       </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

<?php include("../includes/backend/footer.php") ?>
