<?php require_once("../includes/session.php");
      require_once("../includes/functions.php");
      include("../includes/backend/header.php");
      include("../includes/backend/sidenav.php")?>
<?php
  if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $page = $_GET["page"];
  }
 ?>
 <?php
 if (isset($_POST["submit"])) {
        if ($page == "category") {
            $message = "";
            $category_name = mysql_prep($_POST["cat_name"]);
            $description = mysql_prep($_POST["short_desc"]);

            $query = "UPDATE category SET ";
            $query .= "category_name = '{$category_name}', ";
            $query .= "short_desc = '{$description}' ";
            $query .= "WHERE id = {$id}";
               $result = mysqli_query($conn, $query);
               if ($result) {
                   $message = "Record successfully updated.";
               }else {
                   $message = "Error updating record.";
               }
        }elseif ($page == "products") {
          $message = "";
          $product_name = mysql_prep($_POST["product_name"]);
          $description = mysql_prep($_POST["short_desc"]);
          $category_id = $_POST["category_id"];
          $unit_price = $_POST["unit_price"];

          $query = "UPDATE products SET ";
          $query .= "product_name = '{$product_name}', ";
          $query .= "short_desc = '{$description}', ";
          $query .= "category_id = {$category_id}, ";
          $query .= "unit_price = {$unit_price} ";
          $query .= "WHERE id = {$id}";
             $result = mysqli_query($conn, $query);
             if ($result) {
                 $message = "Record successfully updated.";
             }else {
                 $message = "Error updating record.";
             }
        }elseif ($page == "users") {
          // code...
        }else {
           $message = "Error updating record.";
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
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo $page ?>.php"><?php echo $page ?></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit <?php echo $page ?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="card card-primary">
              <?php if ($page == "category") {?>
                <div class="card-body">
                  <?php
                  if (isset($message)) {
                    echo $message;
                    }
                   ?>
                   <form action="edit.php?id=<?php echo $id ?>&page=category" method="post" enctype="multipart/form-data">
                     <?php $cat_set = find_category_byId($id); ?>
                     <?php
                       while ($cat = mysqli_fetch_assoc($cat_set)) {?>
                         <div class="row">
                           <div class="form-group col-6">
                             <label for="cat_name">Category Name</label>
                             <input type="text" name="cat_name" class="form-control" placeholder="Category Name" value="<?php echo htmlentities($cat["category_name"]); ?>">
                           </div>
                           <div class="form-group col-6">
                             <label for="short_desc">Description</label>
                             <input type="text" name="short_desc" class="form-control" placeholder="Description" value="<?php echo htmlentities($cat["short_desc"]); ?>">
                           </div>
                         </div>
                       <?php } ?>
                       <div class="form-group">
                           <button type="submit" name="submit" class="btn btn-primary btn-block" onclick="toastr.warning('<?php echo $message ?>');">Update Record</button>
                       </div>
                  </form>
                </div>
              <?php }elseif ($page == "products") {?>
                <div class="card-body">
                  <?php
                  if (isset($message)) {
                    echo $message;
                    }
                   ?>
                   <form action="edit.php?id=<?php echo $id ?>&page=products" method="post" enctype="multipart/form-data">
                     <?php $products_set = find_product_byId($id); ?>
                     <?php
                       while ($product = mysqli_fetch_assoc($products_set)) {?>
                         <div class="row">
                           <div class="form-group col-6">
                             <label for="product_name">Product Name</label>
                             <input type="text" name="product_name" class="form-control" placeholder="Product Name" required value="<?php echo $product["product_name"] ?>">
                           </div>
                           <div class="form-group col-6">
                             <label for="short_desc">Description</label>
                             <input type="text" name="short_desc" class="form-control" placeholder="Description" value="<?php echo $product["short_desc"] ?>">
                           </div>
                         </div>
                         <div class="row">
                           <div class="form-group col-6">
                             <label for="category_id">Category</label>
                             <select class="form-control" name="category_id">
                               <?php $cat_set = find_all_categories() ?>
                               <?php while ($cat = mysqli_fetch_assoc($cat_set) ) {?>
                                 <option value="<?php echo $cat["id"] ?>"><?php echo $cat["category_name"] ?></option>
                               <?php } ?>
                             </select>
                           </div>
                           <div class="form-group col-6">
                             <label for="unit_price">Unit Price</label>
                             <input type="number" name="unit_price" class="form-control" placeholder="Unit Price" required value="<?php echo $product["unit_price"] ?>">
                           </div>
                         </div>
                       <?php } ?>
                       <div class="form-group">
                           <button type="submit" name="submit" class="btn btn-primary btn-block" onclick="toastr.warning('<?php echo $message ?>');">Update Record</button>
                       </div>
                  </form>
                </div>
              <?php }elseif ($page == "users") {?>
                <div class="card-body">

                </div>
              <?php }elseif (!isset($page)) {?>
                <div class="card-body">

                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php include("../includes/backend/footer.php") ?>
