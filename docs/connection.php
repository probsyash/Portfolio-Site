<?php
    $servername = "sql106.infinityfree.com"; // from your InfinityFree panel
    $username   = "if0_41996028";             // your DB username
    $password   = "SDJrPkAm85";
    $dbname     = "if0_41996028_db"; // prefixed DB name
    $conn = new mysqli($servername, $username, $password, $dbname, 3306);  

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>