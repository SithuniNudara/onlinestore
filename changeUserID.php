<?php


include "connection.php";

$id = $_POST["id"];

if (empty($id)) {
    echo ("Enter Id");
} else {
    $rs = DataBase::search("SELECT * FROM `user` WHERE `id` = '" . $id . "' AND `user_type_id` = '2' ");
    $num = $rs->num_rows;
    if ($num == 1) {
        $d = $rs->fetch_assoc();
        if ($d["status"] == '1') {
            DataBase::iud("UPDATE `user` SET `status` = '0' WHERE `id` = '" . $id . "'");
            echo ("deactivated");
        } else {
            DataBase::iud("UPDATE `user` SET `status` = '1' WHERE `id` = '" . $id . "'");
            echo ("activated");
        }

    } else {
        echo ("invalid id");
    }
}







?>