<?php 
require('phpScripts/session.php');
if (!isset($_SESSION['basketTotal'])){
    $_SESSION['basketTotal'] = 0.00;
    $_SESSION['basket'] = array();
}
?>
<header>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="css/background.css">
    <title>Vince Shops</title>
    <link rel="icon" href="images/favicon.ico"/>
</header>

    <nav class="navbar navbar-dark bg-dark justify-content-between">
        <div class="navbar-nav mr-auto flex-row">
            <a class="navbar-brand" style="margin-left:20px;">Vince Shops</a>
            <?php require('phpScripts/navbarItems.php'); ?>
        </div>
        <span class="navbar-text" style="margin-right:10px;">
            <a style="margin-right:10px;">£ <?php
            if ($_SESSION['basketTotal'] == 0){
                echo "0.00";
            } else {
             echo $_SESSION['basketTotal'];
            }
             ?></a>
            <a class="basketIconA" href="basket.php"><img class="basketIcon" src="images/cart.png"></a>
            <button class="btn btn-outline-success" style="margin-right:2px">
                <?php
                    if (isset($_SESSION['username'])){
                        echo"<a href='phpScripts/logout.php'>";
                        echo "Hello, ".$_SESSION['username'];
                        echo "</a>";
                    } else {
                        echo"<a href='loginPage.php'>";
                        echo "Login";
                        echo"</a>";
                    }
                ?>
            </button>
        </span>
    </nav>

<body>
    <?php require('phpScripts/populateCards.php');?>
</body>

<script>
$(function(){
  $(document).on('click','.addToCart',function(){
    var product_ID = this.id;
      $.ajax({
          type:'POST',
          url:'phpScripts/addToCart.php',
          data:{'product_ID':product_ID},
          success: function(data){
              alert (data);
              location.reload();
          }
      });
  });
});
</script>