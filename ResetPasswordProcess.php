<?php 

//session_start();

include "connection.php";

$vcode = $_POST["vcode"];
$np = $_POST["np"];
$np2 = $_POST["np2"];

if ($np == $np2) {
    $rs = DataBase::search("SELECT * FROM `user` WHERE `v_code` = '".$vcode."'");
    $num = $rs->num_rows;

    if ($num > 0) {
        $d = $rs->fetch_assoc();
        DataBase::iud("UPDATE `user` SET `password`= '".$np."',`v_code` = NULL WHERE `id` = '".$d["id"]."' ");
        echo("Success");
    } else {
        # code...
    }
    
} else {
    //
    echo("Password dosen't matched");
}


?>