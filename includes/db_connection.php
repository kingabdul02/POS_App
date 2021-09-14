<?php
    // database connection
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "golden_grill_db");

    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    // Test if connection occured
    if (mysqli_connect_error()) {
        die("database connection failed ".
        mysqli_connect_errno().
        "(" . mysqli_connect_errno(). ")"
    );
    }
?>
