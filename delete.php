<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

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
           <div class="deleteForm">
            <?php
            // Retrieve product if load form submitted
            if(isset($_POST['loadBtn'])){
                $productId = $_POST['productID'];
            $conn = mysqli_connect('localhost', 'root', '', 'onlineshop') or die("Connection Error!");
            $sql = "SELECT * FROM products WHERE pid = $productId";
            $retval = mysqli_query($conn, $sql) or die('Database query error!');
            }


            if(!isset($retval)){?>
                <!-- Product load form start -->
                <form action="#" method="post">
                    <div class="mb-3">
                        <label for="productID" class="form-label">Product ID</label>
                        <input type="number" name="productID" class="form-control">
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Show Product" name="loadBtn">
                    </div>
                </form>
                <!-- Product load form end -->
            <?php }?>
            <!-- *************************** -->
            <?php if(isset($retval)){?>
                <!-- Show product details start -->
                <?php 
                while( $product= mysqli_fetch_assoc($retval)){?>
                    <form action="insertUpdate.php" method="post">

                        <div class="mb-3">
                            <input hidden value="2" type="number" name="p_id" class="form-control" id="product_id">
                        </div>

                        <div class="mb-3">
                            <label for="inputName" class="form-label">Product Name</label>
                            <input disabled value="<?php echo $product['pname'];?>" name="productName" type="text" class="form-control" id="inputName">
                        </div>

                        <div class="mb-3">
                            <label for="inputQuantity" class="form-label">Quantity</label>
                            <input disabled value="<?php echo $product['quantity'];?>" type="number" name="quantity" class="form-control" id="inputQuantity">
                        </div>

                        <div class="mb-3">
                            <label for="inputBrand" class="form-label">Brand</label>
                            <select name="brand" id="inputBrand" class="form-select">
                                <?php
                                    $conn = mysqli_connect('localhost', 'root', '', 'onlineshop') or die("Database Connection Error!");
                                    $sql = "SELECT * FROM brands WHERE ID =". $product['brand'];
                                    $setBrand = mysqli_query($conn, $sql) or die('Connection Error!');
                                ?>
                                <?php
                                    while($pBrand = mysqli_fetch_assoc($setBrand)){?>
                                    <option selected value="<?php echo $pBrand['ID'];?>"><?php echo $pBrand['brand'];?></option>
                                <?php }?>
                                
                            </select>
                            <!-- END SELECT -->
                        </div>

                        <label for="inputPrice" class="form-label">Price</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">$</span>
                            <input disabled value="<?php echo $product['price'];?>" name="price" type="number" id="inputPrice" class="form-control" aria-label="Amount (to the nearest dollar)">
                        </div>
                        <input id='deleteBTN' type="submit" value="Delete">
                    </form>
                <!-- Show product details end -->
                <?php }?>
            <?php }?>
           </div>
        </div>
    </div>
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>