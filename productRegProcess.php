<?php

include "connection.php";

$pname = $_POST["pname"];
$brand = $_POST["brand"];
$cat = $_POST["cat"];
$size = $_POST["size"];
$color = $_POST["color"];
$desc = $_POST["desc"];
$image = $_FILES["image"];

//validation

if (empty($pname)) {
    echo ("Please Enter The Product Name");
} elseif (strlen($pname) > 30) {
    echo ("Product Name should be less than 30 characters");
} elseif ($brand == '0') {
    echo ("Please Select a Brand");
} elseif ($cat == '0') {
    echo ("Please Select a Category");
} elseif ($color == '0') {
    echo ("Please Select a Color");
} elseif ($size == '0') {
    echo ("Please Select a Size");
} elseif (empty($desc)) {
    echo ("Please Enter The Description");
}elseif (strlen($desc) > 100) {
    echo ("Data is too long");
}elseif (empty($image)) {
    echo ("Please Choose an Image");
} else {

    if (isset($_FILES["image"])) {

        $image = $_FILES["image"];

        $path = "Resources/ProductImg" . uniqid() . ".png";

        move_uploaded_file($image["tmp_name"], $path);

        $rs = DataBase::search("SELECT * FROM `product` WHERE `name` = '$pname'");
        $num = $rs->num_rows;

        if ($num > 0) {
            echo ("Product Has Been Already Registered");
        }else{
            DataBase::iud("INSERT INTO `product` (`name`,`description`,`path`,`brand_id`,`color_id`,`category_id`,`size_id`) VALUES ('$pname','$desc','$path','$brand','$color','$cat','$size')");
            echo ("Success");
        }

    } else {
        echo ("Please Select a Product Image");
    }
}


?>