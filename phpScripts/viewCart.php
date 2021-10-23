<?php
require('session.php');
require('connectDB.php');
function stripDATA($data) {
    $data = stripslashes($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

$cartItems = $_SESSION['basket'];

$quantity = array_count_values($cartItems);
$unique = array_unique($cartItems);

for($x=0; $x < count($unique); $x++){
    $stmt = $conn -> prepare('SELECT * FROM product_table WHERE ProductID = ? LIMIT 1');
    $stmt -> bind_param('i', $unique[$x]);
    $stmt -> execute();
    $stmt -> bind_result($id, $name, $desc, $image, $cost);
    $stmt -> fetch();
    $stmt -> close();
    echo"
    <div class='card mb-3' style='max-width: 540px;'>
      <div class='row g-0'>
        <div class='col-md-4'>
          <img src='images/".$image."' class='img-fluid rounded-start'>
        </div>
        <div class='col-md-8'>
          <div class='card-body'>
            <h5 class='card-title'>".$name."</h5>
            <p class='card-text'>Quantity: ".$quantity[$unique[$x]]."</p>
            <p class='card-text'><small class='text-muted'>£".$cost*($quantity[$unique[$x]])."</small></p>
          </div>
        </div>
      </div>
    </div>
    ";
}
?>