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
            <!-- Database configuration -->
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'onlineshop') or die("Database connection error!");
                $sql = "SELECT * FROM products INNER JOIN brands ON products.brand = brands.ID";
                $retVal = mysqli_query($conn, $sql) or die('Database query error!');
            ?>
            
            <?php
                if(mysqli_num_rows($retVal) > 0){?>
                <!-- Table start -->
                <table class="table table-bordered tableStyle ">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Price</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = mysqli_fetch_assoc($retVal)){?>
                                <tr>
                                    <th scope="row"><?php echo $row['pid']?></th>
                                    <td><?php echo $row['pname']?></td>
                                    <td><?php echo $row['quantity']?></td>
                                    <td><?php echo $row['brand']?></td>
                                    <td>$ <?php echo $row['price']?></td>
                                    <td>
                                        <a class="edit" href="update.php?id=<?php echo $row['pid'];?>">Edit</a>
                                        <a class="delete" href="#">Delete</a>
                                    </td>
                                </tr>
                            <?php }?>
                    </tbody>
                </table>
            <?php }?>
        </div>
    </div>
    

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>