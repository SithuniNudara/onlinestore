<?php 

include "connection.php";

$category = $_POST["c"];

if (empty($category)) {
   echo ("Please Enter A Category Name");
}elseif (strlen($category) >20) {
   echo ("Category Name Should Less Than 20 characters");
}else{
    $rs = DataBase::search("SELECT * FROM `category` WHERE `cat_name` = '".$category."'");
    $num = $rs->num_rows;

    if ($num == 0) {
       DataBase::iud("INSERT INTO `category` (`cat_name`) VALUES ('".$category."')");
       echo("Success");
    } else {
       echo ("Thsi Category Name Is Already Exists");
    }
    
}



?>