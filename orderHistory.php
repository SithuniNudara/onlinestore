<?php
session_start();

$user = $_SESSION["u"];

include "connection.php";

if (isset($user)) {
    ?>
    <!DOCTYPE html>
    <html lang="en" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order History</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="bootstrap.css" />
    </head>

    <body>
        <!-- Navbar -->
        <?php include "Navbar.php"; ?>
        <!-- Navbar -->

        <div class="container mt-5">
            <div class="row">
                <?php
                $rs = DataBase::search("SELECT * FROM `order_history` WHERE `user_id` = '" . $user["id"] . "' ");
                $num = $rs->num_rows;

                if ($num > 0) {
                    //Not Empty
                    ?>

                    <div class="mt-4 mb-3">
                        <h3>Order History</h3>
                    </div>
                    <?php
                    for ($i = 0; $i < $num; $i++) {
                        $d = $rs->fetch_assoc();
                        ?>
                        <!-- Order History card -->
                        <div class="p-3 border border-3 rounded-3 bg-body-tertiary mb-4">
                            <div>
                                <h5>Order Id <span class="text-info">#<?php echo $d["order_id"]; ?></span></h5>
                                <p><?php echo $d["order_date"]; ?></p>
                            </div>

                            <div class="ps-5 pe-5">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">First</th>
                                            <th scope="col">Last</th>
                                            <th scope="col">Handle</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php

                                        $rs2 = DataBase::search("SELECT * FROM `stock` INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
                                      INNER JOIN `order_item` ON `stock`.`stock_id` = `order_item`.`stock_stock_id`
                                      WHERE `order_item`.`order_history_ohid` = '" . $d["ohid"] . "'");

                                        $num2 = $rs2->num_rows;

                                        for ($l = 0; $l < $num2; $l++) {
                                            $d2 = $rs2->fetch_assoc();

                                            ?>
                                            <tr>
                                                <td><?php echo $d2["name"];?></td>
                                                <td><?php echo $d2["oi_qty"];?></td>
                                                <td>Rs. <?php echo ($d2["price"] * $d2["oi_qty"]);?></td>
                                            </tr>

                                            <?php

                                        }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="d-flex flex-column align-items-end pe-5">
                                <h6>Delivery Fee: <span class="text-muted">5500</span></h6>
                                <h4>Net Total: <span class="text-warning"><?php echo $d["amount"];?></span></h4>
                            </div>
                        </div>
                        <!-- Order histroy card -->

                        <?php
                    }

                    ?>


                    <?php

                } else {
                    //Empty
                    ?>
                    <!-- Empty -->
                    <div class="col-12 text-center mt-5">
                        <h2>You Have Not Placed Ordered Anything Yet!</h2>
                        <a href="index.php" class="btn btn-primary">Start Shopping</a>
                    </div>
                    <!-- Empty -->

                    <?php
                }

                ?>


            </div>
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
    </body>

    </html>
    <?php
} else {
    header("Location: signin.php");
}

?>