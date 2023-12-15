<?php
session_start();
include "../conn/config.php";
if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `login` WHERE (`username`='$username' OR `email`='$username') AND `username`='$username'";
    $res = $db->query($sql);
    $num = $res->num_rows;
    if ($num > 0) {
        $row = $res->fetch_array();
        $heshpass = $row['password'];
        if (password_verify($password, $heshpass)) {
            $_SESSION['login'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['timeout'] = time();
            header("location:view.php");
        } 
    }
    else{
        header("location:login.php?msg=username and password do not match");
    }
}else{
    header("location:login.php");
}
