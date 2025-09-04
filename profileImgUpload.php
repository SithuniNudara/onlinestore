<?php 
session_start();

include "connection.php";

$user = $_SESSION["u"];

//$image = $_FILES["i"];

//if elseif ladder
if (empty($_FILES["i"])) {
    echo ("Select An Image");
} else {
    //Upload Image
    $rs = DataBase::search("SELECT * FROM `user` WHERE `id` = '".$user["id"]."'");
    $d = $rs->fetch_assoc();

    if (!empty($d["img_path"])) {
       unlink($d["img_path"]); //DELETE FROM THE PROJECT 

    }

    $path = "Resources/profileimg//".uniqid().".png";
    move_uploaded_file($_FILES["i"]["tmp_name"], $path);

    DataBase::iud("UPDATE `user` SET `img_path` = '".$path."' WHERE `id` = '".$user["id"]."'");
    echo($path);
}

?>