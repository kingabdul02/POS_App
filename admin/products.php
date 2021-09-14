<?php require_once("../includes/session.php");
      require_once("../includes/functions.php");
      include("../includes/backend/header.php");
      include("../includes/backend/sidenav.php") ?>
<?php
  $products_set = find_all_products();
?>
<?php
        if (isset($_POST["submit"])) {
           $message = "";
           $product_name = mysql_prep($_POST["product_name"]);
           $description = mysql_prep($_POST["short_desc"]);
           $category_id = $_POST["category_id"];
           $unit_price = $_POST["unit_price"];
           $purchase_price = $_POST["purchase_price"];

           $query = "insert into products (";
           $query .= "product_name, short_desc, category_id, unit_price, purchase_price";
           $query .= ") VALUES (";
           $query .= "'{$product_name}', '{$description}', {$category_id}, {$unit_price}, {$purchase_price}";
           $query .= ")";
           $result = mysqli_query($conn, $query);
           if ($result) {
             echo "<meta http-equiv='refresh' content='0'>";
               $message = "Product successfully added.";
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
                              <h4 class="page-title">Products</h4>
                              <div class="d-flex align-items-center">
                                  <nav aria-label="breadcrumb">
                                      <ol class="breadcrumb">
                                          <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                          <li class="breadcrumb-item active" aria-current="page">Products</li>
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
                                          <a href="#" id="btn_add" class="btn btn-primary">Add Product</a>
                                        </div>
                                      </div>
                                        <div class="card-body">
                                          <div class="table-responsive">
                                            <table class="table table-striped" id="table">
                                              <thead>
                                                <tr>
                                                  <th>Product Name</th>
                                                  <th>Description</th>
                                                  <th>Category</th>
                                                  <th>Purchasing Price</th>
                                                  <th>Selling Price</th>
                                                  <th>Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                  while ($product = mysqli_fetch_assoc($products_set)) {?>
                                                <tr>
                                                  <td><?php echo htmlentities($product["product_name"]); ?></td>
                                                  <td><?php echo htmlentities($product["short_desc"]); ?></td>
                                                  <?php $cat_set = find_category_byId($product["category_id"]); ?>
                                                  <?php while ($cat = mysqli_fetch_assoc($cat_set)) {?>
                                                    <td><?php echo htmlentities($cat["category_name"]); ?></td>
                                                  <?php } ?>
                                                  <td><?php echo htmlentities($product["purchase_price"]); ?></td>
                                                  <td><?php echo htmlentities($product["unit_price"]); ?></td>
                                                  <td>
                                                    <a  href="edit.php?id=<?php echo urlencode($product["id"]) ?>&page=products" class="btn btn-primary btn-action mr-1" title="Edit"><i class="m-r-3 mdi mdi-pencil"></i></a>
                                                    <a  href="delete.php?id=<?php echo urlencode($product["id"]) ?>&page=products" class="btn btn-danger btn-action delete" onclick="return confirm('ARE YOU SURE YOU WANT TO DELETE THIS RECORD?');" data-toggle="tooltip" title="Delete" name="delete"><i class="m-r-3 mdi mdi-delete"></i></a>
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
                      <div class="card-header"><h4>Add C</h4></div>
                      <div class="card-body">
                        <form action="products.php" method="post">
                          <div class="row">
                            <div class="form-group col-6">
                              <label for="product_name">Product Name</label>
                              <input type="text" name="product_name" class="form-control" placeholder="Product Name" required>
                            </div>
                            <div class="form-group col-6">
                              <label for="short_desc">Description</label>
                              <input type="text" name="short_desc" class="form-control" placeholder="Description">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-4">
                              <label for="category_id">Category</label>
                              <select class="form-control" name="category_id">
                                <?php $cat_set = find_all_categories() ?>
                                <?php while ($cat = mysqli_fetch_assoc($cat_set) ) {?>
                                  <option value="<?php echo $cat["id"] ?>"><?php echo $cat["category_name"] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group col-4">
                              <label for="purchase_price">Purchasing Price</label>
                              <input type="number" name="purchase_price" class="form-control" placeholder="Purchasing Price" required>
                            </div>
                            <div class="form-group col-4">
                              <label for="unit_price">Selling Price</label>
                              <input type="number" name="unit_price" class="form-control" placeholder="Selling Price" required>
                            </div>
                          </div>                          
                          </div>
                            <div class="form-group">
                                <button type="submit" name="submit" class="btn btn-submit btn-block" onclick="toastr.warning('<?php echo $message ?>');"> Add Product</button>
                            </div>
                       </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
<?php include("../includes/backend/footer.php") ?>
