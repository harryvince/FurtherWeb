<?php
require('connectDB.php');

$stmt = $conn -> prepare('SELECT * FROM product_table');
$stmt -> execute();
$stmt -> bind_result($productID, $productName, $productDes, $imageLoc);
$stmt -> store_result();

while ($stmt->fetch()){
?>
<div class="card text-center text-white bg-dark mb-3" style="width: 18rem; margin: 5px 5px 5px 5px">
    <img class="card-img-top" src="images/<?php echo $imageLoc ?>" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title"><?php echo $productName ?></h5>
      <p class="card-text"><?php echo $productDes ?></p>
      <a href="#" class="btn btn-primary">Add to cart</a>
    </div>
</div>

<?php
}
?>