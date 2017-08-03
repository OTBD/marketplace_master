<?php
$quantity= $_POST['quantity'];
  $products= implode(',' , $_POST['products']);
  echo $products; //used that value to store in database result will be like this 1,2,5,6
?>