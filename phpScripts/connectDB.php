<?php

if (!defined('DBUSER') && !defined('DBPASSWORD') && !defined('DBHOST') && !defined('DBNAME')){
  DEFINE('DBUSER', 'harry');
  DEFINE('DBPASSWORD', 'DBPassword5445');
  DEFINE('DBHOST', 'localhost');
  DEFINE('DBNAME', 'digitech_shopdb');
}

$conn = mysqli_connect(DBHOST, DBUSER, DBPASSWORD, DBNAME);
?>