<?php  

include "connection.php";

$brand = $_POST["b"];

if (empty($brand)) {
    echo("Please Enter Brand Name");
}elseif (strlen($brand) > 20) {
    echo("Brand name should have less than 20 characters");
}else{
   $rs = DataBase::search("SELECT * FROM `brand` WHERE `brand_name` = '".$brand."'");
   $num = $rs->num_rows;

   if ($num == 1) {
    echo ("This Brand Is Already Exists");
   } else {
    DataBase::iud("INSERT INTO `brand` (`brand_name`) VALUES ('".$brand."')");
    echo("success");
   }
   
   
}
?>