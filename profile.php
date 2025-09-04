<?php

session_start();

include "connection.php";

$user = $_SESSION["u"];


if (isset($_SESSION["u"])) {
    $rs = DataBase::search("SELECT * FROM `user` WHERE `id` = '".$user["id"]."'");
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
    </head>
    <!-- Nav -->
    <?php include "Navbar.php"; ?>
    <!-- Nav -->

    <div class="adminBody">

        <div class="row container">

            <!-- Image -->
            <div class="col-4 d-flex justify-content-center flex-column">
                <div class="d-flex justify-content-center">
                    
                    <img src="<?php 
                    if (!empty($data["img_path"])) {
                        echo ($data["img_path"]);
                    } else {
                        echo("Resources/IMG/profile.png");	
                    }
                    
                    ?>" height="150px" id="i" />

                </div>
                <div class="mt-3">
                    <label class="form-label">Profile Image:</label>
                    <input type="file" class="form-control" id="ImageUploader">
                </div>
                <div class="mt-3">
                    <button class="btn btn-warning col-12" onclick="uploadImg();">Upload</button>
                </div>
            </div>

            <!-- Profile -->
            <div class="col-8">
                <h2 class="text-center">Profile Details</h2>
                <div class="row mt-3">

                    <div class="col-6">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control"  id="firstname" value="<?php echo $data["fname"]?>">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control"  id="lastname" value="<?php echo $data["lname"]?>">
                    </div>

                </div>

                <div class="mt-3">
                    <label class="form-label">Email:</label>
                    <input type="text" class="form-control"  id="Email" value="<?php echo $data["email"]?>">
                </div>

                <div class="mt-3">
                    <label class="form-label">Mobile:</label>
                    <input type="text" class="form-control"  id="mobile" value="<?php echo $data["mobile"]?>">
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <label class="form-label">Username:</label>
                        <input type="text" class="form-control"  disabled  value="<?php echo $data["username"]?>">
                    </div>
                    <div class="col-6">
                        <label class="form-label">Password:</label>
                        <input type="text" class="form-control" id="password" value="<?php echo $data["password"]?>">
                    </div>
                </div>

                <h5 class="mt-3">Shipping Address</h5>
                <div class="row mt-3">

                    <div class="col-3">
                        <label class="form-label">No:</label>
                        <input type="text" class="form-control" id="number" value="<?php echo $data["no"]?>">
                    </div>

                    <div class="col-9">
                        <label class="form-label">Line 01:</label>
                        <input type="text" class="form-control"  id="line1" value="<?php echo $data["line_1"]?>">
                    </div>

                    <div class="mt-3">
                        <label class="form-label">Line 02:</label>
                        <input type="text" class="form-control" id="line2"  value="<?php echo $data["line_2"]?>"/>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-outline-warning col-12" onclick="UpdateUserProfile();">Update</button>
                    </div>

                </div>

            </div>

            <!-- Details -->
            <div class="col-8"></div>

        </div>

    </div>


    <!-- Footer -->
    <?php include "footer.php"; ?>
    <!-- Footer -->
    <!-- Js -->
    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    </body>

    </html>

    <?php
} else {
    header("Location:signin.php");
}

?>