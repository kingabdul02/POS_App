<?php require_once("includes/session.php") ?>
<?php require_once("includes/db_connection.php") ?>
<?php require_once("includes/functions.php") ?>

<?php
  if (isset($_POST['name'])) {
    $product_id = $_POST['product_id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $count = $_POST['count'];
    $invoice_no = $_POST['invoice_no'];
    $amount = $qty * $price;
    $user = $_SESSION['username'];
  }
 ?>

 <?php
  $output = "<tr id=\"row_$count\" class=\"feed-item row_$count\"";
  $output .= "\">";
  $output .= "<td>";
   $output .= $name;
   $output .= "<input type=\"hidden\" id=\"item_name$count\" class=\"item_name\" name=\"hidden_item_name[]\" value=\"$name\"";
   $output .= "\">";
   $output .= "</td>";
   $output .= "<td>";
    $output .= $qty;
    $output .= "<input type=\"hidden\" id=\"item_qty$count\" class=\"item_qty\" name=\"hidden_qty[]\" value=\"$qty\"";
    $output .= "\">";
    $output .= "</td>";
    $output .= "<td>";
     $output .= $price;
     $output .= "<input type=\"hidden\" id=\"item_price$count\" class=\"item_price\" name=\"hidden_price[]\" value=\"$price\"";
     $output .= "\">";
     $output .= "</td>";
     $output .= "<td>";
      $output .= $amount;
      $output .= "<input type=\"hidden\" id=\"item_amount$count\" class=\"item_amount\" name=\"hidden_amount[]\" value=\"$amount\"";
      $output .= "\">";
      $output .= "</td>";
      $output .= "<input type=\"hidden\" id=\"item_actual_amount$count\" class=\"item_actual_amount\" name=\"hidden_actual_amount[]\" value=\"\"";
      $output .= "\">";
      $output .= "<input type=\"hidden\" id=\"item_final_amount$count\" class=\"item_final_amount\" name=\"hidden_final_amount[]\" value=\"\"";
      $output .= "\">";
      $output .= "<input type=\"hidden\" id=\"user_sold_item$count\" class=\"user_sold_item\" name=\"hidden_user_sold_item[]\" value=\"$user\"";
      $output .= "\">";
      $output .= "<input type=\"hidden\" id=\"invoice_no$count\" class=\"invoice_no\" name=\"hidden_invoice_no[]\" value=\"$invoice_no\"";
      $output .= "\">";
      $output .= "<input type=\"hidden\" id=\"product_id$count\" class=\"hidden_product\" name=\"hidden_product_id[]\" value=\"$product_id\"";
      $output .= "\">";
      $output .= "<td>";
      $output .= "<a href=\"#\" name=\"removeItem\" id=\"$count\" class=\"btn btn-danger removeItem\"";
      $output .= "\">";
      $output .= "x";
      $output .= "</a>";
      $output .= "</td>";
      $output .= "</tr>";
      echo $output;
 ?>
