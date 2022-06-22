<?php
    $product_id = $_POST['p_id'];
    $conn = mysqli_connect('localhost', 'root', '', 'onlineshop') or die("Database connection error!");
    $sql = "DELETE FROM products WHERE pid=". $product_id;
    $relval = mysqli_query($conn, $sql) or die("Query error!");

    header("Location: http://localhost/product");
?>