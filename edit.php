<?php
include "../conn/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>narayan_edit</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>


    <?php



    if (isset($_GET['edit_id'])) {

        $edit_id = $_GET['edit_id'];

        $sql2 = "SELECT * FROM `product` WHERE `product_id`='$edit_id'";
        $res2 = $db->query($sql2);
        $row2 = $res2->fetch_object();
    }
    ?>

    <center>
        <?php
        if (isset($_GET['msg2']))
            echo "<script>alert('{$_GET["msg2"]}');</script>";
        ?>
        <button onclick="history.back()">Go Back</button>
        <h3>Edit Product</h3>

        <form action="update.php" method="POST" enctype="multipart/form-data" name="myform">
            <input type="hidden" name="update_id" value="<?php echo $row2->product_id ?>"><br>
            <div class="single-input">

                <span><i class="fas fa-user"></i></span>
                <input type="text" name="product_name" placeholder="Product Name" value="<?php echo $row2->product_name ?>" autocomplete="off">
            </div>
            <div class="single-input">
                <span><i class="fas fa-user"></i></span>
                <input type="text" name="price" placeholder="Product Price" min=1 value="<?php echo $row2->price ?>" autocomplete="off">
            </div>
            <div class="single-input">
                <span><i class="fas fa-user"></i></span>
                <textarea name="product_description" placeholder="Product Description" cols="30" rows="2" value="" autocomplete="off"><?php echo $row2->product_description ?></textarea>
            </div>
            <div class="single-input">
                <span><i class="fas fa-user">Category</i></span>
                <select name="categorie_id">
                    <option value="">Select Category</option>
                    <?php
                    $sql = "SELECT * FROM categories";
                    $res = $db->query($sql);
                    while ($row = $res->fetch_object()) {

                        if ($row2->categorie_id == $row->id) {
                            echo "<option value=\"$row->id\"selected> $row->categorie_name </option>";
                        } else {
                            echo "<option value=\"$row->id\">$row->categorie_name </option>";
                        }
                    }
                    ?>
                </select>
            </div>
            
            <div class="single-input">
           

                <span><i class="fas fa-user"></i></span>
                <input type="radio" name="status" value="active" <?php if ($row2->status == "active")  echo 'checked="checked"';?>>Active
                <input type="radio" name="status" value="deactive" <?php if ($row2->status == "deactive") echo 'checked="checked"'; ?>>Deactive
            </div>

            <div class="single-input">
                <span><i class="fas fa-unlock"></i></span>
                <input type="file" name="file">
                <img src="<?php echo $row2->image ?>" width="50px" alt="">
            </div>
            <div class="single-input submit-btn">
                <!-- <input type="submit" value="submit"> -->
                <button onclick="return validateform()">Edit Product</button>
            </div>

        </form>

    </center>
    <?php

    ?>





<script>
    function validateform() {
        var name = document.forms.myform.product_name.value.trim();
        var price = document.forms.myform.price.value.trim();
        var product_description = document.forms.myform.product_description.value.trim();
        var category = document.forms.myform.categorie_id.value;
        var status = document.forms.myform.status.value;
        

        if (name.length == 0){
            alert("please enter product name");
            return false;
        }
        if(!isNaN(name)){
        alert("number not allow");
        return false;
        }
        if (price == "") {
            alert("please enter price");
            return false;
        }
        if(isNaN(price)){
        alert("only number Allow");
        return false;
        }
        if (price == 0) {
            alert("0 num allow");
            return false;
        }
        if (product_description == 0) {
            alert("please Enter Description");
            return false;
        }
        if (category == "") {
            alert("please select category");
            return false;
        }
        if (status == "") {
            alert("please choose one");
            return false;
        }
        
    }
    </script>