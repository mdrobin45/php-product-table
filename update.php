<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <?php
                include('header.php');
            ?>
        </header>
        <!-- Header End -->

        <!-- Main Section Start -->
        <div class="main shadow">


            <div class="updateForm">
                <!-- Product load form -->
                <!-- Show product php script start -->
                <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'onlineshop') or die("Database connection error!");
                    if(isset($_POST['loadBtn'])){
                       $product_id = $_POST['productID']; 
                        
                        $sql = "SELECT * FROM products WHERE pid = $product_id";
                        $retVal = mysqli_query($conn, $sql) or die('Database query error!');
                    }
                    if(isset($_GET['id'])){
                        $product_id = $_GET['id']; 
                        
                        $sql = "SELECT * FROM products WHERE pid = $product_id";
                        $retVal = mysqli_query($conn, $sql) or die('Database query error!');
                    }
                ?>
                <!-- Show product php script end -->
                <?php
                    if(!isset($retVal)){?>
                        <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                            <div class="mb-3">
                                <label for="productID" class="form-label">Product ID</label>
                                <input type="number" name="productID" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Show Product" name="loadBtn">
                            </div>
                        </form>
                    <?php }?>
                <!-- Load form end -->


                <!-- HTML Form -->
                <?php 
                if(isset($retVal)){?>
                    <?php
                    while($product = mysqli_fetch_assoc($retVal)){?>
                        <form action="insertUpdate.php" method="post">

                            <div class="mb-3">
                                <input hidden value="<?php echo $product['pid'];?>" type="number" name="p_id" class="form-control" id="product_id">
                            </div>

                            <div class="mb-3">
                                <label for="inputName" class="form-label">Product Name</label>
                                <input value="<?php echo $product['pname'];?>" name="productName" type="text" class="form-control" id="inputName">
                            </div>

                            <div class="mb-3">
                                <label for="inputQuantity" class="form-label">Quantity</label>
                                <input value="<?php echo $product['quantity'];?>" type="number" name="quantity" class="form-control" id="inputQuantity">
                            </div>

                            <div class="mb-3">
                                <label for="inputBrand" class="form-label">Select Brand</label>
                                <select name="brand" id="inputBrand" class="form-select">


                                    <!-- Existing brand default php script start -->
                                    <?php
                                        $conn = mysqli_connect('localhost', 'root', '', 'onlineshop') or die("Database connection error!");
                                        $sql = "SELECT * FROM brands WHERE ID =". $product['brand'];
                                        $selBrand = mysqli_query($conn, $sql) or die('Database query error!');

                                        while($pBrand = mysqli_fetch_assoc($selBrand)){?>
                                            <option selected value="<?php echo $pBrand['ID'];?>" ><?php echo $pBrand['brand'];?></option>
                                        <?php }?>
                                    <!-- Existing brand default php script end -->


                                    <!-- Start database configuration for retrieve brand -->
                                    <?php
                                        $conn = mysqli_connect('localhost', 'root', '', 'onlineshop') or die("Database connection error!");
                                        $sql = "SELECT * FROM  brands";
                                        $retBrand = mysqli_query($conn, $sql) or die('Database query error!');
                                        
                                        while($brand = mysqli_fetch_assoc($retBrand)){?>
                                            <option value="<?php echo $brand['ID'];?>"><?php echo $brand['brand'];?></option>
                                        <?php }?>
                                    <!-- End database configuration for retrieve brand -->


                                </select>
                                <!-- END SELECT -->
                            </div>

                            <label for="inputPrice" class="form-label">Price</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input value="<?php echo $product['price'];?>" name="price" type="number" id="inputPrice" class="form-control" aria-label="Amount (to the nearest dollar)">
                            </div>
                            <input type="submit" value="Submit">
                        </form>
                    <?php }?>
                <?php }?>
            </div>
        </div>
    </div>
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>