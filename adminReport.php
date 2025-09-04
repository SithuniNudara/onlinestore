<?php

session_start();

if (isset($_SESSION["a"])) {
    ?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Store - Admin Dashboard</title>
        <!-- Favicon -->
        <link rel="shortcut icon" href="Resources/IMG/icon.ico" type="image/x-icon">
        <!-- Custom Css file -->
        <link rel="stylesheet" href="style.css" />
        <!-- Bootstrap file -->
        <link rel="stylesheet" href="bootstrap.css" />
    </head>

    <body class="adminBody">

        <?php include "adminNavbar.php"; ?>

        <!-- Design Starts -->
        <div class="col-10">
            <h2 class="text-center">Reports</h2>

            <div class="row mt-5">

                <div class="col-4 mt-5">
                    <a href="adminReportStock.php">
                    <button class="btn btn-outline-info col-12">Stock Reports</button>
                    </a>
                </div>

                <div class="col-4 mt-5">
                    <a href="adminReportProduct.php"><button class="btn btn-outline-info col-12">Product Reports</button></a>
                </div>

                <div class="col-4 mt-5">
                    <a href="adminReportUser.php">
                    <button class="btn btn-outline-info col-12">User Reports</button>
                    </a>
                </div>

            </div>

        </div>
        <!-- Design Ends -->


        <?php include "footer.php"; ?>
        <!-- JS FILES -->
        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
    </body>

    </html>

    <?php
} else {
    header("Location: adminsignIn.php");
}


?>