<?php
function getSiteSetting($connect, $val) {
    $getsite = $connect->query("SELECT * FROM `site` WHERE `id` = '". $val ."'");
    $s = $getsite->fetch_assoc();
    return $s['val'];
}

function doLoginCookie($connect, $userid) {
    $cookiename = generateRandomString();
    setcookie("loggedin", $cookiename);
    $getother = $connect->query("SELECT * FROM `cookies` WHERE `name` = 'loggedin' AND `user` = '". $userid ."'");
    if($getother->num_rows != 0) {
        $delete = $connect->query("DELETE FROM `cookies` WHERE `name` = 'loggedin' AND `user` = '". $userid ."'");
    }
    $cookie = $connect->query("INSERT INTO `cookies` (name, user, val) VALUES ('loggedin', '". $userid ."', '". $cookiename ."')");
}

function getLoggedInUser() {
    include("blog-config.php");
    $cookie = $connect->query("SELECT * FROM `cookies` WHERE `name` = 'loggedin' AND `val` = '". $_COOKIE['loggedin'] ."'");
    $c = $cookie->fetch_assoc();
    return $c['user'];
}

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>