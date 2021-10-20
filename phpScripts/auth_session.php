<?php
  session_start();
  if(!isset($_SESSION["username"])) {
    header("Location: http://".$_SERVER['HTTP_HOST'].'/loginPage.php');
    exit();
  }
 ?>