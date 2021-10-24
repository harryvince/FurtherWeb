<?php require('phpScripts/session.php');
?>

<link rel="stylesheet" href="css/basket.css">

<a class="basketIconA" data-bs-toggle="modal" data-bs-target="#Modal"><img class="basketIcon" src="images/cart.png"></a>
<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel"><img class="basketIcon" src="images/cart.png">Basket</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php require('viewCart.php') ?>
      </div>
      <div class="modal-footer">
        <?php echo "<p style='color:black' class='total'>Total: £".$_SESSION['basketTotal']."</p>"?>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onClick="RemoveHREF()">Close</button>
        <button type="button" class="btn btn-primary">Go to Checkout</button>
      </div>
    </div>
  </div>
</div>

<?php
    if(isset($_GET['basket']) && $_GET['basket'] == 1){ ?>
        <script>
                 $(function(){
                     $('#Modal').modal('show');
                 });
        </script>
<?php         
    }
?>

<script>

$(function(){
  $(document).on('change','.updateQuantity',function(){
    var product_ID = this.id;
    var quantity = document.getElementById(product_ID).value;
    if (quantity < 0){
      alert("Please enter a Valid value");
    } else {
      $.ajax({
          type:'POST',
          url:'phpScripts/changeQuantity.php',
          data:{'product_ID':product_ID, 'quantity':quantity},
          success: function(data){
              alert (data);
              location.reload();
              window.location = window.location.href + "?basket=1";
          }
      });
    }
  });
});

function RemoveHREF() {
    if ((window.location.href).includes("?basket=1")) {
        window.location = "index.php";
    }
}

$(function(){
  $(document).on('click','.Remove',function(){
    var itemID = this.id;
      $.ajax({
          type:'POST',
          url:'phpScripts/RemoveFromCart.php',
          data:{'itemID':itemID},
          success: function(data){
              alert (data);
              location.reload();
              window.location = window.location.href + "?basket=1";
          }
      });
  });
});

</script>