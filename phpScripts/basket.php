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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>