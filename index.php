<?php


session_start();
if(isset($_SESSION['username'])){
    header("location:add_catagorie.php");
}
?>
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
    <center> 
    <div class="container">
    
    <!-- form start -->
  <div class="my-form">
    <div class="form-title">
      <h1>Member Register</h1>
    </div>
    <!-- main form -->
    <form action="register.php" method="POST" name="myform">
      <div class="single-input">
        <span><i class="fas fa-user"></i></span>
        <input type="text"name="username" placeholder="User Name"  autocomplete="off">
      </div>
      <div class="single-input">
        <span><i class="fas fa-user"></i></span>
        <input type="text"name="email" placeholder="User email" autocomplete="off">
      </div>
      <div class="single-input">
        <span><i class="fas fa-user"></i></span>
        <input type="text"name="phone" placeholder="User phone"  autocomplete="off">
      </div>
      <div class="single-input">
        <span><i class="fas fa-unlock"></i></span>
        <input type="password" name="password" placeholder="Password" autocomplete="off">
      </div>
      <div class="single-input">
        <span><i class="fas fa-unlock"></i></span>
        <input type="password" name="cpassword" placeholder="Confirm Password" autocomplete="off">
      </div>


      <div class="single-input submit-btn">
      <button onclick="return validateform()">Sing up</button>
      </div>
  
    </form>
 
<p> Already have an account?<a href="login.php">Login</a></p>
</center>  



  </div>
  </body>
</html>

<script>
    function validateform() {
        var username = document.forms.myform.username.value.trim();
        var email = document.forms.myform.email.value.trim();
        var mailFormat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var phone = document.forms.myform.phone.value.trim();
        var phnNumber = /^[6-9]\d{9}$/;
        var password = document.forms.myform.password.value;
        var cpassword = document.forms.myform.cpassword.value;
        

        if (username == ""){
            alert("please enter your username");
            return false;
        }
       
        if (email == "") {
            alert("please enter your email");
            return false;
        }
        if (!mailFormat.test(email)) {
            alert("Email Address is not valid, Please provide a valid Email");
            return false;
        }
        if (!phnNumber.test(phone)) {
            alert("Give a valid phone number");
            return false;   
        }
        
        if (password.length == 0) {
            alert("please enter passwod");
            return false;
        }
        if (password.length != 6) {
            alert("passwod must be 6 charectar");
            return false;
        }
        if (password != cpassword) {
            alert("please confirm your password");
            return false;
        }
        if (cpassword.length == 0) {
            alert("please enter confirm passsword");
            return false;
        }  
    }
    </script>