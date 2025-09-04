<?php

session_start();

include "connection.php";

$user = $_SESSION["u"];

if (isset($user)) {
    //Load Cart
    ?>
    <!-- Design -->
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Online Store - Shopping Cart</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body onload="loadCart();">
        <!-- Nav -->
        <?php include "Navbar.php"; ?>
        <!-- Nav -->

        <!-- Body -->
        <div class="container mt-5">
            <div class="row" id="cartBody">
                
            </div>
        </div>
        <!-- Body -->

        <!-- Js -->
        <!-- PayHere -->
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <!-- Custom js -->
        <script src="script.js"></script>
        <!-- Bootstrap -->
        <script src="bootstrap.js"></script>
        <!-- Sweet Alert -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>
    </body>

    </html>

    <!-- Design -->
    <?php
} else {
    header("Location: signin.php");
}


?>