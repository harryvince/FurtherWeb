<?php
require('session.php');
require('connectDB.php');
function DATA($data) {
    $data = stripslashes($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}
$newTotal = 0.00;

$itemID = DATA($_POST['itemID']);

$count = count($_SESSION['basket']);

for($x=0; $x < $count; $x++){
    if($_SESSION['basket'][$x] == $itemID){
        unset($_SESSION['basket'][$x]);
    }
}

$_SESSION['basket'] = array_values($_SESSION['basket']);

for($x=0; $x < count($_SESSION['basket']); $x++){
    $stmt = $conn -> prepare('SELECT cost FROM product_table WHERE ProductID = ? LIMIT 1');
    $stmt -> bind_param('i', $_SESSION['basket'][$x]);
    $stmt -> execute();
    $stmt -> bind_result($cost);
    $stmt -> fetch();
    $stmt -> close();

    $newTotal = $newTotal+$cost;
}

if(isset($newTotal)){
    $_SESSION['basketTotal'] = $newTotal;
}

echo"Item Removed";
?>