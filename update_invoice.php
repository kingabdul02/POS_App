<?php require_once("includes/session.php") ?>
<?php require_once("includes/db_connection.php") ?>
<?php require_once("includes/functions.php") ?>

<?php
  if (isset($_POST['invoice_no'])) {
    $invoice_no = $_POST['invoice_no'];
    $receipt_no = $_POST['receipt_no'];
  }
 ?>
 <?php
   $query = "UPDATE `invoice_code` SET `invoice_code` = '{$invoice_no}', `receipt_no` = '{$receipt_no}' WHERE `invoice_code`.`id` = 4";
      $result = mysqli_query($conn, $query);
      if ($result) {
          echo $result;
      }else {
           $message = "Error updating record.";
      }

  ?>
