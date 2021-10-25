<?php
require('connectDB.php');
require('functions.php');
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_POST['username']) && isset($_POST['password'])) {
  $username = sanitize(mysqli_real_escape_string($conn, $_POST['username']));
  $password = sanitize(mysqli_real_escape_string($conn, $_POST['password']));

  $password = hash('sha256', $password);

  $stmt = $conn -> prepare('SELECT username FROM login_table WHERE username = ? LIMIT 1');
  $stmt -> bind_param('s', $username);
  $stmt -> execute();
  $stmt -> bind_result($checkUsername);
  $stmt -> store_result();
  if($stmt->num_rows == 1){
    echo "<br>";
    echo "<br>";
    echo "<p class='fonts' style='text-align: center; color: red;'>User account already Exsists!</p>";
  }
  else {
    $insertNewUser = $conn -> prepare('INSERT INTO login_table (username, password, userType) VALUES (?, ?, 0)');
    $insertNewUser -> bind_param('ss', $username, $password);
    $insertNewUser -> execute();
    $_SESSION['registered'] = TRUE;
    header('Location: loginPage');
  }
  $stmt->close();
}
?>