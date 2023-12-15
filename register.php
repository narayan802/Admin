<?php
include "../conn/config.php";

if(isset($_POST['username'])){
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = addslashes($_POST['password']);
    $cpassword = ($_POST['cpassword']);
    $hspassword= password_hash($password, PASSWORD_DEFAULT);

    $sql ="SELECT * FROM `login` WHERE `username`='$username' OR `email`='$email'";
    $res =$db->query($sql);
    $num =$res->num_rows;

    if($num>0){
        echo"<script>alert('username or email is alrady exiset')</script>";
    }
    
        else{
            $sql ="INSERT INTO `login`(`username`,`email`,`phone`,`password`) VALUES('$username','$email','$phone','$hspassword')";
            $db->query($sql);
            header("location:login.php?msg=Registersucessfully");
        }
    
    } 


?>