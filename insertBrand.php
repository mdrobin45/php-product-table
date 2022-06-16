<?php
    $brName = $_POST['brandName'];

    $conn = mysqli_connect('localhost', 'root', '', 'onlineshop') or die("Database connection error!");
    $sql = "INSERT INTO brands(brand) VALUES('{$brName}')";
    $retVal = mysqli_query($conn, $sql) or die('Database query error!');
    
    header('Location: http://localhost/product/add.php');
?>