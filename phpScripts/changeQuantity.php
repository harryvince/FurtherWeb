<?php
require('functions.php');
require('connectDB.php');
session_start();

if(isset($_POST['product_ID']) && isset($_POST['quantity'])) {

    $y = 1;
    $newTotal = 0.00;
    $itemid = sanitize($_POST['product_ID']);
    $quantity = sanitize($_POST['quantity']);

    $count = array_count_values($_SESSION['basket']);
    if($quantity > $count[$itemid]){
        $PosQuantity = $quantity - $count[$itemid];
    } elseif ($quantity < $count[$itemid]){
        $NegQuantity = $count[$itemid] - $quantity;
    }

    if(isset($PosQuantity)){
        for($x=0; $x < $PosQuantity; $x++){
            array_push($_SESSION['basket'],$itemid);
        }
    }

    if(isset($NegQuantity)){
        for($x=0; $NegQuantity > 0; $x++){
            if($_SESSION['basket'][$x] == $itemid){
                unset($_SESSION['basket'][$x]);
                $NegQuantity--;
            }
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

    echo"Quantity Updated";
    
}
?>