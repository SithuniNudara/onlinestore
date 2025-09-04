<?php 

$cartId = $_POST["c"];
include "connection.php";
//echo $cartId;

DataBase::iud("DELETE FROM `cart` WHERE `cart_id` = '".$cartId."'");
echo("Items successfully deleted");

?>