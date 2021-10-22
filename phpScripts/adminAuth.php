<?php
if(isset($_SESSION['userType'])){
    if ($_SESSION['userType'] == 1){
        echo"<a class='nav-item nav-link' style='margin-right:10px' href='#'>Admin</a>";
    }
}
if(isset($_SESSION['username'])){
    echo"<a class='nav-item nav-link' href='#'>Profile</a>";
}
?>