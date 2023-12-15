<?php
include "../conn/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>narayan_add_product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
   
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<?php
 session_start();
 if(!isset($_SESSION['username'])){
      header("location:login.php");
 }


$msg = "";
if (isset($_POST['product_name'])) {
    $product_name =ucfirst(trim($_POST['product_name']));
    $price =trim($_POST['price']);
    $product_description= ucfirst(trim($_POST['product_description']));
    $categorie_id = trim($_POST['categorie_id']);
    $status = $_POST['status'];

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $explode = (explode(',', $file));
    $ext = strtolower(end($explode));

        $destination = "photo/".time(). $ext;
        
        $sql = "INSERT INTO `product`(`product_name`,`price`,`product_description`,`categorie_id`,`status`,`image`)VALUES('$product_name','$price','$product_description',$categorie_id,'$status','$destination')";
        $db->query($sql);
        move_uploaded_file($file_tmp, $destination);
        header("location:view.php?msg2=$product_name Added");
        
    } 
?>
<center>

    <body>   
    <?php
    if(isset($_GET['msg']))
    echo "<script>alert('{$_GET["msg"]}');</script>";
   ?>

        <a href="index.php">Add Categories</a>&nbsp;&nbsp; <a href="view.php">View Product</a>
        <h3>Add Product</h3>
        
<form action="add_product.php" method="POST" name="myform" enctype="multipart/form-data" >
      <div class="single-input">
        <span><i class="fas fa-user"></i></span>
        <input type="text" name="product_name" placeholder="Product Name"  autocomplete="off">
      </div>
      <div class="single-input">
        <span><i class="fas fa-user"></i></span>
        <input type="text" name="price"placeholder="Product Price" min=1 autocomplete="off">
      </div>
      <div class="single-input">
        <span><i class="fas fa-user"></i></span>
        <textarea name="product_description" placeholder="Product Description" cols="30" rows="2"autocomplete="off"></textarea>
      </div>
      <div class="single-input">
      <span><i class="fas fa-user">Category</i></span>
      <select name="categorie_id">
                <option value="">Select Category</option>
                <?php
                 $sql = "SELECT * FROM `categories`";
             
                $res = $db->query($sql);
                while ($row = $res->fetch_object()) {
                    echo " <option value='$row->id'>$row->categorie_name</option>";
                }
                ?>
            </select>
            </div>

        <div class="single-input">
        <span><i class="fas fa-user"></i></span>
        <input type="radio" name="status" value="active">Active
        <input type="radio" name="status" value="deactive">Deactive
      </div>

      <div class="single-input">
        <span><i class="fas fa-unlock"></i></span>
        <input type="file" name="file" >
      </div>
      <div class="single-input submit-btn">
        
      <button onclick="return validateform()">Add Products</button>
      </div>
  
    </form>
        
</center>











</body>

</html>

<script>
    function validateform() {
        var name = document.forms.myform.product_name.value.trim();
        var price = document.forms.myform.price.value.trim();
        var product_description = document.forms.myform.product_description.value.trim();
        var category = document.forms.myform.categorie_id.value;
        var status = document.forms.myform.status.value;
        var file = document.forms.myform.file.files;
        var file_extaincen = /(\.jpg|\.jpeg|\.png|\.gif)$/i;

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
        if (!file.length) {
            alert("please chose a file");
            return false;
        }
        if (!file_extaincen.test(file[0].name)) {
            alert("please chose valid file");
            return false;
        }    
    }
    </script>