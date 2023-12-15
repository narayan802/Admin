<?php
include "../conn/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>narayan_categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
   
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<?php
 session_start();
 if(!isset($_SESSION['username'])){
      header("location:login.php");
 }


$msg="";
if(isset($_POST['categorie_name'])){
    $categorie_name= ucwords(trim($_POST['categorie_name']));
    $sql2 ="SELECT * FROM `categories` WHERE `categorie_name`='$categorie_name'";
    $res2=$db->query($sql2);
    $num =$res2->num_rows;
    if($num> 0){
        echo "<script>alert('$categorie_name is Alrady Exist')</script>";
    }else{
        
 echo   $sql ="INSERT INTO `categories`(`categorie_name`)VALUES('$categorie_name')";
    $db->query($sql);
    header("location:add_product.php?msg=$categorie_name Added ");
    }

    // $msg="$categorie_name Added ";
    
}
?>
 
<body>


<center>
<div class="alert alert-primary" role="alert">
<?php
//  echo $msg; 
?>

</div>
    
    <a href="add_product.php">Add Product</a> &nbsp;&nbsp;<a href="view.php"> View Product</a>
    <h3>Add Catagories</h3>
 <form action="add_catagorie.php" method="POST" name="myform">
    <label for="">Category</label>
        <input type="text" name="categorie_name" autocomplete="off">
        <button onclick="return validateform()">Add Categorie</button>
    </form>
</center>
  
</body>
</html>

<script>
    function validateform() {
        var categorie_name = document.forms.myform.categorie_name.value.trim();
    
     

        if (categorie_name.length == 0){
            alert("please enter Catagories name");
            return false;
        }
       
    }
    </script>