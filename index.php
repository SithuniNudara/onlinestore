<?php

session_start();

include "connection.php";

//$rs = DataBase::search(" SELECT * FROM `pr` ")

?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="shortcut icon" href="Resources/IMG/icon.ico" type="image/x-icon">
    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
</head>

<body onload="loadProduct(0);">
    <!-- NavBar -->
    <?php include ("Navbar.php"); ?>
    <!-- NavBar -->


    <!-- Basic Search -->
    <div class="container d-flex justify-content-end mt-5">
        <div class="col-3 mt-3">
            <input type="text" class="form-control" placeholder=" Product Name " id="product"
                onkeyup="SearchProduct(0);" />
        </div>
        <button class="btn btn-outline-info col-1 ms-2 mt-3" onclick="viewFilter();">Filters</button>
    </div>
    <!-- Basic Search -->

    <!-- Advanced Search  -->
    <div class="d-none" id="filterId">
        <div class="border border-light rounded-4 mt-4 p-5 col-10 offset-1">

            <div class="row col-12">
                <?php
                $rs = DataBase::search("SELECT * FROM `color`");
                $num = $rs->num_rows;
                ?>
                <div class="row col-6 ms-auto">
                    <label class="form-label col-3">Color:</label>
                    <select class="form-select bg-dark col-9" id="color">
                        <option value="0">Select Color</option>
                        <?php
                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                            ?>
                            <option value="<?php echo $d["color_id"]; ?>"><?php echo $d["color_name"]; ?></option>
                            <?php
                        }
                        ?>

                    </select>
                </div>
                <?php
                $rs = DataBase::search("SELECT * FROM `category`");
                $num = $rs->num_rows;
                ?>
                <div class="row col-6 ms-auto">
                    <label class="form-label col-3">Category:</label>
                    <select class="form-select bg-dark col-9" id="cat">
                        <option value="0">Select Category</option>
                        <?php
                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                            ?>
                            <option value="<?php echo $d["cat_id"]; ?>"><?php echo $d["cat_name"]; ?></option>
                            <?php
                        }
                        ?>

                    </select>
                </div>
            </div>

            <div class="row col-12 mt-4">
                <?php
                $rs = DataBase::search("SELECT * FROM `brand`");
                $num = $rs->num_rows;
                ?>
                <div class="row col-6 ms-auto">
                    <label class="form-label col-3">Brand:</label>
                    <select class="form-select bg-dark col-9" id="brand">
                        <option value="0">Select Brand</option>
                        <?php
                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                            ?>
                            <option value="<?php echo $d["brand_id"]; ?>"><?php echo $d["brand_name"]; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>

                <div class="row col-6 ms-auto">
                    <?php
                    $rs = DataBase::search("SELECT * FROM `size`");
                    $num = $rs->num_rows;
                    ?>
                    <label class="form-label col-3">SIze:</label>
                    <select class="form-select bg-dark col-9" id="size">
                        <option value="0">Select Size</option>
                        <?php
                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                            ?>
                            <option value="<?php echo $d["size_id"]; ?>"><?php echo $d["size_name"]; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="mt-4 row col-12 m-auto">
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="Min Price" id="min" />
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="Max Price" id="max" />
                </div>
                <button class="btn btn-outline-light col-2" onclick="advancedSearchProduct(0);">Search</button>

            </div>

        </div>
    </div>
    <!-- Advanced Search  -->

    <!-- Load Product -->
    <div class="row col-10 offset-1" id="pid">



    </div>
    <!-- Load Product -->




    <!-- Footer -->
    <div class=" col-12 mt-4">
        <p class="text-center">&copy; 2024 Online Store.lk || All Right Reserved</p>
    </div>
    <!-- Footer End -->

    <!-- Custom js file -->
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>