<?php 
include "connection.php";

$size = $_POST["size"];

if (empty($size)) {
    echo("Please Enter Size");
} else if(strlen($size)>20){
    echo("Please Enter Size less than 20 characters");
}else{
    $rs = DataBase::search("SELECT * FROM `size` WHERE `size_name` = '".$size."'");
    $num = $rs->num_rows;
    
    if ($num == 0) {
       DataBase::iud("INSERT INTO `size` (`size_name`) VALUES ('".$size."')");
       echo("Success");
    } else {
        echo("This Size is already exists");
    }
    
}

?>