<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="topBar">
        <h2 class="text-center">Product List</h2>
    </div>
    <?php
         $active_page = $_SERVER['PHP_SELF'];
         $page_name = '';
         $pages = array('index', 'add','update', 'delete', 'addBrand');
         foreach($pages as $value){
            if(strpos($active_page, $value) == true){
                $page_name = $value;
            }
         };
         
    ?>
    <nav class="navigation">
        <a class="<?php echo ($page_name == 'index')?'activeNav':'';?>" href="index.php">HOME</a>
        <a class="<?php echo ($page_name == 'add')?'activeNav':'';?>" href="add.php">ADD</a>
        <a class="<?php echo ($page_name == 'update')?'activeNav':'';?>" href="update.php">UPDATE</a>
        <a class="<?php echo ($page_name == 'delete')?'activeNav':'';?>" href="delete.php">DELETE</a>
        <a class="<?php echo ($page_name == 'addBrand')?'activeNav':'';?>" id="addBrandNav" href="addBrand.php">ADD BRAND</a>
    </nav>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>