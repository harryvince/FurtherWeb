<?php
require('connectDB.php');
require('functions.php');
$x = 0;
$stmt = $conn -> prepare('SELECT * FROM product_table');
$stmt -> execute();
$stmt -> bind_result($productID, $productName, $productDes, $imageLoc, $cost);
$stmt -> store_result();

while ($stmt->fetch()){
    if ($x==0){
      echo"<div class='card-deck d-flex justify-content-center'>";
      generateCard($productID, $imageLoc, $productName, $productDes, $cost);
      $x++;
    } elseif ($x % 5 == 0){
      generateCard($productID, $imageLoc, $productName, $productDes, $cost);
      echo"</div>";
      echo"<div class='card-deck d-flex justify-content-center'>";
  $x++;
    } else{
      generateCard($productID, $imageLoc, $productName, $productDes, $cost);
      $x++;
  }
}
?>