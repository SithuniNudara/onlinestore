<?php 

include "connection.php";

$color = $_POST["col"];

if (empty($color)) {
   echo ("Please Enter A Color");
}elseif (strlen($color) > 20) {
    echo ("Color name should be less than 20 characters");
}
else{
    $rs = DataBase::search("SELECT * FROM `color` WHERE `color_name` = '".$color."' ");
    $num = $rs->num_rows;
    
    if ($num == 0) {
        DataBase::iud("INSERT INTO `color` (`color_name`) VALUES ('".$color."')");
        echo("success");
    } else {
        echo ("This color is alreay exists");
    }
    
}
?>