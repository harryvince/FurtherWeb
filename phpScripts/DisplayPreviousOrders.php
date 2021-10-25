<?php
require('session.php');
require('connectDB.php');

class Item {

    public $ItemName;
    public $ItemQuantity;

    function set_name($ItemName){
        $this->ItemName = $ItemName;
    }
    function get_name() {
        return $this->ItemName;
    }
    function set_quantity($ItemQuantity){
        $this->ItemQuantity = $ItemQuantity;
    }
    function get_quantity() {
        return $this->ItemQuantity;
    }
}

$products = new ArrayObject(array());

$stmt = $conn -> prepare('SELECT OrderID, Total FROM order_table WHERE UserID = ?');
$stmt -> bind_param('i', $_SESSION['userID']);
$stmt -> execute();
$stmt -> bind_result($OrderID, $Total);
$stmt -> store_result();

if($stmt->num_rows >= 1){
    while ($stmt->fetch()){
        $product = $conn -> prepare('SELECT orderproducts_table.ProductID, product_table.ProductName, orderproducts_table.Quantity FROM orderproducts_table INNER JOIN product_table ON orderproducts_table.ProductID = product_table.ProductID WHERE orderproducts_table.OrderID = ?');
        $product -> bind_param('i', $OrderID);
        $product -> execute();
        $product -> bind_result($ProductID, $name, $quantity);
        while ($product->fetch()){
            $ITEM = new Item();
            $ITEM->set_name($name);
            $ITEM->set_quantity($quantity);
            $products->append($ITEM);
        }
        echo"
        <div class='card text-center justify-content center mb-3' style='max-width: 540px;'>
          <div class='row g-0'>
            <div class='card-body'>
              <h5 class='card-title'>Order: ".$OrderID."</h5>
              <div class='form-row justify-content-center d-flex'>
                <p class='card-text'>";
                    $i = 0;
                    $len = count($products);
                    foreach($products as &$value){
                        echo $value->get_name()." x ".$value->get_quantity();
                        if ($i < $len - 1){
                            echo", ";
                        }
                        $i++;
                    }
                echo"</p>
              </div>
              <p class='card-text'><small class='text-muted'>Cost of Order £".sprintf("%0.2f",$Total)."</small></p>
            </div>
          </div>
        </div>
        ";
        unset($products);
        $products = new ArrayObject(array());
        $product->close();
    }
} else{
    echo "You have no previous Orders!";
}

$stmt -> close();

?>