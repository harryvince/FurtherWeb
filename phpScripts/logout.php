<?php
  session_start();
  // Unset Session Variables and regen Session ID
  unset($_SESSION['username']);
  unset($_SESSION['userID']);
  unset($_SESSION['userType']);
  session_regenerate_id();
  // Redirecting to homepage
  header("Location: http://".$_SERVER['HTTP_HOST'].'/index');
?>