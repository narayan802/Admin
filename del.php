<?php
include "../conn/config.php";
if(isset($_GET["del_id"])){
    $del_id = $_GET["del_id"];

    $sql = "SELECT * FROM `product` WHERE `product_id` = '$del_id'";
    $res = $db->query($sql);
    $row = $res->fetch_array();
    
    unlink($row['image']);
    

$sql="DELETE FROM `product` WHERE `product_id`='$del_id'";
$db->query($sql);
header("location:view.php");
}
?>