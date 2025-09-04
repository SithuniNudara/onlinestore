<?php 
include "connection.php";
$stockId = $_GET["s"];

if (isset($stockId)) {
    $q = "SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.id
    INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id` 
    INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
    INNER JOIN `brand` ON `brand`.`brand_id` = `product`.brand_id
    INNER JOIN `category` ON `product`.`category_id` = `category`.`cat_id` 
    WHERE `stock`.`stock_id` = '".$stockId."'";
    $rs = DataBase::search($q);
$data = $rs->fetch_assoc();
    ?>
    
    <!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="Resources/IMG/icon.ico" type="image/x-icon">
</head>

<body>

    <!-- Navbar -->
    <?php include "Navbar.php"; ?>
    <!-- Navbar -->

    <div class="adminBody">
        <div class="col-8 row shadow-lg p-5 bg-body-tertiary rounded-2 m-auto">

            <div class="col-6">
                <img src="<?php echo $data["path"];?>" width="350px" class="rounded-3 shadow-lg" />
            </div>

            <div class="col-6">
                <h4 class="text-info"><?php echo $data["name"];?></h4>
                <h5 class="mt-3">Brand: <?php echo $data["brand_name"];?></h5>
                <h6 class="mt-3">Category: <?php echo $data["cat_name"];?></h6>
                <h6 class="mt-3">Color: <?php echo $data["color_name"];?></h6>
                <h6 class="mt-3">Size: <?php echo $data["size_name"];?></h6>
                <p class="mt-3">Description: <?php echo $data["description"];?></p>

                <div class="row mt-5">

                    <div class="col-2">
                        <input type="text" placeholder="Qty" class="form-control" id="qty"  />
                    </div>

                    <div class="col-6 mt-2">
                        <h6 class="text-warning">Available Quantity: <?php echo $data["qty"];?></h6>
                    </div>
                </div>
                <h5 class="mt-3">Rs: <?php echo $data["price"];?>.00</h5>
                <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-outline-primary col-6" onclick="addtoCart('<?php echo $data['stock_id']?>');">Add To Cart</button>
                    <button class="btn btn-outline-warning col-6 ms-2" onclick="buyNow('<?php echo $data['stock_id']?>');"  >Buy Now</button>
                </div>
            </div>

        </div>
    </div>



    <!-- Footer -->
    <?php include "footer.php"; ?>
    <!-- Footer -->
    
    <!-- js -->
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <!-- Payhere -->
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <!-- Sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>

<?php
}else{
    header("Location: index.php");
}


?>