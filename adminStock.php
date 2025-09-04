z<?php

session_start();

include "connection.php";

if (isset($_SESSION["a"])) {
    ?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Stock - Admin Panel</title>
        <!-- CSS files -->
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="shortcut icon" href="Resources/IMG/icon.ico" type="image/x-icon" />
    </head>

    <body class="adminBody">
        <?php include 'adminNavbar.php' ?>
        <!-- Desgin Start -->
        <div class="container-fluid">

            <div class="row">
                <div class="col-5 offset-1">
                    <h2 class="text-center">Product Registration</h2>

                    <div class="mb-3">
                        <label class="form-label" for="pname">Product Name</label>
                        <input id="pname" type="text" class="form-control" />
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="brand">Brand</label>
                            <select id="brand" class="form-select">
                            <option value="0">Select</option>
                                <?php 
                                
                                $rs = DataBase::search("SELECT * FROM `brand`");
                                $num = $rs->num_rows;
                               
                                for ($i=0; $i < $num; $i++) { 
                                    $data = $rs->fetch_assoc();
                                    ?>
                                   <option value="<?php echo($data["brand_id"]);?>"><?php echo($data["brand_name"]);?></option>
                                    <?php
                                }
                                
                                ?>
                                
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label for="cat" class="form-label">Category</label>
                            <select id="cat" class="form-select">
                                <option value="0">Select</option>
                                <?php 
                                $rs = DataBase::search("SELECT * FROM `category`");
                                $num = $rs->num_rows;

                                for ($x=0; $x < $num; $x++) { 
                                    $data = $rs->fetch_assoc();
                                    ?>
                                    
                                    <option value="<?php echo ($data["cat_id"]);?>"><?php echo ($data["cat_name"]);?></option>
                                    <?php
                                }
                                
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="color" class="form-label">Color</label>
                            <select  id="color" class="form-select">
                                <option value="0">Select</option>
                                <?php 
                                
                                $rs = DataBase::search("SELECT * FROM `color`");
                                $num = $rs->num_rows;

                                for ($i=0; $i < $num; $i++) { 
                                   $data = $rs->fetch_assoc();
                                   ?>
                                   <option value="<?php echo ($data["color_id"]);?>"><?php echo ($data["color_name"]);?></option>
                                   <?php
                                }
                                
                                ?>
                            </select>
                        </div>

                        <div class="mb-3 col-6">
                            <label for="size">Size</label>
                            <select id="size" class="form-select">
                                <option value="0">Select</option>
                                <?php
                                $rs = DataBase::search("SELECT * FROM `size`");
                                $num= $rs->num_rows;

                                for ($x=0; $x < $num; $x++) { 
                                    $data = $rs->fetch_assoc();
                                    ?>
                                    <option value="<?php echo ($data["size_id"]);?>"><?php echo ($data["size_name"]);?></option>
                                    
                                    <?php
                                }
                                ?>
                                
                            </select>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea id="desc" class="form-control" rows="5"></textarea>

                    </div>
                    <!-- Image -->
                    <div class="mb-3">
                        <label for="file" class="form-label">Product image</label>
                        <input id="file" class="form-control" type="file" />
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-secondary" onclick="regProduct();">Register Product</button>
                    </div>

                </div>

                <div class="col-5">
                    <h2 class="text-center">Stock Update</h2>
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <select class="form-select" id="selectProduct">
                            <?php 
                            $rs = DataBase::search("SELECT * FROM `product`");
                            $num = $rs->num_rows;
                            for ($x=0; $x < $num; $x++) { 
                                $data = $rs->fetch_assoc();
                                ?>
                                <option value="<?php echo ($data["id"]);?>"><?php echo ($data["name"]);?></option>
                                
                                <?php
                            }
                            ?>
                        </select>

                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="qty" required />
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Unit Price</label>
                        <input type="text" class="form-control" id="uprice" required />
                    </div>

                    <div class="d-grid">
                        <button class="btn btn-secondary" onclick="updateStock();">Update Stock</button>
                    </div>
                </div>
            </div>

        </div>
        <!-- Desgin End -->
        <?php include 'footer.php' ?>

        <!-- Js Files -->
        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
    </body>

    </html>

    <?php
} else {
    header('Location: adminsignin.php');
}

?>