<?php require_once("../includes/functions.php");
      require_once("../includes/session.php");
      require_once("../includes/db_connection.php") ?>
<?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $page = $_GET['page'];
    if ($page == "category") {
      $result = mysqli_query($conn, "delete from category where id=$id LIMIT 1");
      if ($result) {
        redirect_to("category.php");
          $message = "Delete successfully.";
      }else {
        redirect_to("category.php");
           $message = "Delete failed.";
      }
    }elseif ($page == "products") {
      $result = mysqli_query($conn, "delete from products where id=$id LIMIT 1");
      if ($result) {
        redirect_to("products.php");
          $message = "Delete successfully.";
      }else {
        redirect_to("products.php");
           $message = "Delete failed.";
      }
    }elseif ($page == "expensis") {
      $result = mysqli_query($conn, "delete from expensis where id=$id LIMIT 1");
      if ($result) {
        redirect_to("expensis.php");
          $message = "Delete successfully.";
      }else {
        redirect_to("expensis.php");
           $message = "Delete failed.";
      }
    }elseif ($page == "stock") {
      $result = mysqli_query($conn, "delete from stock where id=$id LIMIT 1");
      if ($result) {
        redirect_to("stock.php");
          $message = "Delete successfully.";
      }else {
        redirect_to("stock.php");
           $message = "Delete failed.";
      }
    }elseif ($page == "users") {
      $result = mysqli_query($conn, "delete from users where id=$id LIMIT 1");
      if ($result) {
        redirect_to("users.php");
          $message = "Delete successfully.";
      }else {
        redirect_to("users.php");
           $message = "Delete failed.";
      }
    }
  }
 ?>
