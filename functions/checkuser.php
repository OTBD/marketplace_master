<?php
session_start();
include("config.php");
require("password.php");

$email = mysqli_real_escape_string($connect, stripslashes($_POST['email']));
$password = mysqli_real_escape_string($connect, stripslashes($_POST['password']));

$query = $connect->query("SELECT * FROM `users` WHERE `email` = '". $email ."'");

if($query->num_rows == 1) {
    $a = $query->fetch_assoc();
    if(password_verify($password, $a['password'])) {
        $_SESSION['email'] = $email;
        setNotice("Logged in successfully");
        header("location: ../index.php");
    } else {
        setNotice("Email or Password is wrong!");
        header("location: ../index.php");
    }
} else {
        setNotice("Email or Password is wrong!");
    header("location: ../index.php");
}

?>