<?php require_once("includes/session.php") ?>
<?php require_once("includes/db_connection.php") ?>
<?php require_once("includes/functions.php") ?>

<?php
  if (isset($_GET['input_val'])) {
    $input_val = $_GET['input_val'];

		$query = "SELECT * FROM stock as t1 LEFT JOIN products as t2 ON t1.product_id = t2.id WHERE t2.product_name LIKE '%$input_val%'";
	   $result = mysqli_query($conn, $query);
	   if ($result) {
	       foreach ($result as $data) {
	       	?>
          <article class="card card-body mb-3">
            <div class="row align-items-center">
              <div class="col-md-6">
                <figure class="itemside">
                  <div class="aside"><img src="../assets/backend/images/hainanese-chicken-rice.png" class="border img-sm"></div>
                  <figcaption class="info">
                    <span class="text-muted"><?php echo $data["product_name"] ?></span>
                    <!-- <a href="#" class="title">Jeans bag for hiking </a> -->
                  </figcaption>
                </figure>
              </div> <!-- col.// -->
              <div class="col">
                <div class="input-group input-spinner">
                  <div class="input-group-prepend">
                  <button class="btn btn-light" type="button" id="button-plus"> <i class="fa fa-minus"></i> </button>
                  </div>
                  <input type="text" class="form-control" value="<?php echo $data["qty"] ?>">
                  <div class="input-group-append">
                  <button class="btn btn-light" type="button" id="button-minus"> <i class="fa fa-plus"></i> </button>
                  </div>
                </div> <!-- input-group.// -->
              </div> <!-- col.// -->
              <div class="col">
                <div class="price h5"> N<?php echo $data["unit_price"] ?> </div>
              </div>
              <div class="col flex-grow-0 text-right">
                <a href="#" class="btn btn-success"> <i class="fa fa-plus"></i> </a>
              </div>
            </div> <!-- row.// -->
          </article>
					<?php
	       }
	   }else {
	        echo "No data found";
	   }
  }
?>
