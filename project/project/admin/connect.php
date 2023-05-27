<?php
    $host="localhost";
    $username="root";
    $password="";
    $dbname="company";
    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_errno) { 
        die("Connection error:" .$conn->connect_error);
    }
    return $conn;
?> 