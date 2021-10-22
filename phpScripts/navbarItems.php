<?php
if(isset($_SESSION['username'])){
    echo"<a class='nav-item nav-link' style='margin-right:10px' href='index.php'>Home</a>";
}
if(isset($_SESSION['username'])){
    echo"<a class='nav-item nav-link' style='margin-right:10px' href='#'>Profile</a>";
}
if(isset($_SESSION['userType'])){
    if ($_SESSION['userType'] == 1){
        echo"<a class='nav-item nav-link' href='#'>Admin</a>";
    }
}
?>