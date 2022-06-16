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
            <!-- PHP Script Start -->
                <?php
                    $conn = mysqli_connect('localhost', 'root', '', 'onlineshop') or die("Database connection error!");
                    $sql = "SELECT * FROM brands";
                    $retVal = mysqli_query($conn, $sql) or die('Database query error!');
                ?>
            <!-- PHP Script End -->


            <!-- HTML Form -->
            <form class="addForm" action="productInsert.php" method="post">
                <div class="mb-3">
                    <label for="inputName" class="form-label">Product Name</label>
                    <input type="text" name="productName" class="form-control" id="inputName">
                </div>
                <div class="mb-3">
                    <label for="inputQuantity" class="form-label">Quantity</label>
                    <input type="number" name="quantity" class="form-control" id="inputQuantity">
                </div>
                <div class="mb-3">
                    <label for="inputBrand" class="form-label">Select Brand</label>
                    <select name="brand" id="inputBrand" class="form-select">
                        <!-- Fetch brands from database -->
                        <!-- PHP Script Start -->
                        <?php
                            while($row = mysqli_fetch_assoc($retVal)){?>
                                <option value="<?php echo $row['ID']?>"><?php echo $row['brand']?></option>
                            <?php }?>
                        <!-- PHP Script End -->
                    </select>
                </div>
                <label for="inputPrice" class="form-label">Price</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input name="price" type="number" id="inputPrice" class="form-control" aria-label="Amount (to the nearest dollar)">
                </div>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>