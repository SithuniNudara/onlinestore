<?php

include "connection.php";

$rs = DataBase::search("SELECT * FROM `user` WHERE `user_type_id` = '2' ");
$num = $rs->num_rows;


for ($i=0; $i < $num; $i++) { 
    
    $d = $rs->fetch_assoc();
?>

<tr>
    <th scope="row"><?php echo $d["id"];?></th>
    <td><?php echo $d["fname"];?></td>
    <td><?php echo $d["lname"];?></td>
    <td><?php echo $d["email"];?></td>
    <td><?php echo $d["mobile"];?></td>
    <!--<td>
    <?php       
        //if ($d["status"] == "1") {
            //echo "Active";   

       // }else{
            //echo "Inactive";
        //}
    ?>
    </td>-->    
    <?php 
    if($d["status"] == "1"){
        //active
        ?><td class="text-success">Active</td><?php
    }else{
        ?><td class="text-danger">Inactive</td><?php
    }
    ?>
    
    

</tr>



<?php
}

?>