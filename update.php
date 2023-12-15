<?php

include "../conn/config.php";

if (isset($_POST['update_id'])) {
    $update_id = $_POST['update_id'];
    $product_name = ($_POST['product_name']);
    $price = ($_POST['price']);
    $product_description = trim($_POST['product_description']);
    $status = $_POST['status'];
    $categorie_id = $_POST['categorie_id'];


    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if (empty($file)) {

        $sql = "UPDATE `product` SET
                                `product_name`       ='$product_name',
                                `price`              ='$price',
                                `product_description`='$product_description',
                                `categorie_id`       = $categorie_id,
                                `status`             = '$status'
                                  WHERE `product_id` = '$update_id'";
        $db->query($sql);
        header("location:view.php?msg2=Update Sucessfully");
    } else {
        $sql3 = "SELECT * FROM `product` WHERE `product_id`='$update_id'";
        $res = $db->query($sql3);
        $row = $res->fetch_object();

        unlink($row->image);


        $explode = explode(".", $file);
        $ext     = strtolower(end($explode));

        $dest = "photo/" . "product" . time() . "_" . $update_id . "." . $ext;

        $sql2 = "UPDATE `product` SET `image`='$dest'WHERE `product_id`='$update_id'";
        $db->query($sql2);
        move_uploaded_file($file_tmp, $dest);
        header("location:view.php?msg2=Update image Sucessfully");
    }
}
