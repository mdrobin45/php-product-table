<?php
    $product_name = $_POST['productName'];
    $product_quantity = $_POST['quantity'];
    $product_brand = $_POST['brand'];
    $product_price = $_POST['price'];

    $conn = mysqli_connect('localhost', 'root', '', 'onlineshop') or die("Database connection error!");
    $sql = "INSERT INTO products(pname, quantity, brand, price) VALUES('{$product_name}','{$product_quantity}','{$product_brand}','{$product_price}')";
    $retVal = mysqli_query($conn, $sql) or die('Database query error!');

    header('Location: http://localhost/product/index.php');
?>