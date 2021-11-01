<?php
require('connectDB.php');
require('functions.php');
error_reporting(E_ERROR | E_PARSE);
session_start();
if(isset($_POST['username']) && isset($_POST['password'])) {
  $username = sanitize(mysqli_real_escape_string($conn, $_POST['username']));
  $inputtedpassword = sanitize(mysqli_real_escape_string($conn, $_POST['password']));

  $stmt = $conn -> prepare('SELECT * FROM login_table WHERE username = ? LIMIT 1');
  $stmt -> bind_param('s', $username);
  $stmt -> execute();
  $stmt -> bind_result($userid, $username, $password, $usertype);
  $stmt -> store_result();
  if($stmt->num_rows == 1){
    if($stmt->fetch()){
      if(password_verify($inputtedpassword, $password)){
        $_SESSION['username'] = $username;
        $_SESSION['userID'] = $userid;
        $_SESSION['userType'] = $usertype;
        unset($_SESSION['registered']);
        session_regenerate_id();
        header("Location: index");
      }
    }
  }
  else {
    echo "<br>";
    echo "<br>";
    echo "<p class='fonts' style='text-align: center; color: red;'>Incorrect Username or Password!</p>";
    echo"<br>".$password;
  }
  $stmt->close();
}
?>