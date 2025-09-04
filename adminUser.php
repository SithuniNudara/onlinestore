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

    <body class="adminBody" onload="loadUser();">
        <!-- Navbar -->
        <?php
        include "adminNavbar.php";
        ?>
        <!-- Navbar End -->

        <!-- Dashboard - user management -->
        <div class="col-10">

            <h2 class="text-center">User Management</h2>

            <div class="row d-flex justify-content-end mt-4">
                <!-- Alert -->
                <div class="d-none" id="msgDiv" onclick="reload();">
                    <div class="alert alert-danger" id="msg"></div>
                </div>
                <!-- Change User Process -->
                <div class="col-2">
                    <input type="text" placeholder="User id" id="userID" class="form-control"/>
                </div>
                <button class="btn btn-outline-light col-2" onclick="changeUserID();">Change Status</button>

            </div>

            <div class="mt-3">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">User Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="tb">
                        <!-- tr -->

                        <!-- tr -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Dashboard End -->


        <!-- Footer -->
        <?php include "footer.php"; ?>
        <!-- Footer End -->


        <!-- JS FILE -->
        <script src="script.js"></script>
        <!-- Bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>


    <!-- End of Load area -->
    <?php

} else {
    //redirect to admin login page
    header('Location: adminSignIn.php');

}
?>