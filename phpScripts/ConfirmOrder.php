<?php
require('session.php');
require('connectDB.php');
require('functions.php');

$total = sanitize(mysqli_real_escape_string($conn, $_SESSION['basketTotal']));
$quantity = array_count_values($_SESSION['basket']);
$unique = array_unique($_SESSION['basket']);

$getOrderID = $conn -> prepare('SELECT OrderID FROM order_table ORDER BY OrderID LIMIT 1');
$getOrderID -> execute();
$getOrderID -> bind_result($ORDER_ID);
$getOrderID -> fetch();
$getOrderID -> close();
$ORDER_ID++;

$insertNewOrder = $conn -> prepare('INSERT INTO order_table (UserID, total) VALUES (?, ?)');
$insertNewOrder -> bind_param('id', $_SESSION['userID'], $_SESSION['basketTotal']);
$insertNewOrder -> execute();
$insertNewOrder -> close();

for($x=0; $x < count($unique); $x++){
    $stmt = $conn -> prepare('INSERT INTO orderProducts_table (OrderID, ProductID, Quantity) VALUES (?, ?, ?)');
    $stmt -> bind_param('iii', $ORDER_ID, $unique[$x], $quantity[$unique[$x]]);
    $stmt -> execute();
    $stmt -> close();
}

unset($_SESSION['basketTotal']);
unset($_SESSION['basket']);

?>