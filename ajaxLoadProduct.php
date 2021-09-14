<?php require_once("includes/session.php") ?>
<?php require_once("includes/db_connection.php") ?>
<?php require_once("includes/functions.php") ?>

<?php
	$query = "SELECT * FROM stock as t1 LEFT JOIN products as t2 ON t1.product_id";
   $result = mysqli_query($conn, $query);
   if ($result) {
       foreach ($result as $product) {
       	?>
				<article class="card card-body mb-3">
					<div class="row align-items-center">
						<div class="col-md-6">
							<figure class="itemside">
								<div class="aside"><img src="../assets/backend/images/hainanese-chicken-rice.png" class="border img-sm"></div>
								<figcaption class="info">
									<span class="text-muted"><?php echo htmlentities($product["product_name"]); ?> </span>
									<!-- <a href="#" class="title">Jeans bag for hiking </a> -->
									<input type="hidden" id="item<?php echo $product["id"] ?>_name" value="<?php echo htmlentities($product["product_name"]); ?>">
								</figcaption>
							</figure>
						</div> <!-- col.// -->
						<div class="col">
							<div class="input-group input-spinner">
								<div class="input-group-prepend">
								<button class="btn btn-light" type="button" id="button-plus"> <i class="fa fa-minus"></i> </button>
								</div>
								<input type="number" class="qtyinput" name="qty" id="item<?php echo $product["id"] ?>_qty" value="1" min="0" max="<?php echo $product["qty"] ?>">
								<div class="input-group-append">
								<button class="btn btn-light" type="button" id="button-minus"> <i class="fa fa-plus"></i> </button>
								</div>
							</div> <!-- input-group.// -->
						</div> <!-- col.// -->
						<div class="col">
							<div class="price h5">
								&#8358;<?php echo htmlentities($product["unit_price"]); ?>
								<input type="hidden" id="item<?php echo $product["id"] ?>_price" value="<?php echo htmlentities($product["unit_price"]); ?>">
							 </div>
						</div>
						<input type="hidden" name="hidden_invoice_no" id="item<?php echo $product["id"] ?>_invoice_no" value="<?php echo $invoice_no ?>">
						<input type="hidden" name="hidden_qty_rmvd_vall" id="item<?php echo $product["id"] ?>_qty_rmvd_val" value="0">
						<div class="col flex-grow-0 text-right">
							<button type="button" class="btn btn-success" onclick="cart('item<?php echo $product["id"] ?>', <?php echo $product["id"] ?>)"> <i class="fa fa-plus"></i> </button>
						</div>
					</div> <!-- row.// -->
				</article>
				<?php
       }
   }else {
        echo "No data found";
   }
?>
