<?php
session_start();
include("functions/config.php");

if(isset($_GET['id'])) {
    addproduct($connect, $_COOKIE['cartid'], $_GET['id']);
    header("location: basket.php");
}

function addproduct($connect, $cartid, $id) {
    $query1 = $connect->query("SELECT * FROM `baskets` WHERE `cookieid` = '". $cartid ."'");
    $r = $query1->fetch_assoc();
    $query = $connect->query("SELECT * FROM `basketitems` WHERE `basket_id` = '". $r['id'] ."' AND `product_id` = '". $id ."'");
    if($query1->num_rows == 0) {
        $cbasket = $connect->query("INSERT INTO `baskets` (`cookieid`) VALUES ('". $cartid ."')");
    }

    if($query->num_rows != 0) {
        $amount = $query->fetch_assoc();
        $at = $amount['qty'];
        $new = $at + 1;
        $query = $connect->query("UPDATE `basketitems` SET `qty` = '". $new ."' WHERE `basket_id` = '". $r['id'] ."' AND `product_id` = '". $id ."'");      
    } else {
        $query = $connect->query("INSERT INTO `basketitems` (`basket_id`, `product_id`, `qty`) VALUES ('". $r['id'] ."', '". $id ."', '1')");
    }
}
?>