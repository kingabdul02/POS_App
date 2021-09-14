<?php require_once("includes/session.php") ?>
<?php require_once("includes/db_connection.php") ?>
<?php require_once("includes/functions.php") ?>

<?php
  if (isset($_POST['invoice_no'])) {
    $invoice_no = $_POST['invoice_no'];
    $vat_services = $_POST['vat_services'];
  }
 ?>
 <?php
     $query = "insert into vat_services (";
     $query .= "vat_services, invoice_no";
     $query .= ") VALUES (";
     $query .= "'{$vat_services}', '{$invoice_no}'";
     $query .= ")";
      $result = mysqli_query($conn, $query);
      if ($result) {
          echo $result;
      }else {
           $message = "Error inserting record.";
      }

  ?>
