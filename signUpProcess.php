<?php
// connetion file 
include "connection.php";
//

//data that comes with the connection
$fname = $_POST['f'];
$lname = $_POST['l'];
$email = $_POST['e'];
$mobile = $_POST['m'];
$username = $_POST['u'];
$password = $_POST['p'];


//if else ladder to verify details
if (empty($fname)) {
    echo ("Please Enter Your First Name");
} elseif (strlen($fname) > 20) {
    echo ("First name should be less than 20 characters");
}else if (empty($lname)) {
    echo ("Please Enter Your Last Name");
} elseif (strlen($lname) > 20) {
    echo ("Last name should be less than 20 characters");
}else if (empty($email)) {
    echo ("Please Enter Your Email Address");
} elseif (strlen($email) > 100) {
    echo ("Email should be less than 100 characters");
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Your Email Address Is Invalid");
}else if (empty($mobile)) {
    echo ("Please Enter Your Mobile Number");
} elseif (strlen($mobile) != 10) {
    echo ("Please Enter Valid Mobile Number");
} elseif (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Invalid Mobile Number");
}else if (empty($username)) {
    echo ("Please Enter Username");
} elseif (strlen($username) > 20) {
    echo ("Username should be less than 20 characters");
}else if (empty($password)) {
    echo ("Please Enter Your password");
} elseif (strlen($password) < 5 || strlen($password) > 45) {
    echo ("password must contain 5 to 45 characters");
} else {
    
    $rs = DataBase::search(" SELECT * FROM `user` WHERE `email` = '" . $email . "' OR `mobile` = '" . $mobile . "' OR `username` = '" . $username . "' ");
    $row_count = $rs->num_rows;
    if ($row_count > 0) {
        echo ("Email or Mobile or Username already exists");
    } else {
        //Insert Data
        DataBase::iud("INSERT INTO `user` (`fname`, `lname`, `email`,`mobile`,`username`,`password`,`user_type_id`) VALUES('" . $fname . "','" . $lname . "','" . $email . "','" . $mobile . "','" . $username . "',
'" . $password . "','2') ");
        echo ("Success");
    }
}
?>