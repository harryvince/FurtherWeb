<?php
require('phpScripts/session.php');
    if(isset($_SESSION['checkout']) && $_SESSION['checkout'] != 1){
        header('Location: index.php');
    } elseif(!isset($_SESSION['checkout'])){
        header('Location: index.php');
    }
?>
<html>
<header>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <title>Vince Shops | Checkout</title>
</header>
<body class="bg-light">
    <div class="container">
  <div class="py-5 text-center">
    <img class="d-block mx-auto mb-4" src="images/cart.png" alt="" width="72" height="72">
    <h2>Checkout</h2>
  </div>
<div class="row justify-content-center">
    <div class="col-md-4 order-md-2 mb-4 justify-content-center">
      <ul class="list-group mb-3">
        <?php require('phpScripts/checkoutCard.php'); ?>
        <li class="list-group-item d-flex justify-content-between">
          <span>Total (GBP)</span>
          <strong><?php echo "£".sprintf("%0.2f",$_SESSION['basketTotal']);?></strong>
        </li>
      </ul>

      <form class="card p-2">
        <button class="btn btn-primary btn-lg btn-block SubmitOrder" type="submit">Confirm Order</button>
      </form>

    </div>
  </div>

<script>
$(function(){
  $(document).on('click','.SubmitOrder',function(){
    $.ajax({
        type:'POST',
        url:'phpScripts/ConfirmOrder.php',
        success: function(data){
            alert ("Order Sent");
            window.location.href = "index.php";
        }
    });
  });
});
</script>

</html>