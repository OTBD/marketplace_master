<?php
session_start();
include("config.php");
$query = $connect->query("SELECT * FROM `users` WHERE `email` = '". $_SESSION['email'] ."'");
$r = $query->fetch_assoc();

$file_formats = array("jpg", "png", "gif", "bmp");

$filepath = "assets/imgs/";

if (isset($_POST['submitbtn'])=="Submit") {

 $name = $_FILES['imagefile']['name']; // filename to get file's extension
 $size = $_FILES['imagefile']['size'];
 
 if (strlen($name)) {
 	$extension = substr($name, strrpos($name, '.')+1);
 	if (in_array($extension, $file_formats)) { // check it if it's a valid format or not
 		if ($size < (2048 * 1024)) { // check it if it's bigger than 2 mb or no
 			$imagename = md5(uniqid() . time()) . "." . $extension;
 			$tmp = $_FILES['imagefile']['tmp_name'];
 				if (move_uploaded_file($tmp, $filepath . $imagename)) {
 					echo '<img class="preview" alt="" src="/'.$filepath.'/'. $imagename .'" width="100px" height="100px">';
                    $edit = $connect->query("UPDATE `users.profiles` SET `headpicture` = '". $imagename ."' WHERE `user_id` = '". $r['id'] ."'");
 				} else {
 					echo "Could not move the file.";
 				}
 		} else {
 			echo "Your image size is bigger than 2MB.";
 		}
 	} else {
 			echo "Invalid file format.";
 	}
 } else {
 	echo "Please select image..!";
 }
 exit();
}
 
?>