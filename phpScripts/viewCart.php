<?php
require('session.php');
require('connectDB.php');
function stripDATA($data) {
    $data = stripslashes($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}
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
        <div class='card mb-3' style='max-width: 540px;'>
          <div class='row g-0'>
            <div class='col-md-4'>
              <img src='images/".$image."' class='img-fluid rounded-start'>
            </div>
            <div class='col-md-8'>
              <div class='card-body'>
                <h5 class='card-title'>".$name."</h5>
                <div class='form-group'>
                  <label for='InputQuantity'>Quantity</label>
                  <input type='number' class='form-control w-25 updateQuantity' id='".$id."' placeholder='".$quantity[$unique[$x]]."'>
                </div>
                <p class='card-text'><small class='text-muted'>Cost per unit £".$cost."</small></p>
                <a href='#' class='btn btn-danger'>Remove</a>
              </div>
            </div>
          </div>
        </div>
        ";
        }
    } 

?>