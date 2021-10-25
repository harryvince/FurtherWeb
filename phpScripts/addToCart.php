<?php
session_start();
require('functions.php');
require('connectDB.php');

$ProductID = sanitize(mysqli_real_escape_string($conn, $_POST['product_ID']));

$stmt = $conn -> prepare('SELECT ProductName, cost FROM product_table WHERE ProductID = ? LIMIT 1');
$stmt -> bind_param('i', $ProductID);
$stmt -> execute();
$stmt -> bind_result($name, $ProductCost);
$stmt -> store_result();

if($stmt->num_rows == 1){
    if($stmt->fetch()){
        if (isset($ProductCost)){
            $_SESSION['basketTotal'] = $_SESSION['basketTotal']+$ProductCost;
        }
        if ($ProductID != "") {
            array_push($_SESSION['basket'],$ProductID);
        }
        echo $name." - Added To Basket";
    }
} else {
    echo"Unable to add item to the cart";
}
$stmt->close();

?>