<?php
if(isset($_SESSION['username'])){
    echo"<a class='nav-item nav-link' style='margin-right:10px' data-bs-toggle='modal' data-bs-target='#PrevOrders'>Previous Orders</a>";
}
require('phpScripts/session.php');
?>

<link rel="stylesheet" href="css/basket.css">

<!-- Modal -->
<div class="modal fade" id="PrevOrders" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Previous orders</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <?php require('DisplayPreviousOrders.php'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>