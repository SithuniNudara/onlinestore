<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];



$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$mobile = $_POST["mobile"];
$password = $_POST["password"];
$no = $_POST["no"];
$line1 = $_POST["line1"];
$line2 = $_POST["line2"];

//if else ladder to verify details
if (empty($fname)) {
    echo ("Please Enter Your First Name");
} elseif (strlen($fname) > 20) {
    echo ("First name should be less than 20 characters");
} else if (empty($lname)) {
    echo ("Please Enter Your Last Name");
} elseif (strlen($lname) > 20) {
    echo ("Last name should be less than 20 characters");
} else if (empty($email)) {
    echo ("Please Enter Your Email Address");
} elseif (strlen($email) > 100) {
    echo ("Email should be less than 100 characters");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Your Email Address Is Invalid");
} else if (empty($mobile)) {
    echo ("Please Enter Your Mobile Number");
} elseif (strlen($mobile) != 10) {
    echo ("Please Enter Valid Mobile Number");
} elseif (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Invalid Mobile Number");
} else if (empty($password)) {
    echo ("Please Enter Your password");
} elseif (strlen($password) < 5 || strlen($password) > 45) {
    echo ("password must contain 5 to 45 characters");
} else if (empty($no)) {
    echo ("Enter your address no");
} elseif (strlen($no) > 10) {
    echo ("Enter Value Less than 10 characters");
} elseif (empty($line1)) {
    echo ("Address Line 1 is empty ");
}elseif (strlen($line1) > 50) {
   echo("enter values less then 50 characters");
}elseif (empty($line2)) {
    echo ("Address Line 2 is empty ");
}elseif (strlen($line2) > 50) {
   echo("enter values less then 50 characters");
}else {
//update query

DataBase::iud("UPDATE `user` SET `fname` = '".$fname."',`lname` = '".$lname."',`email` = '".$email."',`mobile` = '".$mobile."',`password` = '".$password."',`no` = '".$no."',`line_1` = '".$line1."',`line_2` = '".$line2."' WHERE `id` = '".$user["id"]."' ");

$rs = DataBase::search("SELECT * FROM `user` WHERE `id` = '".$user["id"]."'");
$d = $rs->num_rows;
$_SESSION["u"] = $d;

echo("success");


}
?>

