<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {
    //logged 
    ?>
    <!-- Design -->
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Store - Product Management</title>
        <link rel="shortcut icon" href="Resources/IMG/icon.ico" type="image/x-icon">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
    </head>

    <body class="adminBody">
        <!-- Nav -->
        <?php include "adminNavbar.php" ?>
        <!-- Nav -->

        <div class="col-10">
            <h2 class="text-center">Product Management</h2>

            <div class="row mt-5">
                <!-- Brand Registeration -->
                <div class="col-4 offset-1 ">

                    <label for="form-label">Brand Name :</label>
                    <input type="text" class="form-control mb-3" id="brand" />

                    <div class="d-none" id="msgDiv1" onclick="reload();">
                        <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="registerBrand();">Brand Register</button>
                    </div>

                </div>
                <!-- Brand Registeration -->
                <!-- Category -->
                <div class="col-4 offset-2 ">

                    <label for="form-label">Category Name :</label>
                    <input type="text" class="form-control mb-3" id="category"/>

                    <div class="d-none" id="msgDiv2">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="registerCategory();">Category Register</button>
                    </div>

                </div>
                <!-- Category -->


            </div>

            <!-- second row -->
            <div class="row mt-5">
                <!-- Color Registeration -->
                <div class="col-4 offset-1">
                    <label for="form-label">Color Name :</label>
                    <input type="text" class="form-control mb-3" id="color"/>

                    <div class="d-none" id="msgDiv3" onclick="reload();">
                        <div class="alert alert-danger" id="msg3"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="registerColor();">Color Register</button>
                    </div>

                </div>
                <!-- Color end -->
                <!-- Size  -->
                <div class="col-4 offset-2">
                    <label for="form-label">Size Name :</label>
                    <input type="text" class="form-control mb-3" id="size"/>

                    <div class="d-none" id="msgDiv4" onclick="reload();">
                        <div class="alert alert-danger" id="msg4"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-light col-12" onclick="registerSize();">Size Register</button>
                    </div>

                </div>
                <!-- Size -->


            </div>
            <!-- Second row -->
        </div>


        <?php include "footer.php" ?>
        <!-- JS files -->
        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
    </body>

    </html>

    <!-- Design -->
    <?php
} else {
    //not logged
    header('Location: adminsignIn.php');
}


?>