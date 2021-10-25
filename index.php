<?php 
require('phpScripts/session.php');
if (!isset($_SESSION['basketTotal'])){
    $_SESSION['basketTotal'] = 0.00;
    $_SESSION['basket'] = array();
}
$_SESSION['checkout'] = 0;
?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="css/background.css">
    <title>Vince Shops</title>
    <link rel="icon" type="image/x-icon" href="images/favicon.ico"/>
</head>
<html>
    
<?php require('phpScripts/nav.php'); ?>

<body>
    <?php require('phpScripts/populateCards.php');?>
</body>

</html>
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