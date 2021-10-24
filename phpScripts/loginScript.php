<?php
require('connectDB.php');
require('functions.php');
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_POST['username']) && isset($_POST['password'])) {
  $username = sanitize(mysqli_real_escape_string($conn, $_POST['username']));
  $password = sanitize(mysqli_real_escape_string($conn, $_POST['password']));

  $password = hash('sha256', $password);

  $stmt = $conn -> prepare('SELECT * FROM login_table WHERE username = ? and password = ? LIMIT 1');
  $stmt -> bind_param('ss', $username, $password);
  $stmt -> execute();
  $stmt -> bind_result($userid, $username, $password, $usertype);
  $stmt -> store_result();
  if($stmt->num_rows == 1){
    if($stmt->fetch()){
      $_SESSION['username'] = $username;
      $_SESSION['userID'] = $userid;
      $_SESSION['userType'] = $usertype;
      $_SESSION['SelectedDate'] = date('Y-m-d', time());
      session_regenerate_id();
      header("Location: index.php");
    }
  }
  else {
    echo "<br>";
    echo "<br>";
    echo "<p class='fonts' style='text-align: center; color: red;'>Incorrect Username or Password!</p>";
  }
  $stmt->close();
}
?>