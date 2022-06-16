<?php
    $product_ID = $_POST['p_id'];
    $updated_name = $_POST['productName'];
    $updated_quantity = $_POST['quantity'];
    $updated_brand = $_POST['brand'];
    $updated_price = $_POST['price'];

    // Database configuration for insert updated value
    $conn = mysqli_connect('localhost', 'root', '', 'onlineshop') or die('Database connection error!');
    $sql = "UPDATE products SET pname = '{$updated_name}', quantity = '{$updated_quantity}', brand = '{$updated_brand}', price = '{$updated_price}' WHERE pid = '{$product_ID}'";
    $retVal = mysqli_query($conn, $sql) or die('Update Error!');

    // Redirect to Home
    header('Location: http://localhost/product/index.php');
?>