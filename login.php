<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
      session_start();
      if(isset($_SESSION['username'])){
           header("location:add_catagorie.php");
      }

 
    if(isset($_GET['msg']))
   echo "<script>alert('{$_GET["msg"]}');</script>";
?>
<center>
 
  <div class="container">
    
    <!-- form start -->
  <div class="my-form">
    <div class="form-title">
      <h1>Member Login</h1>
    </div>
    <!-- main form -->
    <form action="verify.php" method="POST" name="myform">
      <div class="single-input">
        <span><i class="fas fa-user"></i></span>
        <input type="text"name="username" placeholder="User Name" autocomplete="off">
      </div>
      <div class="single-input">
        <span><i class="fas fa-unlock"></i></span>
        <input type="password" name="password" placeholder="Password" autocomplete="off">
      </div>

      <div class="single-input submit-btn">
      <button onclick="return validateform()">Login</button>
      </div>
  
    </form>

  </div>
<p>New User?<a href="index.php">Register</a></p>
</center>

</body>
</html>

<script>
    function validateform() {
        var username = document.forms.myform.username.value.trim();
        var password = document.forms.myform.password.value;
       
        

        if (username == ""){
            alert("please enter your username");
            return false;
        }
        
        if (password.length == 0) {
            alert("please enter passwod");
            return false;
        }
       
        
    }
    </script>






  


