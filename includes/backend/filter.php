<?php require_once("../includes/functions.php") ?>
<?php
    if (!$_SESSION["isAdmin"]) {
    redirect_to("../login.php");
    }
 ?>
