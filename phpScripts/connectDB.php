<?php
  $conn = mysqli_connect("localhost", "harry", "DBPassword5445", "digitech_shopdb");
  if (mysqli_connect_errno()){
      echo "Failed to connect to MySQL: ".mysqli_connect_error();
  }
 ?>