<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = DataBase::search("SELECT *
    FROM `stock` INNER JOIN `product` 
    ON `stock`.`product_id` = `product`.`id` 
    INNER JOIN `brand` ON `product`.`brand_id` = `brand`.`brand_id`
    INNER JOIN `category` ON `product`.`category_id` = `category`.`cat_id`
    INNER JOIN `color` ON `product`.`color_id` = `color`.color_id
    INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id`
    ORDER BY `stock`.`stock_id` ASC");
$num = $rs->num_rows;

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Reports</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="Resources/IMG/icon.ico" type="image/x-icon">
        <!-- Custom Css file -->
        <link rel="stylesheet" href="style.css" />
        <!-- Bootstrap file -->
        <link rel="stylesheet" href="bootstrap.css" />
    </head>

    <body>

        <!-- Design -->
        <div class="container mt-3">
            <a href="adminReport.php">
                <img src="Resources/IMG/backicon.png" height="25" />
            </a>
        </div>
        <!-- Table -->
        <div class="container mt-3">
            <h2 class="text-center">Stock Reports</h2>

            <table class="table table-hover mt-5" id="table">
                <thead class="text-center">
                    <tr>
                        <th>Product Id</th>
                        <th>Prodcut Name</th>
                        <th>Brand Name</th>
                        <th>Category Name</th>
                        <th>Color</th>
                        <th>Size</th>
                        <th>Description</th>
                        <th>Image</th>
                    </tr>

                </thead>
                <tbody>
<?php 

for ($x=0; $x < $num; $x++) { 
    $data = $rs->fetch_assoc();
    ?>
<tr>
                        <td><?php echo ($data["stock_id"]);?></td>
                        <td><?php echo ($data["name"]);?></td>
                        <td><?php echo ($data["brand_name"]);?></</td>
                        <td><?php echo ($data["cat_name"]);?></</td>
                        <td><?php echo ($data["color_name"]);?></</td>
                        <td><?php echo ($data["size_name"]);?></td>
                        <td><?php echo ($data["description"]);?></td>
                        <td><img src="<?php echo ($data["path"]);?>" height="100"></td>
                    </tr>
    <?php
}

?>
                    
                </tbody>
            </table>
        </div>
        <!-- End -->

        <div class="d-flex justify-content-end container mt-5">
            <button class="btn btn-outline-warning col-2" onclick="report1();">Print</button>
        </div>
        <!-- Design -->



        <!-- JS -->
        <script src="script.js"></script>
        <!-- Bootstrap file -->
        <script src="bootstrap.js"></script>
    </body>

    </html>

    <?php
} else {
    header(("Location: adminsignIn.php"));
}



?>