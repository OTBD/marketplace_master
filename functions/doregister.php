<?php
session_start();
include("config.php");

$fname = clean($connect, $_POST['fname']);
$lname = clean($connect, $_POST['lname']);
$email = clean($connect, $_POST['email']);
$password = clean($connect, $_POST['password']);
$cpassword = clean($connect, $_POST['cpassword']);
$username = clean($connect, $_POST['username']);
$country = clean($connect, $_POST['country']);

if(empty($fname) && empty($lname) && empty($email) && empty($password) && empty($cpassword) && empty($username) && empty($country)) {
    setNotice("You left a field blank!");
    header("Location: ../index.php");
}

if($password != $cpassword) {    
    setNotice("Passwords do not match");
    header("Location: ../index.php");
}

$password = password_hash($password, PASSWORD_BCRYPT);

$query = $connect->query("SELECT * FROM `users` WHERE `email` = '". $email ."'");
if($query->num_rows == 0) {
    $query = $connect->query("SELECT * FROM `users` WHERE `username` = '". $username ."'");
    if($query->num_rows == 0) {
        $connect->query("INSERT INTO `users` (username, email, password, name, country) VALUES ('". $username ."', '". $email ."', '". $password ."', '". $fname . " " . $lname ."', '". $country ."')");
        $query = $connect->query("SELECT * FROM `users` WHERE `email` = '". $email ."'");
        $a = $query->fetch_assoc();
        $connect->query("INSERT INTO `users.profiles` (user_id) VALUES ('". $a['id'] ."')");
        $_SESSION['email'] = $email;
        setNotice("Successfully Registered!");
        header("location: ../index.php");
    } else {
        setNotice("This username is already taken!");
    header("Location: ../index.php");
    }
} else {
    setNotice("This email is already registered!");
    header("Location: ../index.php");
}

?>