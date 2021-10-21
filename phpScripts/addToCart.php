<?php
session_start();
require('functions.php');
require('connectDB.php');

$ProductID = sanitize(mysqli_real_escape_string($conn, $_POST['product_ID']));
$ProductCost = sanitize(mysqli_real_escape_string($conn, $_POST['cost']));

if (isset($ProductCost)){
    $_SESSION['basketTotal'] = $_SESSION['basketTotal']+$ProductCost;
}
if ($ProductID != "") {
    array_push($_SESSION['basket'],$ProductID);
}
echo var_dump($_SESSION['basketTotal']);
echo var_dump($_SESSION['basket']);
echo(session_id());

?>