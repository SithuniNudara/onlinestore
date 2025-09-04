<?php
session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    //show the design
    ?>
    <!-- Load area -->

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

    <body class="adminBody" onload="loadChart();">
        <!-- Navbar -->
        <?php
        include "adminNavbar.php";
        ?>
        <!-- Navbar End -->

        <!-- Chart -->
        <div style="width:500px">
        <h2 class="text-center">Most Sold Product</h2>
            <canvas id="myChart"></canvas>
        </div>
        <!-- Chart -->

        <!-- Footer -->
        <?php include "footer.php"; ?>
        <!-- Footer End -->


        <!-- JS FILE -->
        <script src="script.js"></script>
        <!-- Bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- chartjs -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    </body>

    </html>


    <!-- End of Load area -->
    <?php

} else {
    //redirect to admin login page
    header('Location: adminSignIn.php');

}
?>