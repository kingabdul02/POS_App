<?php
function redirect_to($url){
  header("Location: ". $url);
  exit;
}

function mysql_prep($string){
  global $conn;
  $escaped_string = mysqli_real_escape_string($conn, $string);
  return $escaped_string;
}

function confirm_query($result_set){
    if (!$result_set) {
        die("databse query failed");
    }
}

function find_all_categories(){
  global $conn;
  $query = "select * from category";
  $cat_set = mysqli_query($conn, $query);
  confirm_query($cat_set);
  return $cat_set;
}

function find_category_byId($id){
  global $conn;
  $query = "select * from category WHERE id = $id";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function find_all_products(){
  global $conn;
  $query = "select * from products";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function find_product_byId($id){
  global $conn;
  $query = "select * from products WHERE id = $id";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function find_all_users(){
  global $conn;
  $query = "select * from users";
  $cat_set = mysqli_query($conn, $query);
  confirm_query($cat_set);
  return $cat_set;
}

function find_user_by_id($id){
  global $conn;
  $query = "select * from users WHERE id = $id";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function find_usertype_by_uid($uid){
  global $conn;
  $query = "select * from user_type WHERE id = $uid";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function find_all_usertype(){
  global $conn;
  $query = "select * from user_type";
  $cat_set = mysqli_query($conn, $query);
  confirm_query($cat_set);
  return $cat_set;
}

function find_all_expensis(){
  global $conn;
  $query = "select * from expensis";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function find_all_stock(){
  global $conn;
  $query = "select * from stock";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function find_expensis_today(){
  global $conn;
  $date = date('Y-m-d');
  $query = "select * from expensis WHERE added_at LIKE '$date%'";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function get_expensis_filtered($from_date, $to_date){
  global $conn;
  $query = "select * from expensis WHERE added_at BETWEEN '$from_date%' AND '$to_date%'";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function get_sales_report(){
  global $conn;
  $query = "select * from sales";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}


function get_invoice_no(){
  global $conn;
  $query = "select * from invoice_code";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function update_invoice_no($invoice_no){
     global $conn;
     $query = "UPDATE `invoice_code` SET `invoice_code` = '{$invoice_no}' WHERE `invoice_code`.`id` = 4";
     $result = mysqli_query($conn, $query);
     return $result;
}

function updateStock($action, $qty, $product_id){
     global $conn;
     if ($action == "decrement") {
       $query = "UPDATE `stock` SET `qty` = 'qty - {$qty}' WHERE `id`.`id` = {$id}";
     }elseif ($action == "increment") {
       $query = "UPDATE `stock` SET `qty` = 'qty + {$qty}' WHERE `id`.`id` = {$id}";
     }
     $result = mysqli_query($conn, $query);
     return $result;
}

function get_sales_today(){
  global $conn;
  $date = date('Y-m-d');
  $query = "select * from sales WHERE sold_at LIKE '$date%' order by sold_at DESC";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function get_sales_report_filtered($from_date, $to_date){
  global $conn;
  $query = "select * from sales WHERE sold_at BETWEEN '$from_date%' AND '$to_date%' order by sold_at DESC";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function get_top_selling_product(){
  global $conn;
  $query = "select product_name ,unit_price, sum(qty) as Quantity, sum(unit_price*qty) as Total_Amount from sales group by product_name ORDER BY sum(qty) DESC";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function get_top_selling_product_today(){
  global $conn;
  $date = date('Y-m-d');
  $query = "select product_name ,unit_price, sum(qty) as Quantity, sum(unit_price*qty) as Total_Amount from sales WHERE sold_at LIKE '$date%' group by product_name ORDER BY sum(qty) DESC";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function get_items_from_stock(){
  global $conn;
  $query = "select * from stock WHERE qty > 0";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function get_vat_services(){
  global $conn;
  $query = "select * from vat_services";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function get_vat_services_today(){
  global $conn;
  $date = date('Y-m-d');
  $query = "select * from vat_services WHERE date LIKE '$date%'";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function update_stock(){
  global $conn;
  $result = mysqli_query($conn, "delete from stock where qty=0 LIMIT 1");
}

function get_sales_by_user($user){
  global $conn;
  $date = date('Y-m-d');
  $query = "SELECT COUNT(DISTINCT invoice_no) as docket FROM `sales` WHERE user = '$user' AND sold_at LIKE '$date%'";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}

function get_sales_byUser_today($user){
  global $conn;
  $date = date('Y-m-d');
  $query = "SELECT * FROM `sales` WHERE sold_at LIKE '$date%' AND user = '$user'";
  $result_set = mysqli_query($conn, $query);
  confirm_query($result_set);
  return $result_set;
}
?>
