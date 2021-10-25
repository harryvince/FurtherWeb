<?php
require('session.php');
require('connectDB.php');
$quantity = array_count_values($_SESSION['basket']);
$unique = array_unique($_SESSION['basket']);

for($x=0; $x < count($unique); $x++){
    $stmt = $conn -> prepare('SELECT * FROM product_table WHERE ProductID = ? LIMIT 1');
    $stmt -> bind_param('i', $unique[$x]);
    $stmt -> execute();
    $stmt -> bind_result($id, $name, $desc, $image, $cost);
    $stmt -> fetch();
    $stmt -> close();
    if(isset($quantity[$unique[$x]])){
    echo"
    <li class='list-group-item d-flex justify-content-between lh-condensed'>
      <div>
        <h6 class='my-0'>".$name."</h6>
        <small class='text-muted'>".$quantity[$unique[$x]]."x Units</small>
      </div>
      <span class='text-muted'>£".sprintf("%0.2f",$cost*$quantity[$unique[$x]])."</span>
    </li>
    ";
    }
}

?>