<?php
include "../conn/config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>narayan_view</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
   
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>


<body>
<?php
      session_start();
      if(!isset($_SESSION['username'])){
           header("location:login.php");
      }

    //   if((time()-$_SESSION['timeout'])>100){
    //     session_unset();
    //     session_destroy();
    //     header("location:login.php");
    // }

?>
    <?php
    if (isset($_GET['page']))
        $page = $_GET['page'];
    else
        $page = 1;


    $start_limit = ($page - 1) * 5;

    ?>
    <?php
    if (isset($_GET['msg2']))
        echo "<script>alert('{$_GET["msg2"]}');</script>";

    ?>

    <center>
        
        <!-- <form method="GET" action="view.php">
            <input type="text" name="keywords" placeholder="Search Keywords" size="50" required autocomplete="off">
            <input type="submit" value=" Search " class="btn btn-sm">
        </form>
        <br> -->

        <a href="add_catagorie.php" class="btn btn-outline-success mt-2">Add Categories</a> &nbsp;&nbsp;&nbsp;<a href="add_product.php" class="btn btn-outline-primary mt-2">Add Product</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php" class="btn btn-outline-danger mt-2">Logout</a>&nbsp;&nbsp;&nbsp;Welcome 
        <?php echo $_SESSION['username'];?>
    </center>
    <?php


    $sql = "SELECT * FROM `product` ";
    $res = $db->query($sql);
    $num = $res->num_rows;
    $total_pages = ceil($num / 5);

    if ($page > 1) {
        $prev = $page - 1;
        echo "&nbsp;&nbsp;&nbsp;<a href = \"view.php?page=$prev\"class='btn btn-danger'>Previous</a>&nbsp;";
    }

    for($i=1; $i<=$total_pages; $i++){
        echo"<a href =\"view.php?page=$i\" class='btn btn-info'>$i</a>&nbsp;";
    }
    if ($page < $total_pages) {
        $next = $page + 1;
        echo "<a href = \"view.php?page=$next\"class='btn btn-primary'>Next</a>";
    }
    ?>
    <center>
        <h3>View Product</h3>
    </center>
    <table class="table table-dark">
        <thead class="table-info">
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Product Description</th>
                <th>Categories</th>
                <th>Status</th>
                <th>Images</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <?php

        // if (isset($_GET['keywords'])) {
        //     $keyword = $_GET['keywords'];

        //     $sqlx = "SELECT * FROM `product` WHERE `product_name`LIKE '%$keyword%' OR `price` LIKE '%$keyword%'OR `categorie_id`='%$keyword%'";
        //     $resx = $db->query($sqlx);
        //     $numx = $resx->num_rows;
        //     if ($numx > 0) {
        //         while ($rowx = $resx->fetch_object()) {


        //             $sql2 = "SELECT * FROM `categories` WHERE `id` ='$rowx->categorie_id'";
        //             $res2 = $db->query($sql2);
        //             $row2 = $res2->fetch_object();
        //             echo " 
         
        // <tbody>
        // <tr>  
        //     <td>$rowx->product_id</td>
        //     <td>$rowx->product_name</td>
        //     <td>$rowx->price</td>
        //     <td>$rowx->product_description</td>
        //     <td>$row2->categorie_name</td>
        //     <td><img src='$rowx->image' alt='' width='50px'></td>
        //     <td><a href='edit.php?edit_id=$rowx->product_id'>Edit</a></td>
        //     <td><a href ='del.php?del_id=$rowx->product_id' Onclick = \" return confirm('Are You Sure?')\">Delete</a></td> 
        // </tr>
        // </tbody> ";
        //         }
        //     } else {
        //         echo " $keyword No found";
        //     }
        // } else {





            // $sql = "SELECT * FROM `product` JOIN `categories` ON product.product_id = categories.id limit $start_limit,5";
            $i=1;
            $sql = "SELECT * FROM `product` ORDER BY product_id DESC  limit $start_limit,5";
            $res = $db->query($sql);
            while ($row = $res->fetch_object()) {
                
                   $sql2="SELECT * FROM `categories` WHERE `id` ='$row->categorie_id'";
                   $res2=$db->query($sql2);
                   $row2=$res2->fetch_object();
                
        
                echo "
         
               <tbody>
               <tr>  
                   <td>$i</td>
                   <td>$row->product_name</td>
                   <td>$row->price</td>
                   <td>$row->product_description</td>
                   <td>$row2->categorie_name</td>
                   <td>$row->status</td>
                   <td><img src='$row->image' alt='' width='50px' class='rounded-circle'></td>
                   <td><a href='edit.php?edit_id=$row->product_id'>Edit</a></td>
                   <td><a href ='del.php?del_id=$row->product_id' Onclick = \" return confirm('Are You Sure?')\">Delete</a></td> 
               </tr>
               </tbody>
               ";
               $i++;
            }
        // }

        ?>


    </table>

    
<div >

</div>


</body>

</html>