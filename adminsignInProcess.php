<?php
session_start();
include "connection.php";

$username = $_POST["u"];
$password = $_POST["p"];

//if else ladder
if (empty($username)) {
    echo ("Plase Enter Your Username");
} elseif (empty($password)) {
    echo ("Please Enter Your Password");
} else {
    $rs = DataBase::search("SELECT * FROM `user` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "' ");
    $num = $rs->num_rows;

    if ($num == 1) {
        $data = $rs->fetch_assoc();
        if ($data["status"] == 1 and $data["user_type_id"] == 1) {
            echo ("success");
            $_SESSION["a"] = $data;
        } else {
            echo ("You Don't have an admin  account");
        }
    } else {
        echo ("Invalid Username or Password");
    }
}

?>