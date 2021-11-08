<?php
require('connectDB.php');
require('functions.php');
require('session.php');
error_reporting(E_ERROR | E_PARSE);
if(isset($_POST['username']) && isset($_POST['password'])) {
  // Cleansing Data
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
        unset($_SESSION['registered']);
        $_SESSION['session_time'] = time(); // Resetting the timeout on the session
        session_regenerate_id();
        header("Location: index");
      } else {
        echo "<br>";
        echo "<br>";
        echo "<p class='fonts' style='text-align: center; color: red;'>Incorrect Password!</p>";
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
session_write_close();
?>