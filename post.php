<?php
$connect = new PDO("mysql:host=localhost;dbname=golden_grill_db", "root", "");
  $query = "insert into sales
    (product_name, qty, unit_price, total_price, user, invoice_no)
    VALUES(:item_name, :item_qty, :item_price, :item_amount, :user_sold_item, :invoice_no)
  ";

  for ($count=0; $count <count($_POST['hidden_item_name']); $count++) {
      $data = $arrayName = array(
        ':item_name' => $_POST['hidden_item_name'][$count],
        ':item_qty' => $_POST['hidden_qty'][$count],
        ':item_price' => $_POST['hidden_price'][$count],
        ':item_amount' => $_POST['hidden_amount'][$count],
        ':user_sold_item' => $_POST['hidden_user_sold_item'][$count],
        ':invoice_no' => $_POST['hidden_invoice_no'][$count]
       );
       $statement = $connect->prepare($query);
       $statement->execute($data);

       $data2 = $arrayName2 = array(
         $product_id = $_POST['hidden_product_id'][$count],
         $qty = $_POST['hidden_qty'][$count]
        );

       $query2 = "UPDATE stock SET qty = qty - $qty WHERE product_id = $product_id";
       $statement2 = $connect->prepare($query2);
       $statement2->execute($data2);
  }

 ?>
