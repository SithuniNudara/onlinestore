<?php

session_start();

include "connection.php";

if (isset($_SESSION["a"])) {
    $rs = DataBase::search("SELECT * FROM `user`INNER JOIN `user_type`
    ON `user`.`user_type_id` = `user_type`.utype_id ORDER BY `user`.id ASC");
    $num = $rs->num_rows;
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Report</title>
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
        <div class="container mt-3" id="PrintArea">
            <h2 class="text-center">User Reports</h2>

            <table class="table table-hover mt-5" >
                <thead>
                    <tr>
                        <th>User Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>User Type</th>
                        <th>Status</th>
                    </tr>

                </thead>
                <tbody>

                    <?php

                    for ($x = 0; $x < $num; $x++) {
                        $data = $rs->fetch_assoc();
                        ?>
                        <tr>
                            <td><?php echo ($data["id"]); ?></td>
                            <td><?php echo ($data["fname"]); ?></td>
                            <td><?php echo ($data["lname"]); ?></td>
                            <td><?php echo ($data["email"]); ?></td>
                            <td><?php echo ($data["mobile"]); ?></td>
                            <td><?php echo ($data["utype_id"]); ?></td>
                            <?php 
                            if ($data["status"] == '1') {
                                ?>
                                <td class="text-success">Active</td>
                                <?php
                            }else{
                                ?>
                                <td class="text-danger ">Inactive</td>
                                <?php
                            }
                            ?>
                            
                        </tr>


                        <?php
                    }

                    ?>


                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end container mt-5">
            <button class="btn btn-outline-warning col-2" onclick="printDiv();">Print</button>
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
    header("Location: adminsignIn.php");
}



?>