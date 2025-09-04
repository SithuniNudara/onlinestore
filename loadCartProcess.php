<?php

session_start();

include "connection.php";

$user = $_SESSION["u"];
$netTotal = 0;

$rs = DataBase::search("SELECT * FROM `cart` INNER JOIN `stock` ON `cart`.`stock_stock_id` = `stock`.`stock_id`
INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
INNER JOIN `color` ON `product`.`color_id` = `color`.`color_id`
INNER JOIN `size` ON `product`.`size_id` = `size`.`size_id`
WHERE `cart`.`user_id` = '" . $user["id"] . "'");

$num = $rs->num_rows;

if ($num > 0) {
    ?>
    <!-- Cart Load Here -->
    <div class="mb-4 mt-4">
        <h3>Shopping Cart</h3>
    </div>
    <?php
    for ($x = 0; $x < $num; $x++) {
        $data = $rs->fetch_assoc();
        $total = $data["price"] * $data["cart_qty"];
        $netTotal += $total;
        
        ?>
        <!-- Cart Items -->
        <div class="col-12 border border-3 rounded-5 p-3 mb-2 d-flex justify-content-between">
            <div class="d-flex align-items-center col-5">
                <img src="<?php echo ($data["path"]); ?>" class="rounded-4" width="200px">
                <div class="ms-5">
                    <h4><?php echo ($data["name"]); ?></h4>
                    <p class="text-muted mb-0 mt-3">Color : <?php echo ($data["color_name"]); ?></p>
                    <p class="text-muted">Size : <?php echo ($data["size_name"]); ?></p>
                    <h5 class="text-warning">Rs: <?php echo ($data["price"]); ?></h5>
                </div>
            </div>
            <div class="d-flex align-items-center gap-2">
                <button class="btn btn-light btn-sm" onclick="decrementCardQuantity('<?php echo $data['cart_id']?>');">-</button>
                <input type="number" id="qty<?php echo ($data["cart_id"]); ?>" class="form-control form-control-sm text-center" style="max-width: 100px;"
                    value="<?php echo ($data["cart_qty"]); ?>" disabled />
                <button class="btn btn-light btn-sm" onclick="incrementCardquantity('<?php echo $data['cart_id']?>')">+</button>
            </div>
            <div class="d-flex align-items-center">
                <h4>Total: <span class="text-warning">Rs : <?php echo ($total); ?></span></h4>
            </div>
            <div class="d-flex align-items-center">
                <button class="btn btn-danger btn-sm" onclick="removeCart('<?php echo $data['cart_id']?>');">X</button>
            </div>
        </div>
        <!-- Cart Items -->




        <?php
    }

    ?>
    <div class="col-12 mt-4">
        <hr />
    </div>
    <!-- Checkout -->
    <div class="d-flex flex-column align-items-end">
        <h6>Number of Items: <span class="text-info"><?php echo $num; ?></span></h6>
        <h5>Delivery Fee: <span class="text-muted">RS: 500.00</span></h5>
        <h3>Net Total: <span class="text-warning">RS: <?php echo ($netTotal + 500); ?></span></h3>
        <button class="btn btn-success col-3 mt-3 mb-4" onclick="checkOut();">CHECKOUT</button>
    </div>
    <!-- Checkout -->

    <!-- Cart Load Here -->


    <?php
} else {
    ?>

    <!-- Empty  -->
    <div class="col-12 text-center mt-5">
        <h2>Your Cart Is Empty</h2>
        <a href="index.php" class="btn btn-primary">Start Shopping</a>
    </div>
    <!-- Empty  -->

    <?php
}



?>