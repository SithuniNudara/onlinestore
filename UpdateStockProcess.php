<?php

include "connection.php";

$product = $_POST["p"];
$qty = $_POST["q"];
$unit_price = $_POST["up"];

if (empty($qty)) {
    echo ("Please Enter a quantity");
} elseif (!is_numeric($qty)) {
    echo ("Only Numbers can be entered");
} elseif (strlen($qty) > 10) {
    echo ("Quntity should be less than 10 characters");
} elseif (empty($unit_price)) {
    echo ("Please Enter a unit price");
} elseif (!is_numeric($unit_price)) {
    echo ("Only Numbers can be entered");
} elseif (strlen($unit_price) > 10) {
    echo ("Price should be less than 10 characters");
} else {

    $rs = DataBase::search("SELECT * FROM `stock` WHERE `product_id` = '" . $product . "' AND `price` = '" . $unit_price . "' ");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {
        //we have already stock then we can update
        $newQty = $d["qty"] + $qty;
        DataBase::iud("UPDATE `stock` SET `qty` = '" . $newQty . "' WHERE `stock_id` = '" . $d["stock_id"] . "'");
        echo ("Stock Updated Successfully");
    } else {
        //we don't have stock then we have to INSERT
        DataBase::iud("INSERT INTO`stock` (`price`,`qty`,`product_id`) VALUES ('" . $unit_price . "','" . $qty . "','" . $product . "')");
        echo ("New Stock Added Successfully");
    }



}


?>