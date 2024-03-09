<?php

    $hostName = "localhost";
    $dbUser = "id21970360_root";
    $dbPassword = "Admin12345!";
    $dbName = "id21970360_log_register";
    $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
    if(!$conn){
        die("Something went wrong!");
    }

?>